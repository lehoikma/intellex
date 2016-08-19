<?php

App::uses('ComponentCollection', 'Controller');
App::uses('SeminarComponent', 'Controller/Component');
App::uses('CakeEmail', 'Network/Email');

class ComingSeminarShell extends AppShell {

    protected $seminarComponent;

    public function startup() {
        $collection = new ComponentCollection();
        $this->seminarComponent = $collection->load('Seminar');
    }

    public function main() {
        $seminars = $this->seminarComponent->findComingSeminars();

        foreach ($seminars as $seminar) {
            foreach($seminar['SeminarUser'] as $su) {
                if (empty($su['User']['email'])) {
                    continue;
                }

                $mailSubject = sprintf('【%s】開催の「%s」のご予約の確認について',
                    $this->seminarComponent->formalizeDateTime($seminar['Seminar']['open_from']),
                    $seminar['Seminar']['title']
                );
                $email = new CakeEmail();
                $email->template('seminar/coming');
                $email->to($su['User']['email']);
                $email->subject($mailSubject);
                $email->viewVars(array(
                    'user' => $su['User'],
                    'seminar' => $seminar['Seminar'],
                    'seminarSpeakerRelation' => $seminar['SeminarSpeakerRelation']
                ));
                $email->send();
            }
        }
    }
}