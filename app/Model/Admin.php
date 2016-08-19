<?php
class Admin extends AppModel {

    public $actsAs = array('CakeSoftDelete.SoftDeletable');
    public $validate = array(
        'name'  => array(
            'required' => array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => '名前を入力して下さい。'
            ),
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => 'メールアドレスを入力してください。'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => '入力されたメールアドレスは既に登録されています'
            ),
            'data_type' => array(
                'rule' => 'email',
                'message' => 'ユーザIDに誤りがあります。'
            ),
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'パスワードを入力してください。'
            ),
            'password_match' => array(
                'rule' => 'passwordConfirm',
                'message' => '入力された2つのパスワードが一致しません。'
            )
        ),
        'password_confirm' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'パスワード(確認)を入力してください。'
            )
        )
    );

    public function beforeSave($options = array()) {

        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = sha1(
                $this->data[$this->alias]['password']
            );
        }

        return true;

    }

    public function passwordConfirm(){
        //２つのパスワードフィールドが一致する事を確認する
        if($this->data['Admin']['password'] === $this->data['Admin']['password_confirm']){
            return true;
        } else {
            return false;
        }

    }
}
