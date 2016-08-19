<?php

App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Model', 'SeminarUser');

class SeminarUserComponent extends Component {

    public function __construct(){
        $this->seminarModel = new Seminar();
    }

    public function createAllInputData($input){
        $extraData = array_merge($input['User'], $input['SeminarUser']);
        $input['SeminarUser']['extra_data'] = json_encode($extraData);
        $input['User']['name'] = $input['User']['name_sei'] . $input['User']['name_mei'];
        $input['User']['name_kana'] = $input['User']['name_sei_kana'] . $input['User']['name_mei_kana'];
        return $input;
    }

    public function sendSeminarThanksMail($seminarId, $userInputData){
        $seminar = $this->seminarModel->find('first', array(
                'conditions' => array('Seminar.id =' => $seminarId),
                'recursive'  => 2
        ));

        $email = new CakeEmail();
        $email->emailFormat('text');
        $email->template('seminar/thanks');
        $email->to($userInputData['User']['email']);
        $email->subject('【株式会社インテリックス】セミナー申込ありがとうございます');
        $email->viewVars(array(
                'user' => $userInputData['User'],
                'seminar' => $seminar));
        $email->send();
    }

}