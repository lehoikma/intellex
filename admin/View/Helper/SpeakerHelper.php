<?php

App::uses('CommonHelper', 'View/Helper');

class SpeakerHelper extends CommonHelper {

    /**
     * 表示している画面が講師詳細画面かをチェックする
     * @return bool
     */
    public function isEditing() {
        if ($this->params['controller'] == 'speakers' && $this->params['action'] == 'edit') {
            return true;
        }
        return false;
    }

    /**
     * 表示している画面が講師の更新中かをチェックする
     * @return bool
     */
    public function isUpdating() {
        if ($this->params['controller'] == 'speakers' && $this->params['action'] == 'update') {
            return true;
        }
        return false;
    }


}
