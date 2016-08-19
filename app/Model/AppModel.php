<?php
/**
 * Application model for Cake.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
App::uses('SoftDeletableModel', 'CakeSoftDelete.Model');

class AppModel extends SoftDeletableModel {

    /*
     *  modifiedカラムを持っているテーブルを更新するたびに、そのテーブルのmodifiedも更新時刻で更新する。
     */
    public function beforeSave($options = array()) {
        if ($this->id || isset($this->data[$this->alias][$this->primaryKey])) {
            if (isset($this->data[$this->alias]['modified'])) {
                $this->data[$this->alias]['modified'] = Configure::read('current_datetime');
            }
        }
    }
}
