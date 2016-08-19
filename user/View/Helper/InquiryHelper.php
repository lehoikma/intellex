<?php

class InquiryHelper extends AppHelper {

    public $helpers = array('Form');

    public function getPrefectureList() {
        return array_combine(Configure::read('master_prefs'), Configure::read('master_prefs'));
    }

    /**
     * 当商品を知った経緯を取得する
     * @param $group
     * @return array
     */
    public function getSourceGroup($group) {
        $sources = Configure::read('know_from');
        $result = array();
        foreach ($sources as $src) {
            if($src['group'] == $group) {
                $result[] = $src;
            }
        }
        return $result;
    }

    public function createInputTextFromSource($src) {
        if (empty($src) || empty($src['additionalInput'])) return '';

        $inputName = 'DocRequest[know_from_others][' . $src['source'] . ']';
        if (!empty($this->data['DocRequest']['know_from_others'][$src['source']])){
            $requestValue = $this->data['DocRequest']['know_from_others'][$src['source']];
        } else {
            $requestValue = '';
        }
        return $this->Form->input('', array(
                'type'      => 'text',
                'name'      => $inputName,
                'label'     => false,
                'class'     => 'sizeM',
                'div'       => false,
                'error'     => false,
                'required'  => false,
                'default'   => $requestValue,
                'placeholder' => $src['additionalInput']['placeholder'],
        ));
    }

    public function countValidationErrors($validationErrors, $models) {
        if(!is_array($models)) return 0;

        $count = 0;
        foreach($models as $model) {
            $count += count($validationErrors[$model]);
        }
        return $count;
    }

}
