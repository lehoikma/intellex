<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */

Router::connect('', array('controller' => 'admins', 'action' => 'login'));

/**
 * セミナー管理
 */
Router::connect(
        '/seminars/:seminar_id/attendees',
        array('controller' => 'users', 'action' => 'seminarAttendees'),
        array(
                'pass' => array('seminar_id'),
                'seminar_id' => '[0-9]+'
        )
);
Router::connect(
        '/seminars/:seminar_id/attendees/*',
        array('controller' => 'users', 'action' => 'seminarAttendees'),
        array(
                'pass' => array('seminar_id', 'page'),
                'seminar_id' => '[0-9]+',
                'page' => '[0-9]+',
        )
);
Router::connect(
        '/seminars/:seminar_id/copy/*',
        array('controller' => 'seminars', 'action' => 'copySeminar'),
        array('pass' => array('seminar_id'), 'seminar_id' => '[0-9]+')
);
Router::connect(
        '/seminars/:seminar_id',
        array('controller' => 'seminars', 'action' => 'edit'),
        array('pass' => array('seminar_id'), 'seminar_id' => '[0-9]+')
);

/**
 * ユーザー管理
 */
Router::connect(
        '/users/:user_id',
        array('controller' => 'users', 'action' => 'edit'),
        array('pass' => array('user_id'), 'user_id' => '[0-9]+')
);


/**
 * セミナー講師管理
 */
Router::connect(
        '/speakers/:speaker_id',
        array('controller' => 'speakers', 'action' => 'edit'),
        array('pass' => array('speaker_id'), 'speaker_id' => '[0-9]+')
);
Router::connect(
        '/speakers/:speaker_id/delete',
        array('controller' => 'speakers', 'action' => 'delete'),
        array('pass' => array('speaker_id'), 'speaker_id' => '[0-9]+')
);


/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
