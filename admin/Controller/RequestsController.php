<?php

/**
 * 資料請求のクラス
 * Class RequestsController
 */
class RequestsController extends AppController {

    public $components = array(
        'Session',
        'Paginator',
        'docRequestComponent' => array('className' => 'DocRequest')
    );
    public $helpers = array('Html', 'Form');
    public $uses = array('DocRequest');

    /**
     * 資料請求一覧をハンドルする
     */
    public function index() {
        $params = $this->params['url'];
        $conditions = !empty($params) ? $this->docRequestComponent->createFilterConditionsFromParams($params) : array();
        $this->Paginator->settings = array(
            'limit' => Configure::read('per_page'),
            'order' => array(
                'DocRequest.created' => 'desc'
            )
        );
        $data = $this->Paginator->paginate('DocRequest', $conditions);
        $this->set('requests', $data);
        $this->render('list');
    }

}