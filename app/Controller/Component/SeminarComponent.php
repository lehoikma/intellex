<?php

App::uses('CommonComponent', 'Controller/Component');
App::import('Model', 'Seminar');
App::import('Model', 'SeminarType');
App::import('Model', 'SeminarTypeRelation');
App::import('Model', 'SeminarSpeakerRelation');
App::import('Model', 'SeminarUser');

class SeminarComponent extends CommonComponent {

    protected $seminarModel;
    protected $seminarTypeModel;
    protected $seminarSpeakerRelationModel;

    public function __construct() {
        $this->seminarModel = new Seminar();
        $this->seminarTypeModel = new SeminarType();
        $this->seminarTypeRelationModel = new SeminarTypeRelation();
        $this->seminarSpeakerRelationModel = new SeminarSpeakerRelation();
    }

    /**
     * セミナーを登録する
     * @param $input
     * @return true or false
     */
    public function createSeminar($input) {
        $this->seminarModel->create();
        $data = $this->customDataBeforeSaveAll($input);
        try {
            $this->seminarModel->saveAll($data, array('validate' => false, 'deep' => true));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * セミナータイプを取得する
     * @return array('type_id_1' => 'name', 'type_id_2' = 'name2')
     */
    public function getAllSeminarTypesAsArray() {
        $types = $this->seminarTypeModel->find('all', array(
                'order' => array('id' => 'asc')
        ));
        $result = array();
        foreach ($types as $type) {
            $result[$type['SeminarType']['id']] = $type['SeminarType']['name'];
        }
        return $result;
    }

    /**
     * セミナー詳細を取得する
     * @param $id
     * @return array|null
     */
    public function findRecursiveSeminarById($id) {
        return $this->seminarModel->find('first', array(
            'conditions' => array('Seminar.id =' => $id),
            'recursive'  => 2
        ));
    }

    /**
     * セミナーを更新する
     * @param $input
     * @return bool
     */
    public function updateSeminar($input) {
        //保存する前にパラメータを適当に変更する
        $data = $this->customDataBeforeSaveAll($input);
        try {
            //既存のセミナータイプ、講師を全部削除して、新しく作成する
            $this->deleteSeminarTypeRelationBySeminarId($input['Seminar']['id']);
            $this->deleteSeminarSpeakerRelationBySeminarId($input['Seminar']['id']);
            $this->seminarModel->saveAll($data, array('validate' => false, 'deep' => true));
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * セミナー更新する前にspeakerを削除する
     * @param $seminarId
     * @return bool
     */
    public function deleteSeminarSpeakerRelationBySeminarId($seminarId) {
        try {
            $this->seminarSpeakerRelationModel->deleteAll(array(
                    'seminar_id' => $seminarId
            ), false);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * セミナー更新する前にタイプを削除する
     * @param $seminarId
     * @return bool
     */
    public function deleteSeminarTypeRelationBySeminarId($seminarId) {
        try {
            $this->seminarTypeRelationModel->deleteAll(array(
                'SeminarTypeRelation.seminar_id' => $seminarId
            ), false);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * セミナーの基本情報を取得する
     * @param $seminarId
     * @return mixed
     */
    public function findById($seminarId) {
        $this->seminarModel->recursive = -1;
        return $this->seminarModel->findById($seminarId);
    }

    /**
     *
     * 現在のセミナー情報と同じようにセミナーを作成する
     * @param $seminarId
     * @return 作成したセミナーID or ''
     */
    public function copy($seminarId) {
        $seminar = $this->findById($seminarId);
        if (empty($seminar)) return '';

        unset($seminar['Seminar']['id']);
        $seminar['Seminar']['status'] = Configure::read('seminar_statuses')['draft'];

        try {
            $this->seminarModel->create();
            $this->seminarModel->save($seminar, array('validate' => false));
            $newSeminarId = $this->seminarModel->getLastInsertID();

            //seminar_type_relationsに登録する
            $seminarDetail = $this->findRecursiveSeminarById($seminarId);
            $seminarTypeData = array();
            foreach ($seminarDetail['SeminarTypeRelation'] as $type) {
                $seminarTypeData[] = array(
                        'seminar_id' => $newSeminarId,
                        'seminar_type_id' => $type['seminar_type_id']
                );
            }
            if (!empty($seminarTypeData)) {
                $this->seminarTypeRelationModel->create();
                $this->seminarTypeRelationModel->saveMany($seminarTypeData, array('validate' => false));
            }

            //seminar_speaker_relationsに登録する
            $seminarSpeakerData = array();
            foreach ($seminarDetail['SeminarSpeakerRelation'] as $speaker) {
                $seminarSpeakerData[] = array(
                        'seminar_id' => $newSeminarId,
                        'speaker_id' => $speaker['speaker_id']
                );
            }
            if (!empty($seminarSpeakerData)) {
                $this->seminarSpeakerRelationModel->create();
                $this->seminarSpeakerRelationModel->saveMany($seminarSpeakerData, array('validate' => false));
            }
        } catch (Exception $e) {
            return '';
        }

        return $newSeminarId;

    }

    /**
     * seminar_type_idでseminar_idを取得
     * @param $typeId
     * @return array
     */
    public function findIdsByTypeIdAsArray($typeId) {
        $seminarTypes = $this->seminarTypeRelationModel->find('all', array(
            'conditions' => array('seminar_type_id' => $typeId),
            'fields' => 'DISTINCT SeminarTypeRelation.seminar_id',
        ));
        return Hash::extract($seminarTypes, '{n}.SeminarTypeRelation.seminar_id');
    }

    /**
     * @param $seminarUserList
     * @return int|number
     */
    public function countAttendeesFromSeminarUsers($seminarUserList) {
        if(empty($seminarUserList)) return 0;
        $filteredList = Hash::map($seminarUserList, '', function($su){
             if ($su['status'] != SeminarUser::ABSENT) {
                 return $su;
             }
        });
        $attendeeArray = Hash::extract($filteredList, '{n}.attendees');
        return array_sum(array_map('intval', $attendeeArray));
    }

    /**
     * セミナーを保存する前に画像と講師情報のデータをカスタマイズする
     * @param $input
     * @return mixed
     */
    private function customDataBeforeSaveAll($input) {
        //セミナー作成、編集の場合はイメージのパスをcustomizeする
        if (!empty($input['Seminar']['image']['path'])) {
            $input['Seminar']['image'] = $input['Seminar']['image']['path'];
        } else {
            unset($input['Seminar']['image']);
        }
        foreach ($input['Seminar']['seminar_types'] as $typeId) {
            $input['SeminarTypeRelation'][] = array('seminar_type_id' => $typeId);
        }
        if (!empty($input['Seminar']['speaker_ids'])) {
            foreach($input['Seminar']['speaker_ids'] as $speakerId) {
                if (!empty($speakerId)) {
                    $input['SeminarSpeakerRelation'][] = array('speaker_id' => $speakerId);
                }
            }
        }
        return $input;
    }

    /**
     * セミナーが公開しているかどうか判定する
     * @param $seminarId
     * @return bool
     */
    public function isPublishSeminar($seminarId){
        $currentDateTime = Configure::read('current_datetime');
        $Seminar = $this->seminarModel->find('first', array(
            'conditions' => array(
                'id' => $seminarId,
                'publish_from <=' => $currentDateTime,
                'publish_to >=' => $currentDateTime,
                'status =' => Configure::read('seminar_statuses')['publish']
            ),
        ));
        return !empty($Seminar);
    }

    public function findComingSeminars() {
        $tomorrowStart = date('Y-m-d', strtotime("+1 days"));
        $tomorrowEnd = date('Y-m-d 23:59:59', strtotime("+1 days"));
        return $this->seminarModel->find('all', array(
                'conditions' => array(
                        'Seminar.open_from >=' => $tomorrowStart,
                        'Seminar.open_from <=' => $tomorrowEnd
                ),
                'recursive'  => 2
        ));
    }
}
