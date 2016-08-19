<?php


class UsersController extends AppController {

    public $components = array(
            'Session',
            'Paginator',
            'userComponent' => array('className' => 'User'),
            'seminarComponent' => array('className' => 'Seminar')
    );
    public $helpers = array('Html', 'Form');

    /**
     * ユーザー一覧
     */
    public function index() {
        $params = $this->params['url'];
        $conditions = !empty($params) ? $this->userComponent->createUserFilterConditions($params) : array();
        $this->Paginator->settings = array(
                'limit' => Configure::read('per_page'),
                'order' => array(
                        'User.created' => 'desc'
                )
        );
        $data = $this->Paginator->paginate('User', $conditions);
        $this->set('users', $data);
        $this->render('list');
    }

    /**
     * セミナー参加者一覧
     * @param $seminarId
     */
    public function seminarAttendees($seminarId) {
        $seminar = $this->seminarComponent->findById($seminarId);
        if (empty($seminar)) throw new NotFoundException();

        $input = $this->params['url'];
        $input['seminar_id'] = $seminarId;
        $conditions = $this->userComponent->createAttendeeFilterConditions($input);
        $this->Paginator->settings = array(
                'limit' => Configure::read('per_page'),
                'conditions' => $conditions,
                'contain' => 'User',
                'recursive' => 2,
                'order' => array(
                        'SeminarUser.created' => 'desc'
                )
        );
        $this->set('seminar', $seminar['Seminar']);
        $this->set('attendees', $this->Paginator->paginate('SeminarUser'));
        $this->render('attendees');
    }

    /**
     * セミナー参加者のステータス（出席予定|出席|欠席）の更新を実施する
     * @return json
     */
    public function updateAttendeeStatus() {
        if (!$this->request->is('post')) throw new NotFoundException();
        $this->autoRender = false;
        $input = $this->data;
        $seminarUser = $this->userComponent->updateAttendeeStatus($input['attendee_id'], $input['status']);
        if (empty($seminarUser)) {
            return json_encode(array(
                    'result' => 'error',
                    'msg' => 'ステータスの変更に失敗しました。'
            ));
        }
        return json_encode(array(
                'result' => 'success',
                'msg' => 'ステータスを変更しました。'
        ));
    }

    /**
     * ユーザーアカウント登録 | view作成
     */
    public function create() {}

    /**
     * ユーザーアカウント登録 |処理
     */
    public function save() {
        if (!$this->request->is('post')) throw new NotFoundException();
        $userId = $this->userComponent->saveNewUser($this->data);
        if (!empty($userId)) {
            $this->setReturningMessage('success', Configure::read('msg')['user_successfully_created']);
        } else {
            $this->setReturningMessage('error', Configure::read('msg')['create_user_failed']);
        }
        $this->redirect(array('action' => 'index'));
    }

    /**
     * ユーザー情報をセットして、詳細画面に渡す
     * @param $userId
     */
    public function edit($userId) {
        $user = $this->userComponent->findRecursiveUserById($userId);
        if (empty($user)) throw new NotFoundException();

        $this->set('user', $user['User']);
        $this->set('requests', Hash::sort($user['DocRequest'], '{n}.id', 'desc'));
        $this->set('seminar_users', Hash::sort($user['SeminarUser'], '{n}.id', 'desc'));
        $this->render('create');
    }

    public function update() {
        if (!$this->request->is('post')) throw new NotFoundException();
        $isUpdated = $this->userComponent->updateUser($this->data);
        if ($isUpdated) {
            $this->setReturningMessage('success', Configure::read('msg')['user_successfully_updated']);
        } else {
            $this->setReturningMessage('error', Configure::read('msg')['update_user_failed']);
        }
        $this->redirect($this->referer());
    }

}