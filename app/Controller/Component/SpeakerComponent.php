<?php

App::uses('CommonComponent', 'Controller/Component');
App::import('Model', 'Speaker');
App::import('Model', 'SeminarSpeaker');

class SpeakerComponent extends CommonComponent {

    protected $speakerModel;

    public function __construct() {
        $this->speakerModel = new Speaker();
    }

    /**
     * 講師を登録する
     * @param $input
     * @return bool
     */
    public function createSpeaker($input) {
        $this->speakerModel->create();
        try {
            $this->speakerModel->save($input, array('validate' => false));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * 講師削除
     * @param $speakerId
     * @return bool
     */
    public function deleteSpeaker($speakerId) {
        try {
            $this->speakerModel->delete($speakerId, true);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function findAllSpeakers() {
        return $this->speakerModel->find('all');
    }

    public function findAllByIds($ids) {
        if (!is_array($ids)) return null;
        return $this->speakerModel->find('all', array(
                'recursive' => 0,
                'conditions' => array('id' => $ids)
        ));
    }

}
