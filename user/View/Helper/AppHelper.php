<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {

    /**
     * リクエストデータの中に($param, $value)というpairが存在してるかをチェック
     * @param null $model
     * @param $param
     * @param $value
     * @return bool
     */
    public function hasDataInRequest($model = null, $param, $value) {
        $requestData = $this->data;
        if (empty($requestData)) {
            return false;
        }
        if (is_null($model)) {
            return isset($requestData[$param]) ? $requestData[$param] == $value : false;
        }
        if (!isset($requestData[$model][$param])) return false;
        if (is_array($requestData[$model][$param])){
            return in_array($value, $requestData[$model][$param]);
        } else {
            return $requestData[$model][$param] == $value;
        }
    }

    public function formalizeDateByDateTime($dateTime) {
        $datetime = new DateTime($dateTime);
        $week = array("日", "月", "火", "水", "木", "金", "土");
        $w = (int)$datetime->format('w');
        return date('Y/m/d' , strtotime($dateTime))  . '(' . $week[$w] . ')';

    }

    public function getTimeFromDateTime($dateTime) {
        $dateTime = strtotime($dateTime);
        if (!$dateTime) return '';
        return date('H:i', $dateTime);
    }

    public function formalizeDateTimeByDateTime($dateTime) {
        $date = $this->formalizeDateByDateTime($dateTime);
        $time = $this->getTimeFromDateTime($dateTime);
        return $date . ' ' . $time;
    }
}
