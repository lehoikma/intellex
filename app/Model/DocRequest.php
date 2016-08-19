<?php

class DocRequest extends AppModel {

    public $actsAs = array('CakeSoftDelete.SoftDeletable');
    public $belongsTo = 'User';

    public $validate = array(
        'quantity' => array(
            'naturalNumber' => array(
                'rule' => 'naturalNumber',
                'allowEmpty' => true,
                'message' => '半角数字で入力してください。'
            ),
            'maxLength' => array(
                'rule' => array('maxLength', 4),
                'allowEmpty' => true,
                'message' => '4桁以内の半角数字で入力してください。'
            ),
        ),
    );
}