<?php

class SpeakersController extends AppController {

    public $components = array(
            'Session',
            'Paginator',
            'speakerComponent' => array('className' => 'Speaker'),
    );
    public $helpers = array('Html', 'Form');

    /**
     * 講師一覧
     */
    public function index() {
        $this->Paginator->settings = array(
                'limit' => Configure::read('per_page'),
                'order' => array('Speaker.created' => 'desc')
        );
        $this->set('speakers', $this->Paginator->paginate('Speaker'));
        $this->render('list');
    }

    /**
     * 講師作成画面を呼び出す
     */
    public function create(){}

    /**
     * 講師作成を実施する
     */
    public function save() {
        if ($this->request->is('get')) throw new NotFoundException();

        $input = $this->data;
        $this->Speaker->set($input);
        $isValidInput = $this->Speaker->validates();
        if (!$isValidInput) {
            $this->setReturningMessage('error', Configure::read('msg')['speaker_creation_failed']);
            return $this->render('create');
        }
        $speakerImgPath = $this->speakerComponent->uploadImage($input['Speaker']['image']);
        if (empty($speakerImgPath)) {
            $this->setReturningMessage('error', Configure::read('msg')['image_upload_failed']);
            return $this->render('create');
        }
        $input['Speaker']['image'] = $speakerImgPath;
        $isCreated = $this->speakerComponent->createSpeaker($input);
        if ($isCreated) {
            $this->setReturningMessage('success', Configure::read('msg')['speaker_successfully_created']);
            return $this->redirect(array('action' => 'index'));
        }

        $this->setReturningMessage('error', Configure::read('msg')['speaker_creation_failed']);
        return $this->render('create');
    }

    /**
     * 講師削除
     * @param $speakerId
     */
    public function delete($speakerId) {
        $isDeleted = $this->speakerComponent->deleteSpeaker($speakerId);
        if ($isDeleted) {
            $this->setReturningMessage('success', Configure::read('msg')['speaker_successfully_deleted']);
        } else {
            $this->setReturningMessage('error', Configure::read('msg')['speaker_deletion_failed']);
        }
        $this->redirect($this->referer());
    }

    /**
     * postのIdsで講師を
     */
    public function findAllByIds() {
        if ($this->request->is('get')) return '';
        $this->autoRender = false;
        $ids = $this->data['ids'];
        $speakers = $this->speakerComponent->findAllByIds($ids);
        return json_encode($speakers);
    }

    public function edit($speakerId){
        $speaker = $this->Speaker->findByid($speakerId);
        $this->set('speaker', $speaker);
        $this->render('create');

    }

   public function update(){
       if ($this->request->is('get')) throw new NotFoundException();
       $blackList = array();

       $input = $this->data;
       $this->Speaker->set($input);
       $this->Speaker->validator()->remove('image');

       if(!$this->Speaker->validates()){
           $this->set('speaker', $this->Speaker->findByid($input['Speaker']['id']));
           $this->setReturningMessage('error', Configure::read('msg')['speaker_update_failed']);
           return $this->render('create');
       }
       if ($input['Speaker']['image']['size'] != 0) {
           $speakerImgPath = $this->speakerComponent->uploadImage($input['Speaker']['image']);
           $input['Speaker']['image'] = $speakerImgPath;
       } else {
           unset($input['Speaker']['image']);
           $blackList = array('image');
       }

       $this->Speaker->save($input, true, array_diff(array_keys($this->Speaker->schema()), $blackList));

       if($this->Speaker->save($input)){
           $this->setReturningMessage('success', Configure::read('msg')['speaker_successfully_updated']);
           $this->redirect('/speakers/' . $input['Speaker']['id']);
       }
       $this->set('speaker', $this->Speaker->findByid($input['Speaker']['id']));
       $this->setReturningMessage('error', Configure::read('msg')['speaker_update_failed']);
       return $this->render('create');
   }

}