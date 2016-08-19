<?php

App::uses('Component', 'Controller');
App::import('Model', 'User');
App::import('Model', 'SeminarUser');

class UserComponent extends Component {

    protected $userModel;
    protected $seminarUserModel;

    public function __construct() {
        $this->userModel = new User();
        $this->seminarUserModel = new SeminarUser();
    }

    /**
     * ユーザー詳細情報を取得する
     * @param $id
     * @return array|null
     */
    public function findRecursiveUserById($id) {
        return $this->userModel->find('first', array(
            'conditions' => array('User.id =' => $id),
            'recursive' => 2
        ));
    }

    /**
     * ユーザーのメモの更新を実施する
     * @param $userId
     * @param $memo
     * @return bool
     */
    public function updateRequestMemo($userId, $memo) {
        try {
            $this->userModel->read(null, $userId);
            $this->userModel->set('memo', $memo);
            $this->userModel->save();
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * セミナー参加者の絞り込みの条件を作成する
     * @param $input
     * @return array
     */
    public function createAttendeeFilterConditions($input) {
        $conditions = array();
        if (!empty($input['seminar_id'])) $conditions['seminar_id'] = $input['seminar_id'];
        if (!empty($input['name'])) {
            $name = trim($input['name']);
            $conditions['OR'] = array(
                    'User.name_sei LIKE' => "%$name%",
                    'User.name_mei LIKE' => "%$name%",
                    'User.name_sei_kana LIKE' => "%$name%",
                    'User.name_mei_kana LIKE' => "%$name%",
                    '(User.name_sei || User.name_mei) LIKE' => "%$name%",
                    '(User.name_sei_kana || User.name_mei_kana) LIKE' => "%$name%"
            );
        }
        if (!empty($input['status'])) {
            $searchStatuses = array();
            foreach ($input['status'] as $status=>$checked) {
                if (boolval($checked)) $searchStatuses[] = $status;
            }
            if (!empty($searchStatuses)) $conditions['SeminarUser.status'] = $searchStatuses;
        }
        return $conditions;
    }

    /**
     * セミナー参加者のステータス（出席予定|出席|欠席）
     * @param $attendeeId
     * @param $status
     * @return mixed|string
     */
    public function updateAttendeeStatus($attendeeId, $status) {
        try {
            $this->seminarUserModel->read(null, $attendeeId);
            $this->seminarUserModel->set('status', $status);
            $seminarUser = $this->seminarUserModel->save();
        } catch (Exception $e) {
            return '';
        }
        return $seminarUser;
    }

    /**
     * ユーザーの絞り込み条件を作成する
     * @param $params
     * @return array
     */
    public function createUserFilterConditions($params) {
        $conditions = array();
        if (!empty($params['name'])) {
            $name = trim(strtolower($params['name']));
            $conditions['OR'] = array(
                'User.name_sei LIKE' => "%$name%",
                'User.name_mei LIKE' => "%$name%",
                'User.name_sei_kana LIKE' => "%$name%",
                'User.name_mei_kana LIKE' => "%$name%",
                '(User.name_sei || User.name_mei) LIKE' => "%$name%",
                '(User.name_sei_kana || User.name_mei_kana) LIKE' => "%$name%"
            );
        }
        if (!empty($params['sex'])) {
            $searchSexKeys = array();
            foreach ($params['sex'] as $sexCode=>$checked) {
                if (boolval($checked)) $searchSexKeys[] = $sexCode;
            }
            if (!empty($searchSexKeys)) $conditions['User.sex'] = $searchSexKeys;
        }
        if (!empty($params['age_fr'])) {
            $birthTo = date('Y-m-d', strtotime(Configure::read('current_datetime') . '- '. $params['age_fr'] .'years'));
            $conditions['User.birthday <='] = $birthTo;
        }
        if (!empty($params['age_to'])) {
            $birthFrom = date('Y-m-d', strtotime(Configure::read('current_datetime') . '- '. intval($params['age_to'] + 1) .'years'));
            $conditions['User.birthday >'] = $birthFrom;
        }
        if (!empty($params['re_fr'])) {
            $conditions['User.created >='] = $params['re_fr'];
        }
        if (!empty($params['re_to'])) {
            $conditions['User.created <='] = $params['re_to'] . ' 23:59:59';
        }
        return $conditions;
    }

    /**
     * @param $input
     * @return mixed|string
     */
    public function saveNewUser($input) {
        try {
            $this->userModel->create();
            $this->userModel->save($input, array('validate' => false));
            $newUserId = $this->userModel->getLastInsertID();
        } catch (Exception $e) {
            return '';
        }
        return $newUserId;
    }

    public function updateUser($input) {
        try {
            $this->userModel->save($input, array('validate' => false));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    public function findUserByEmail($email) {
        return $this->userModel->find('first', array('conditions' => array('User.email =' => $email)));
    }

}
