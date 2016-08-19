<?php

App::uses('CommonHelper', 'View/Helper');
App::uses('SeminarComponent', 'Controller/Component');

class SeminarHelper extends CommonHelper {

    protected $seminarComponent;
    protected $speakerComponent;

    public function __construct() {
        $collection = new ComponentCollection();
        $this->seminarComponent = $collection->load('Seminar');
        $this->speakerComponent = $collection->load('Speaker');
    }

    /**
     * セミナーステータスコードをステータス文字に交換する
     * @param $seminar
     * @return string
     */
    public function getStatusLabel($seminar) {
        if (empty($seminar)) return '';

        $statuses = Configure::read('seminar_statuses');
        if ($seminar['status'] == $statuses['draft']) return '下書き';

        $currentDatetime = Configure::read('current_datetime');
        if ($seminar['status'] == $statuses['publish'] && $currentDatetime < $seminar['publish_from']) {
            return '掲載待ち';
        }
        if ($seminar['status'] == $statuses['publish'] && $currentDatetime >= $seminar['publish_from'] && $currentDatetime <= $seminar['publish_to']) {
            return '掲載中';
        }
        if ($seminar['status'] == $statuses['publish'] && $currentDatetime > $seminar['publish_to']) {
            return '終了';
        }
        return '';
    }

    /**
     * マスターデータのセミナータイプを取得する
     * @return array('type_id_1' => 'タイプ名１', 'type_id_2' => 'タイプ名2)
     */
    public function getAllSeminarTypes() {
        return $this->seminarComponent->getAllSeminarTypesAsArray();
    }

    /**
     * 表示している画面がセミナー詳細画面かをチェックする
     * @return bool
     */
    public function isEditing() {
        if ($this->params['controller'] == 'seminars' && $this->params['action'] == 'edit') {
            return true;
        }
        return false;
    }

    /**
     * 表示している画面がセミナーの更新中かをチェックする
     * @return bool
     */
    public function isUpdating() {
        if ($this->params['controller'] == 'seminars' && $this->params['action'] == 'update') {
            return true;
        }
        return false;
    }

    /**
     * 表示している画面がseminarsコントローラのsaveアクションから呼び出したかをチェックする
     * @return bool
     */
    public function isSaving() {
        if ($this->params['controller'] == 'seminars' && $this->params['action'] == 'save') {
            return true;
        }
        return false;
    }

    public function findAllSpeakers() {
        return $this->speakerComponent->findAllSpeakers();
    }

    /**
     * @param $seminarUsers
     * @return mixed
     */
    public function countAttendees($seminarUsers) {
        return $this->seminarComponent->countAttendeesFromSeminarUsers($seminarUsers);
    }


}
