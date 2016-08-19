<?php



class TopController extends AppController {

    public $uses = array('Seminar' , 'SeminarTypeRelation');

    public $components = array(
            'Session',
            'seminarComponent' => array('className' => 'Seminar'),
    );


    public function index(){
        $currentDateTime = Configure::read('current_datetime');
        $typeId = $this->params->query('type');

        $seminarIds = !empty($typeId) ? $this->seminarComponent->findIdsByTypeIdAsArray($typeId) : array();
        if (!empty($seminarIds)) $conditions['id'] = $seminarIds;
        $conditions['publish_from <='] = $currentDateTime;
        $conditions['publish_to >='] = $currentDateTime;
        $conditions['status'] = Configure::read('seminar_statuses')['publish'];
        $wantedSeminars = $this->Seminar->find('all', array(
                'conditions' => $conditions,
                'limit' => Configure::read('top_per_page'),
                'recursive' => 2,
                'order' => array(
                        'Seminar.open_from' => 'asc'
                )
        ));
        $this->set('seminars', $wantedSeminars);
    }

}