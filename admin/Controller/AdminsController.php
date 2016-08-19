<?php

class AdminsController extends AppController {

    public $components = array(
        'Session',
        'adminComponent' => array('className' => 'Admin')
    );
    public $helpers = array('Html', 'Form');

    public function login() {}

    /**
     * adminログインを実施する。
     * ログインできたら、/usersにリダイレクトする。
     * ログインできなかったら、現在のページままでエラーが表示される
     * @param メールアドレスとパスワード
     */
    public function authAdmin() {
        if (!$this->request->is('post')){
            throw new NotFoundException();
        }
        $admin = $this->adminComponent->auth($this->request->data['Admin']);
        if (empty($admin)) {
            $this->setReturningMessage('error', Configure::read('msg')['auth_failed']);
            unset($this->request->data['Admin']['password']);
            $this->redirect(array(
                    'action' => 'login',
                    '?' => $this->request->data['Admin']
            ));
        } else {
            $this->adminComponent->updateLastLogin($admin['Admin']['id']);
            $this->Session->write('admin', $admin['Admin']);
            $this->redirect('/users');
        }
        $this->render('login');
    }

    /**
     * ログアウトの操作を実施する
     */
    public function logout() {
        if ($this->isLoggedIn()){
            $this->Session->destroy();
        }
        $this->redirect('/');
    }

    public function createAccount(){}

    /**
     * アカウント作成の操作を実施する
     * @param メール、パスワード、氏名のpost データ
     * @return 現在のページにリダイレクトする
     */
    public function create(){
        if(!$this->request->is('post')) throw new NotFoundException();

        $this->Admin->set($this->data);
        if(!$this->Admin->validates()){
            return $this->render('createAccount');
        }

        $this->Admin->save();
        $this->setReturningMessage('success', Configure::read('msg')['admin_successfully_create']);
        return $this->redirect('createAccount');

    }

    public function edit() {
        return $this->render('create_account');
    }

    public function update() {
        if(!$this->request->is('post')) throw new NotFoundException();

        $oldAdmin = $this->getLoggedInAdmin();

        $input = $this->data;
        $input['Admin']['id'] = $oldAdmin['id'];
        $this->Admin->set($input);
        $this->Admin->validator()->remove('email');
        if(!$this->Admin->validates()){
            return $this->render('create_account');
        }

        $this->Admin->save();
        $this->setReturningMessage('success', Configure::read('msg')['admin_successfully_updated']);
        $this->Session->write('admin', $this->adminComponent->findById($oldAdmin['id'])['Admin']);
        return $this->redirect(array('action' => 'edit'));
    }
}
