<?php

class SeminarTypeRelation extends AppModel {
    public $belongsTo = array('SeminarType', 'Seminar');
}
