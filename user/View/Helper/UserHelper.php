<?php

APP::import('Model', 'User');

class UserHelper extends AppHelper {

    /**
     * view用の性別
     * @return array
     */
    public function getSex() {
        return array(
            User::MALE => '男性',
            User::FEMALE => '女性'
        );
    }

}
