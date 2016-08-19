<?php

class SeminarUser extends AppModel {

    const WILL_ATTEND = 1;
    const ATTEND = 2;
    const ABSENT = 3;

    public $belongsTo = array('User', 'Seminar');

    public $validate = array(
        'attendees' => array(
            'required' => array(
                'required' => true,
                'rule' => 'notBlank',
                'message' => '参加人数を入力してください。'
            ),
            'data_type' => array(
                'rule' => 'naturalNumber',
                'message' => '半角数字で入力してください。'
            ),
            'length' => array(
                'rule' => array('maxLength', 2),
                'message' => '参加人数を正しく入力してください。'
            ),
        ),
    );

}