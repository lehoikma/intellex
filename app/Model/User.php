<?php

class User extends AppModel {

    const MALE = 1;
    const FEMALE = 2;

    public $actsAs = array('CakeSoftDelete.SoftDeletable');
    public $hasMany = array('DocRequest', 'SeminarUser');
    public $virtualFields = array(
            'full_name' => "User.name_sei || User.name_mei",
            'full_name_kana' => "User.name_sei_kana || User.name_mei_kana",
    );
    public $validate = array(
        'name' => array(
            'name_sei' => array(
                'rule' => array('validateNotBeBankAndMaxLength', 'name_sei', 50),
                'message' => 'お名前を入力してください。'
            ),
            'name_mei' => array(
                'rule' => array('validateNotBeBankAndMaxLength', 'name_mei', 50),
                'message' => 'お名前を入力してください。'
            ),
        ),
        'name_kana' => array(
            'name_sei_kana' => array(
                'rule' => array('validateKanaWithMaxLength', 'name_sei_kana', 50),
                'allowEmpty' => true,
                'message' => 'カタカナで入力してください。'
            ),
            'name_mei_kana' => array(
                'rule' => array('validateKanaWithMaxLength', 'name_mei_kana', 50),
                'allowEmpty' => true,
                'message' => 'カタカナで入力してください。'
            ),
        ),
        'company_name' => array(
            'rule' => array('maxLength', 50),
            'allowEmpty' => true,
            'message' => '50文字以下で入力してください。'
        ),
        'postal_code' => array(
            'postal_code1' => array(
                'rule' => array('validateNumberWithLength', 'postal_code1', 3),
                'message' => '半角数字で入力してください。'
            ),
            'postal_code2' => array(
                'rule' => array('validateNumberWithLength', 'postal_code2', 4),
                'message' => '半角数字で入力してください。'
            ),
        ),
        'address1' => array(
            'rule' => array('validateNotBeBankAndMaxLength', 'address1', 255),
            'message' => '都道府県を選択してください。'
        ),
        'address2' => array(
            'rule' => array('validateNotBeBankAndMaxLength', 'address2', 255),
            'message' => '市区郡を入力してください。'
        ),
        'address3' => array(
            'rule' => array('validateNotBeBankAndMaxLength', 'address3', 255),
            'message' => '町名・番地・建物名を入力してください。'
        ),
        'email' => array(
            'data_type' => array(
                'rule' => 'email',
                'message' => 'メールアドレスを正しく入力してください。'
            ),
            'length' => array(
                'rule' => array('lengthBetween', 1, 255),
                'message' => 'メールアドレスを正しく入力してください。'
            ),
            'alphaNumeric' => array(
                'rule' => array('alphanumericSymbols'),
                'message' => 'メールアドレスを正しく入力してください。',
            ),
        ),
        'birthday' => array(
            'rule' => array('validateBirthday'),
            'allowEmpty' => true,
            'message' => '生年月日を正しくを入れてください。'
        ),

    );

    public function validateNumberWithLength($data, $field, $length) {
        $input = trim($this->data['User'][$field]);
        return (is_numeric($input) && strlen($input) == $length) ? true : false;
    }

    public function validateNotBeBankAndMaxLength($data, $field, $maxLength) {
        $input = trim($this->data['User'][$field]);
        return (!empty($input) && mb_strlen($input) <= $maxLength) ? true : false;
    }

    public function validateKanaWithMaxLength($data, $field, $maxLength) {
        $input = trim($this->data['User'][$field]);
        return mb_strlen($input) <= $maxLength && preg_match("/^[ァ-ヶｦ-ﾟー]+$/u", $input);
    }

    public function validateBirthday() {
        $birthYear = $this->data['User']['birth_year'];
        $birthMonth = $this->data['User']['birth_month'];
        $birthDay = $this->data['User']['birth_day'];
        if (empty($birthYear) && empty($birthMonth) && empty($birthDay)) return true;
        return checkdate(intval($birthMonth), intval($birthDay), intval($birthYear));
    }

    public function alphanumericSymbols(){
        return preg_match('/^[a-zA-Z0-9\s\x21-\x2f\x3a-\x40\x5b-\x60\x7b-\x7e]+$/', $this->data['User']['email']);
    }

}
