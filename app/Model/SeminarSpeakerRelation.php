<?php

class SeminarSpeakerRelation extends AppModel {
    public $belongsTo = array('Seminar', 'Speaker');
}
