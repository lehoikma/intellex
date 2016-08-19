<?php

App::uses('Component', 'Controller');
App::import('Model', 'Admin');

class AdminComponent extends Component {

    protected $adminModel;

    public function __construct() {
        $this->adminModel = new Admin();
    }

    /**
     * adminのログインを実施する
     * @param $input
     * @return admin情報
     */
    public function auth($input) {
        $password = sha1($input['password']);
        $admin = $this->adminModel->findByEmailAndPassword($input['email'], $password);
        return $admin;
    }

    /**
     * adminのログイン時刻を更新する
     * @param $adminId
     * @return bool
     */
    public function updateLastLogin ($adminId) {
        try {
            $this->adminModel->id = $adminId;
            $this->adminModel->saveField('last_login', Configure::read('current_datetime'));
        } catch (Exception $e){
            return false;
        }
        return true;
    }

    public function findById($id) {
        return $this->adminModel->findById($id);
    }
}
