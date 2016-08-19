<?php

class InquiryController extends AppController {

    public $components = array(
        'Session',
        'Security',
        'docRequestComponent' => array('className' => 'DocRequest'),
        'userComponent' => array('className' => 'User'),
        'commonComponent' => array('className' => 'Common'),
    );
    public $uses = array('User', 'DocRequest');

    // バリデーションカウントの最大値(３回目は通す)
    const LIMIT_MISS_COUNT = 3;

    const VALID_SESSION_KEY = 'InquiryValidationCount';

    public function beforeFilter(){
        $this->Security->blackHoleCallback = '__forceSSL';
        $this->Security->requireSecure();
    }

    public function index() {
        $this->set('isForm', true);
        if ($this->request->is('post')) {
            $input = $this->docRequestComponent->customDataAfterReceiving($this->data);
            $this->User->set($input);
            $this->DocRequest->set($input);
            $isValidUser = $this->User->validates();
            $isValidDocRequest = $this->DocRequest->validates();

            if ($isValidUser && $isValidDocRequest) {
                $user = $this->userComponent->findUserByEmail($input['User']['email']);
                //新しいメールアドレスの場合は新しく作成する
                if (empty($user)) {
                    $userId = $this->userComponent->saveNewUser($input);
                } else {
                    $userId = $user['User']['id'];
                }

                //資料請求を保存する
                if(!empty($input['DocRequest'])) {
                    $input['DocRequest']['user_id'] = $userId;
                    $this->docRequestComponent->createDocRequest($input['DocRequest']);
                }

                $this->docRequestComponent->sendThanksEmail($input['User']);
                $this->Session->delete(self::VALID_SESSION_KEY);

                $this->redirect(array('action' => 'complete'));
            }
            // エラー回数を判定
            $validationCount = $this->Session->read(self::VALID_SESSION_KEY) + 1;
            if($validationCount >= self::LIMIT_MISS_COUNT){
                $this->commonComponent->sendErrorEmailToSystem($this->request->data, '【資料請求】入力エラー');
                $this->Session->delete(self::VALID_SESSION_KEY);
                $this->redirect(array('action' => 'complete'));
            } else {
                $this->Session->write(self::VALID_SESSION_KEY, $validationCount);
            }
        } else {
            // 初期化
            $this->Session->write(self::VALID_SESSION_KEY, 0);
        }
    }

    public function complete() {
        $this->set('isForm', true);
    }

    public function __forceSSL(){
        return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }



}