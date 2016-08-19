<?php

App::uses('SeminarComponent', 'Controller/Component');

class SeminarHelper extends AppHelper {

    protected $seminarComponent;

    public function __construct() {
        $collection = new ComponentCollection();
        $this->seminarComponent = $collection->load('Seminar');
    }

    public function formalizeDateTime($dateTime) {
        return $this->seminarComponent->formalizeDateTime($dateTime);
    }

    public function formalizeTimeFromTime($time) {
        return date('H:i', strtotime($time));
    }
}
