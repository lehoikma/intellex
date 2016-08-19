<?php

class Speaker extends AppModel {
    public $actsAs = array('CakeSoftDelete.SoftDeletable');
    public $hasMany = array('SeminarSpeakerRelation' => array('dependent' => true));
    public $validate = array(
            'name' => array(
                    'rule' => 'notBlank',
                    'allowEmpty' => false,
                    'message' => 'セミナー講師名を入力してください。'
            ),
            'introduction' => array(
                    'rule' => 'notBlank',
                    'allowEmpty' => false,
                    'message' => '講師プロフィールを入力してください。'
            ),
            'image' => array(
                    'rule' => array('validateFile', 'image'),
                    'allowEmpty' => false,
                    'message' => '講師画像を選択してください。'
            ),

    );

    public function validateFile($file, $field) {
        $image = $file[$field];
        if (empty($image)) return false;
        if ( $image['size'] == 0 || $image['error'] !== 0) {
            return false;
        }
        return true;
    }
}