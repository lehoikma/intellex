<?php

App::uses('SeminarComponent', 'Controller/Component');

class SeminarHelper extends AppHelper {

    protected $seminarComponent;

    public function __construct() {
        $collection = new ComponentCollection();
        $this->seminarComponent = $collection->load('Seminar');
    }

    /**
     * マスターデータのセミナータイプを取得する
     * @return array('type_id_1' => 'タイプ名１', 'type_id_2' => 'タイプ名2)
     */
    public function getAllSeminarTypes() {
        return $this->seminarComponent->getAllSeminarTypesAsArray();
    }

    public function getSeminarTypeCss($seminarTypeId){
        return Configure::read('seminar_type_css')[$seminarTypeId];
    }

    /**
     *
     * @param $capacity
     * @param $capacityAlertNum
     * @param $seminarUsers
     * @return string
     */
    public function getAlertLabel($capacity, $capacityAlertNum, $seminarUsers) {
        $numOfAttendees = $this->seminarComponent->countAttendeesFromSeminarUsers($seminarUsers);
        $rest = intval($capacity) - $numOfAttendees;
        if ($rest <= intval($capacityAlertNum)) {
            if ($rest <= 0) {
                return '満席';
            } else {
                return '残りわずか';
            }
        }
        return '';
    }

    /**
     * セミナーの空いている席があるかをチェック
     * @param $capacity
     * @param $seminarUsers
     * @return bool
     */
    public function hasSlots($capacity, $seminarUsers) {
        $numOfAttendees = $this->seminarComponent->countAttendeesFromSeminarUsers($seminarUsers);
        return intval($capacity) > intval($numOfAttendees);
    }

    public function getCurrentSeminarType($typeId){
        return (isset($this->params['url']['type']) && $typeId == $this->params['url']['type'])? "class='current'" : '';
    }

    public function getNoParamSeminarType(){
        $currentTypeId = isset($this->params['url']['type']) ? $this->params['url']['type'] : '';
        if (empty($currentTypeId)) return "class='current'";
    }

    public function getCurrentSeminarLabel() {
        $types = $this->getAllSeminarTypes();
        $currentTypeId = isset($this->params['url']['type']) ? $this->params['url']['type'] : '';

        if (empty($currentTypeId) || empty($types[$currentTypeId])) return '<h2 class="categoryTitle">全て</h2>';
        return sprintf('<h2 class="categoryTitle color%s">%s</h2>', $currentTypeId, $types[$currentTypeId]);
    }
}
