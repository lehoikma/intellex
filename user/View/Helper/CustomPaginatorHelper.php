<?php

App::uses('PaginatorHelper', 'View/Helper');

class CustomPaginatorHelper extends PaginatorHelper {

    public function render($urlParams = null, $options = null) {
        $totalPage = intval($this->counter('{:pages}'));
        if ($totalPage <= 1) {
            return '';
        }
        $prevLink = $this->renderJumpLink('prev');
        $numbers = $this->renderNumbers($urlParams, $options);
        $nextLink = $this->renderJumpLink('next');
        return $prevLink . $numbers . $nextLink;
    }

    /**
     * @param null $urlParams
     * @param null $options
     * @return ページリストのstring
     */
    private function renderNumbers($urlParams = null, $options = null) {
        if(!empty($options)){
            $this->options = $options;
        }
        $this->options['url']['?'] = $urlParams;
        return $this->numbers(array(
            'tag'           => 'li',
            'separator'     => '',
            'currentClass'  => 'active',
            'currentTag'    => 'a'
        ));
    }

    /**
     * ページングのprev, next ボタンを作成
     * @param $type
     * @return string
     */
    private function renderJumpLink($type) {
        if ($type == 'prev') {
            return $this->params()['prevPage'] ? $this->prev('前へ', array('tag' => 'li')) : '<li class="none"><span></span></li>';
        }
        if ($type == 'next') {
            return $this->params()['nextPage'] ? $this->next('次へ', array('tag' => 'li')) : '<li class="none"><span></span></li>';
        }
        return '';
    }
}
