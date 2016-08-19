<?php

App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Model', 'DocRequest');

class DocRequestComponent extends Component {

    protected $docRequestModel;

    public function __construct() {
        $this->docRequestModel = new DocRequest();
    }

    /**
     * 資料請求画面の絞り込み条件を取ってき田パラメータによって作成する
     * @param $params
     * @return array
     */
    public function createFilterConditionsFromParams($params) {
        $conditions = array();
        if (!empty($params['name'])) {
            $name = trim(strtolower($params['name']));
            $conditions['OR'] = array(
                    'User.name_sei LIKE' => "%$name%",
                    'User.name_mei LIKE' => "%$name%",
                    'User.name_sei_kana LIKE' => "%$name%",
                    'User.name_mei_kana LIKE' => "%$name%",
                    '(User.name_sei || User.name_mei) LIKE' => "%$name%",
                    '(User.name_sei_kana || User.name_mei_kana) LIKE' => "%$name%"
            );
        }
        if (!empty($params['sex'])) {
            $searchSexKeys = array();
            foreach ($params['sex'] as $sexCode=>$checked) {
                if (boolval($checked)) $searchSexKeys[] = $sexCode;
            }
            if (!empty($searchSexKeys)) $conditions['User.sex'] = $searchSexKeys;
        }
        if (!empty($params['age_fr'])) {
            $birthTo = date('Y-m-d', strtotime(Configure::read('current_datetime') . '- '. $params['age_fr'] .'years'));
            $conditions['User.birthday <='] = $birthTo;
        }
        if (!empty($params['age_to'])) {
            $birthFrom = date('Y-m-d', strtotime(Configure::read('current_datetime') . '- '. intval($params['age_to'] + 1) .'years'));
            $conditions['User.birthday >'] = $birthFrom;
        }
        if (!empty($params['re_fr'])) {
            $conditions['DocRequest.created >='] = $params['re_fr'];
        }
        if (!empty($params['re_to'])) {
            $conditions['DocRequest.created <='] = $params['re_to'] . ' 23:59:59';
        }
        return $conditions;
    }

    /**
     * 資料請求を作成する
     * @param $input
     * @return string
     */
    public function createDocRequest($input) {
        try {
            $this->docRequestModel->create();
            $this->docRequestModel->save($input, array('validate' => false));
            $newId = $this->docRequestModel->getLastInsertID();
        } catch (Exception $e) {
            return '';
        }
        return $newId;
    }


    /**
     * @param $input
     * @return mixed
     */
    public function customDataAfterReceiving($input) {
        if (empty($input)) return $input;

        $user = $input['User'];
        if (!empty($user)) {
            //全角を半角に交換する
            foreach($user as $key => $val){
                if($key == ('birth_year' || 'birth_month' || 'birth_day' || 'tel' || 'postal_code1' || 'postal_code2')) {
                    $user[$key] = mb_convert_kana($val, 'a');
                }
            }
            $input['User'] = $user;

            if (!empty($user['birth_year']) && !empty($user['birth_month']) && !empty($user['birth_day'])) {
                $input['User']['birthday'] = $user['birth_year'] . '-' . $user['birth_month'] . '-' . $user['birth_day'];
            } else {
                $input['User']['birthday'] = null;
            }

            $input['User']['postal_code'] = $user['postal_code1'] . '-' .  $user['postal_code2'];
            $input['User']['name'] = $user['name_sei'] . $user['name_mei'];
            $input['User']['name_kana'] = $user['name_sei_kana'] . $user['name_mei_kana'];
            // オプトイン情報は一旦取らない。
            // $input['User']['optin'] = (boolval($user['optout'])) ? 0 : 1;
        }

        $docRequest = $input['DocRequest'];
        $knowFrom = array();
        if (!empty($docRequest)) {
            $others = $docRequest['know_from_others'];
            //当商品を知った経緯のboxをチェックされた項目をcustomizeする
            if (!empty($docRequest['know_from'])) {
                foreach ($docRequest['know_from'] as $masterSource) {
                    if (isset($others[$masterSource])) {
                        $temp = array();
                        $temp[] = $masterSource;
                        $temp[][] = $others[$masterSource];
                        $knowFrom[] = $temp;
                    } else {
                        $knowFrom[] = $masterSource;
                    }
                }
            }
            //当商品を知った経緯のboxをチェックしないで、入力された項目をcustomizeする
            foreach($others as $masterSource=>$enteredSource) {
                if (!empty($enteredSource)) {
                    if (empty($docRequest['know_from']) || !in_array($masterSource, $docRequest['know_from'])) {
                        $temp = array();
                        $temp[] = $masterSource;
                        $temp[][] = $enteredSource;
                        $knowFrom[] = $temp;
                    }
                }
            }
        }
        $input['DocRequest']['know_from'] = $knowFrom;

        //入力したデータを全部まとめる
        $extraData = array_merge($input['User'], $input['DocRequest'] );

        //unset unused properties
        unset($extraData['know_from_others']);
        unset($extraData['optout']);
        unset($extraData['accept']);

        //入力したデータをセットする
        $input['DocRequest']['extra_data'] = json_encode($extraData);
        $input['DocRequest']['know_from'] = json_encode($knowFrom);

        return $input;
    }

    public function sendThanksEmail($user) {
        $email = new CakeEmail();
        $email->template('inquiry/thanks');
        $email->to($user['email']);
        $email->subject('【株式会社インテリックス】資料請求ありがとうございます');
        $email->viewVars(array('user' => $user));
        $email->send();
    }

}
