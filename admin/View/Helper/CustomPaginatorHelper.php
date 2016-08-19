<?php

App::uses('PaginatorHelper', 'View/Helper');
App::uses('CommonHelper', 'View/Helper');

class CustomPaginatorHelper extends PaginatorHelper {

    /**
     * @param null $urlParams
     * @param null $options
     * @return ページリストのstring
     */
    public function renderNumbers($urlParams = null, $options = null) {
        if(!empty($options)){
            $this->options = $options;
        }
        $this->options['url']['?'] = $urlParams;
        return $this->numbers(array(
            'first'         => 'First',
            'last'          => 'Last',
            'tag'           => 'li',
            'separator'     => '',
            'currentClass'  => 'active',
            'currentTag'    => 'span',
        ));
    }

    public function renderSummaryInfo() {
        return $this->counter('{:count}件中{:start}件～{:end}件表示しています');
    }
}
