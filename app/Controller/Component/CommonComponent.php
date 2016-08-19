<?php

App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class CommonComponent extends Component {

    /**
     * イメージアップロードを実施する
     * @param $image
     * @return イメージパス
     */
    public function uploadImage($image) {
        $uploadFolder = ROOT . DS . 'user' . DS . 'webroot' . DS. Configure::read('file_upload');
        $fileName = time() . mt_rand() . $image['name'];
        $uploadPath =  $uploadFolder . DS . $fileName;
        try {
            if( !file_exists($uploadFolder) ){
                mkdir($uploadFolder);
            }
            if (move_uploaded_file($image['tmp_name'], $uploadPath)) {
                return Configure::read('user_domain') . DS . Configure::read('file_upload') . DS . $fileName;
            }
        } catch (Exception $e) {
            return '';
        }
    }

    public function formalizeDateTime($dateTime) {
        $datetime = new DateTime($dateTime);
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $w = (int)$datetime->format('w');
        $date = date('Y/m/d' , strtotime($dateTime))  . '(' . $week[$w] . ')';
        return $date . ' ' . date('H:i', strtotime($dateTime));
    }

    public function sendErrorEmailToSystem($input, $subject) {
        $errorData = $this->convertInputKey($input);
        $email = new CakeEmail('system');
        $email->template('error');
        $email->subject($subject);
        $email->viewVars(array('errorData' => $errorData));
        $email->send();
    }

    public function convertInputKey($string) {
        $string = json_encode($string);

        $find = array(
            'name_kana', 'name_sei_kana', 'name_mei_kana',
            'company_name', 'postal_code1', 'postal_code2',
            'address1', 'address2', 'address3',
            'tel', 'sex', 'birth_year',
            'birth_month', 'birth_day', 'birthday',
            'postal_code', 'additional_info', 'quantity',
            'name_sei', 'name_mei', 'name',
            'know_from', 'email', 'attendees',
            'accept',
        );

        $replace = array(
            'フリガナ', 'セイ', 'メイ', '法人名',
            '郵便番号１', '郵便番号２', '住所１',
            '住所２', '住所３', '電話番号',
            '性別', '生年', '生月',
            '生日', '生年月日', '郵便番号',
            'その他', '希望口数', '姓',
            '名', '名前', '当商品を知った経緯',
            'メールアドレス', '参加人数', '同意する'
        );
        $replaceJson = str_replace($find, $replace, $string);
        $replacedString = json_decode($replaceJson, true);
        return $replacedString;
    }
}