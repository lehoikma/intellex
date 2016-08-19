<?php

App::uses('AppHelper', 'View/Helper');

class CommonHelper extends AppHelper {

    public $urlParams;

    public function __construct() {
        $this->urlParams = $_GET;
    }

    /**
     * urlにあるパラメータの値を取得する
     * @param $paramName
     * @return string
     */
    public function getUrlParam($paramName) {
        if (empty($this->urlParams) || !is_array($this->urlParams) || empty($paramName)) return '';
        if (array_key_exists($paramName, $this->urlParams)){
            return $this->urlParams[$paramName];
        }else{
            return '';
        }
    }

    /**
     * 日時を日本の時間の形に交換する
     * @param $dateTime
     * @return bool|string
     */
    public function dateTimeToString($dateTime) {
        $time = strtotime($dateTime);
        if (!$time) return '';
        return date('Y/m/d H:i', $time);
    }

    /**
     * 日付を日本の日付の形に交換する
     * @param $date
     * @return bool|string
     */
    public function dateToString($date) {
        $time = strtotime($date);
        if (!$time) return '';
        return date('Y/m/d', $time);
    }
}
