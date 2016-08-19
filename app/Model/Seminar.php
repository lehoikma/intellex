<?php

class Seminar extends AppModel {

    public $actsAs = array('CakeSoftDelete.SoftDeletable');
    public $hasMany = array('SeminarUser', 'SeminarTypeRelation', 'SeminarSpeakerRelation');
    public $validate = array(
        'seminar_types' => array(
            'rule' => array('validateArrayNotEmpty', 'seminar_types'),
            'message' => 'セミナー種別を選択してください。'
        ),
        'title' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => 'タイトルを入力してください。'
        ),
        'description' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '詳細情報を入力してください。'
        ),
        'open_from' => array(
            'required' => array(
                'rule' => array('validateTheBothCouldNotBeBlank', 'open_from', 'open_to'),
                'message' => '開催日時を選択してください。'
            ),
            'consistency' => array(
                'rule' => array('validateTimeConsistency', 'open_from', 'open_to'),
                'message' => '始日時は終了日時よりも前の日付を選択してください。'
            )
        ),
        'publish_from' => array(
            'required' => array(
                'rule' => array('validateTheBothCouldNotBeBlank', 'publish_from', 'publish_to'),
                'allowEmpty' => false,
                'message' => '掲載日時を選択してください。'
            ),
            'consistency_publish' => array(
                'rule' => array('validateTimeConsistency', 'publish_from', 'publish_to'),
                'message' => '始日時は終了日時よりも前の日付を選択してください。'
            ),
            'consistency_pub_open' => array(
                'rule' => array('validateTimeConsistency', 'publish_to', 'open_from'),
                'message' => '掲載日時は開催日時よりも前の日付を選択してください。'
            )
        ),
        'venue' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '会場を入力してください。'
        ),
        'open_door_at' => array(
            'time' => array(
                'rule' => 'time',
                'message' => '時間を正しく入力してください。'
            ),
            'consistency' => array(
                'rule' => array('validateOpenDoorTime'),
                'allowEmpty' => false,
                'message' => '開場時間は開催時間よりも前の時間を選択してください。'
            )
        ),
        'entry_fee' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '参加費を入力してください。'
        ),
        'access' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '交通情報を入力してください。'
        ),
        'capacity' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '定員を入力してください。'
        ),
        'capacity_alert_num' => array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => 'アラートを出す人数を入力してください。'
        ),
        'contact' => array(
            'rule' => 'notBlank',
            'allowEmpty' => false,
            'message' => '問い合わせ先情報を入力してください。'
        ),
        'image' => array(
            'required' => array(
                'rule' => array('validateFile', 'image'),
                'allowEmpty' => false,
                'message' => 'セミナー画像を選択してください。'),
            'mimeType' => array(
                'rule' => array( 'mimeType',
                    array(
                        'image/jpeg',
                        'image/x-ms-bmp',
                        'image/png',
                        'image/gif',
                    )
                ),
                'message' => 'ファイル形式に誤りのあるものが含まれています。',
            ),
            'maxFileSize' => array(
                'rule' => array( 'fileSize', '<=', '5MB'),
                'message' => '5MBを超えるファイルが含まれています。',
            ),
        ),

    );

    public function validateOpenDoorTime($data) {
        $openDoorAt = $data['open_door_at'];
        $openFrom = $this->data['Seminar']['open_from'];
        if (empty($openFrom)) {
            if (!empty($openDoorAt)) return true;
        } else {
            $openFromTime = date("H:i", strtotime($openFrom));
            return $openDoorAt <= $openFromTime ? true : false;
        }
    }

    public function validateArrayNotEmpty($data, $field) {
        if (empty($data[$field])) return false;
        return true;
    }

    public function validateTheBothCouldNotBeBlank($data, $field1, $field2) {
        $input = $this->data;
        if (empty($input['Seminar'][$field1]) || empty($input['Seminar'][$field2])) return false;
        return true;
    }

    public function validateTimeConsistency($data, $from, $to) {
        $input = $this->data;
        $dateTo = $input['Seminar'][$to];
        $dateFrom = $input['Seminar'][$from];
        return ($dateFrom > $dateTo) ? false : true;
    }

    public function validateFile($file, $field) {
        $image = $file[$field];
        if (empty($image)) return false;
        if ( $image['size'] == 0 || $image['error'] !== 0) {
            return false;
        }
        return true;
    }
}
