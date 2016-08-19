<?php

class SeminarsController extends AppController {

    public $components = array(
            'Session',
            'Paginator',
            'seminarComponent' => array('className' => 'Seminar'),
            'speakerComponent' => array('className' => 'Speaker')
    );
    public $helpers = array('Html', 'Form');

    /**
     *セミナー一覧
     */
    public function index() {
        $this->Paginator->settings = array(
                'limit' => Configure::read('per_page'),
                'recursive' => 2,
                'order' => array(
                    'Seminar.id' => 'desc'
                )
        );
        $data = $this->Paginator->paginate('Seminar');
        $this->set('seminars', $data);
    }

    /**
     * セミナー作成画面のviewを呼び出すためのアクション
     */
    public function create() {}

    /**
     * セミナー作成を実施する
     * @return Response|CakeResponse|null
     */
    public function save() {
        if ($this->request->is('get')) throw new NotFoundException();

        $input = $this->data;
        $this->Seminar->set($input);
        $isValidInput = $this->Seminar->validates();
        if (!$isValidInput) {
            if (!empty($input['Seminar']['speaker_ids'])) {
                $this->set('selectedSpeakers', $this->speakerComponent->findAllByIds($input['Seminar']['speaker_ids']));
            }
            $this->setReturningMessage('error', Configure::read('msg')['seminar_creation_failed']);
            return $this->render('create');
        }
        $seminarImgPath = $this->seminarComponent->uploadImage($input['Seminar']['image']);
        if (empty($seminarImgPath)) {
            if (!empty($input['Seminar']['speaker_ids'])) {
                $this->set('selectedSpeakers', $this->speakerComponent->findAllByIds($input['Seminar']['speaker_ids']));
            }
            $this->setReturningMessage('error', Configure::read('msg')['image_upload_failed']);
            return $this->render('create');
        }
        $input['Seminar']['image']['path'] = $seminarImgPath;
        $isCreated = $this->seminarComponent->createSeminar($input);
        if ($isCreated) {
            $this->setReturningMessage('success', Configure::read('msg')['seminar_successfully_created']);
            return $this->redirect(array('action' => 'index'));
        }

        $this->setReturningMessage('error', Configure::read('msg')['seminar_creation_failed']);
        return $this->render('create');
    }

    /**
     * セミナー編集のviewにパラメータを渡す
     * @param $seminarId
     */
    public function edit($seminarId) {
        $seminar = $this->seminarComponent->findRecursiveSeminarById($seminarId);
        if (empty($seminar)) throw new NotFoundException();
        $this->set('seminar', $seminar);
        $this->render('create');
    }

    /**
     * セミナー編集を実施する
     * @param セミナー情報のpostデータ
     * @return CakeResponse
     */
    public function update() {
        if ($this->request->is('get')) throw new NotFoundException();

        $input = $this->data;
        $this->Seminar->set($input);
        //編集画面でイメージが選択されてなかったらバリデーションから画像をはずす
        if ($input['Seminar']['image']['size'] == 0){
            $this->Seminar->validator()->remove('image');
        }
        $isValidInput = $this->Seminar->validates();
        //入力した情報が無効だったらエラーメッセージを渡す。
        if (!$isValidInput) {
            $this->set('seminar', $this->seminarComponent->findRecursiveSeminarById($input['Seminar']['id']));
            $this->setReturningMessage('error', Configure::read('msg')['seminar_update_failed']);
            return $this->render('create');
        }
        //セミナー画像をアップロードしたかをチェックして、実施する
        if ($input['Seminar']['image']['size'] != 0) {
            $seminarImgPath = $this->seminarComponent->uploadImage($input['Seminar']['image']);
            $input['Seminar']['image']['path'] = $seminarImgPath;
        }
        $isUpdated = $this->seminarComponent->updateSeminar($input);
        if ($isUpdated) {
            $this->setReturningMessage('success', Configure::read('msg')['seminar_successfully_updated']);
            $this->redirect('/seminars/' . $input['Seminar']['id']);
        }

        $this->set('seminar', $this->seminarComponent->findRecursiveSeminarById($input['Seminar']['id']));
        $this->setReturningMessage('error', Configure::read('msg')['seminar_update_failed']);
        return $this->render('create');
    }

    /**
     * セミナーのコピー機能を実施する
     * @param コピーされる $seminarId
     * @return 作成したseminarの詳細画面にリダイレクトする
     */
    public function copySeminar($seminarId) {
        if ($this->request->is('get')) throw new NotFoundException();
        $newSeminarId = $this->seminarComponent->copy($seminarId);
        if (empty($newSeminarId)) {
            $this->setReturningMessage('error', Configure::read('msg')['copy_seminar_failed']);
            $this->redirect($this->referer());
        }
        $this->setReturningMessage('success', Configure::read('msg')['seminar_successfully_copied']);
        $this->redirect('/seminars/' . $newSeminarId);
    }
}
