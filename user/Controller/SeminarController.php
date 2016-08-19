<?php

class SeminarController extends AppController {

    public $components = array(
        'Session',
        'Security',
        'Paginator',
        'userComponent' => array('className' => 'User'),
        'seminarComponent' => array('className' => 'Seminar'),
        'seminarUserComponent' => array('className' => 'SeminarUser'),
        'commonComponent' => array('className' => 'Common'),
    );
    public $uses = array('SeminarTypeRelation', 'User', 'SeminarUser');

    // バリデーションカウントの最大値(３回目は通す)
    const LIMIT_MISS_COUNT = 3;

    const VALID_SESSION_KEY = 'SeminarValidationCount';

    public function beforeFilter(){
        $this->Security->blackHoleCallback = '__forceSSL';
        $this->Security->requireSecure('inquiry', 'complete');
    }

    public function index(){
        $currentDateTime = Configure::read('current_datetime');
        $typeId = $this->params->query('type');

        $seminarIds = !empty($typeId) ? $this->seminarComponent->findIdsByTypeIdAsArray(intval($typeId)) : array();
        if (!empty($seminarIds)) $conditions['id'] = $seminarIds;
        $conditions['publish_from <='] = $currentDateTime;
        $conditions['publish_to >='] = $currentDateTime;
        $conditions['status'] = Configure::read('seminar_statuses')['publish'];
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'limit' => Configure::read('per_page'),
            'recursive' => 2,
            'order' => array(
                'Seminar.open_from' => 'asc'
            )
        );
        $wantedSeminars = $this->Paginator->paginate('Seminar');
        $this->set('seminars', $wantedSeminars);
    }

    public function detail($seminarId) {
        $previewToken = isset($this->params['url']['preview']) ? $this->params['url']['preview'] : '';
        if (empty($previewToken)) {
            if(!$this->seminarComponent->isPublishSeminar($seminarId)) throw new NotFoundException();
        } else if ($previewToken != Configure::read('preview_token')){
            throw new NotFoundException();
        }

        $seminar = $this->seminarComponent->findRecursiveSeminarById($seminarId);
        if (empty($seminar)) throw new NotFoundException();
        $this->set('seminar', $seminar);
    }

    public function inquiry($seminarId){
        // 募集中じゃないセミナーは404ページヘ
        if(!$this->seminarComponent->isPublishSeminar($seminarId)) throw new NotFoundException();
        if($this->request->is('post')){
            $input = $this->seminarUserComponent->createAllInputData($this->data);
            $input['SeminarUser']['seminar_id'] = $seminarId;
            $this->User->set($input);
            $this->SeminarUser->set($input);
            $isValidUser = $this->User->validates();
            $isValidSeminarUser = $this->SeminarUser->validates();

            if($isValidUser && $isValidSeminarUser){
                $user = $this->userComponent->findUserByEmail($input['User']['email']);
                //新しいメールアドレスの場合は新しく作成する
                if (empty($user)) {
                    $userId = $this->userComponent->saveNewUser($input);
                } else {
                    $userId = $user['User']['id'];
                }

                $input['SeminarUser']['user_id'] = $userId;
                $this->SeminarUser->save($input);
                $this->seminarUserComponent->sendSeminarThanksMail($seminarId, $input);
                $this->redirect(array('action' => 'complete', $seminarId));
            }
            // エラー回数を判定
            $validationCount = $this->Session->read(self::VALID_SESSION_KEY) + 1;
            if($validationCount >= self::LIMIT_MISS_COUNT){
                $this->commonComponent->sendErrorEmailToSystem($this->request->data, '【セミナー予約】入力エラー');
                $this->Session->delete(self::VALID_SESSION_KEY);
                $this->redirect(array('action' => 'complete', $seminarId));
            } else {
                $this->Session->write(self::VALID_SESSION_KEY, $validationCount);
            }

        } else {
            // 初期化
            $this->Session->write(self::VALID_SESSION_KEY, 0);
        }
        $seminar = $this->seminarComponent->findRecursiveSeminarById($seminarId);
        $this->set('seminar', $seminar);
        $this->set('isForm', true);
    }

    public function complete($seminarId){
        if(!$this->seminarComponent->isPublishSeminar($seminarId)) throw new NotFoundException();
        $seminar = $this->seminarComponent->findRecursiveSeminarById($seminarId);
        $this->set('seminar', $seminar);
        $this->set('isForm', true);
    }

    public function __forceSSL(){
        return $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    }

}