<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->entry();
    }

    /**
     * アクションの実施した結果のメッセージをセットする
     * @param $msgType
     * @param $msgContent
     */
    public function setReturningMessage($msgType, $msgContent) {
        if (empty($msgType) || empty($msgContent)) return;
        $this->Session->write('msgType', $msgType);
        $this->Session->write('msgContent', $msgContent);
    }

    /**
     * adminがログインしたか、していないかによってリダイレクトする
     * @return Response|null|void
     */
    private function entry() {
        $controllerName = $this->name;
        $actionName = $this->action;
        if (!$this->isLoggedIn() && $controllerName != 'Admins') {
            return $this->redirect(array(
                'controller' => 'admins', 'action' => 'login'
            ));
        }

        if ($this->isLoggedIn() && $controllerName == 'Admins' && $actionName == 'login') {
            return $this->redirect('/users');
        }
        return;
    }

    /**
     * viewを作成する前に、view用のメッセージとログインしているadmin情報をセットする
     */
    public function beforeRender() {
        $msgType = $this->Session->read('msgType');
        $msgContent = $this->Session->read('msgContent');
        if (!empty($msgType) && !empty($msgContent)) {
            $this->set('msgType', $msgType);
            $this->set('msgContent', $msgContent);
            $this->Session->delete('msgType');
            $this->Session->delete('msgContent');
        }
        if ($this->isLoggedIn()){
            $this->set('admin', $this->getLoggedInAdmin());
        }
    }

    /**
     * adminがログインしたかをチェックする
     * @return bool
     */
    public function isLoggedIn() {
        return $this->Session->check('admin');
    }

    public function getLoggedInAdmin() {
        return $this->Session->read('admin');
    }
}
