<?php

App::uses('CommonHelper', 'View/Helper');

class AdminHelper extends CommonHelper {


    /**
     * 表示している画面がadmin詳細画面かをチェックする
     * @return bool
     */
    public function isEditing() {
        if ($this->params['controller'] == 'admins' && $this->params['action'] == 'edit') {
            return true;
        }
        return false;
    }

    /**
     * 表示している画面がadminの更新中かをチェックする
     * @return bool
     */
    public function isUpdating() {
        if ($this->params['controller'] == 'admins' && $this->params['action'] == 'update') {
            return true;
        }
        return false;
    }
}
