<?php

App::uses('ExceptionRenderer', 'Error');

class AppExceptionRenderer extends ExceptionRenderer {

    public function missingController($error) {
        $this->redirectToNotFoundPage();
    }

    public function missingAction($error) {
        $this->redirectToNotFoundPage();
    }

    public function notFound($error) {
        $this->redirectToNotFoundPage();
    }

    private function redirectToNotFoundPage() {
        $this->controller->layout = false;
        $this->controller->render('/Errors/error404');
        $this->controller->render('/Errors/error404');
        $this->controller->response->send();
    }

}