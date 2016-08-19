<?php

App::uses('CommonHelper', 'View/Helper');
App::import('Model', 'SeminarUser');
App::import('Model', 'User');
App::uses('CommonComponent', 'Controller/Component');

class UserHelper extends CommonHelper {

    protected $commonComponent;

    public function __construct() {
        $collection = new ComponentCollection();
        $this->commonComponent = $collection->load('Common');
    }

    /**
     * セミナー参加者のステータスを取得する
     * @return array
     */
    public function getAttendeeStatuses() {
        return array(
            SeminarUser::WILL_ATTEND => '出席予定',
            SeminarUser::ATTEND => '出席',
            SeminarUser::ABSENT => '欠席'
        );
    }

    public function getSex() {
        return array(
            User::MALE => '男性',
            User::FEMALE => '女性'
        );
    }

    public function findAttendeeStatusLabelById($statusId) {
        $statuses = $this->getAttendeeStatuses();
        return isset($statuses[$statusId]) ? $statuses[$statusId] : '';
    }

    public function getSexLabelByCode($code) {
        if (empty($code)) return '';
        $sex = $this->getSex();
        return $sex[$code];
    }

    /**
     * 生年月日から年齢を計算する
     * @param $birthday
     * @return int
     */
    public function calculateAge($birthday) {
        if($birthday == '') return '-';
        $birthday = new DateTime($birthday);
        $today = new DateTime(Configure::read('current_datetime'));
        return ($birthday->diff($today)->y == 0) ? '-': $birthday->diff($today)->y;
    }

    /**
     * 表示している画面がユーザー詳細画面かをチェックする
     * @return bool
     */
    public function isEditing() {
        if ($this->params['controller'] == 'users' && $this->params['action'] == 'edit') {
            return true;
        }
        return false;
    }

    /**
     * 表示している画面がユーザーの更新中かをチェックする
     * @return bool
     */
    public function isUpdating() {
        if ($this->params['controller'] == 'users' && $this->params['action'] == 'update') {
            return true;
        }
        return false;
    }

    /**
     * $statusを持っているuserは欠席しているかをチェックする
     * @param $status
     * @return bool
     */
    public function isAbsent($status) {
        return ($status == SeminarUser::ABSENT) ? true : false;
    }

    public function getWithdrawStatuses() {
        return array(
            0 => '参加中',
            1 => '退会中'
        );
    }

    public function convertStringToJapanese($string) {
        if (empty($string)) return '';

        // DBに保存されている性別値を日本語化する
        $sexes = $this->getSex();
        $json = json_decode($string);
        if (!empty($json) && !empty($json->sex)) {
            $json->sex = $sexes[$json->sex];
        }
        return $this->commonComponent->convertInputKey(json_encode($json));
    }

}
