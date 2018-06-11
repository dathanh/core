<?php

namespace App\Controller;

use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Component\AuthComponent;
use Cake\ORM;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Http\Session;
use Cake\Utility\Inflector;
use App\Utility\Utils;

class CoreController extends Controller {

    public static $_instance = null;
    public static $_globalObjects = [
        'components' => [],
        'tables' => []
    ];

    public function initialize() {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
    }

    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);

        self::$_instance = $this;
        Utils::useComponents($this, ['Navigation']);
        $menuList = $this->Navigation->getNavList($this->request);
        $breadrumb = $this->createBreadcrumb();
        $buttonTop = $this->_buttonTopCustom();
        $this->showButtonTop($buttonTop);

        $this->set('menuList', $menuList);
        $this->set('breadcrumb', $breadrumb);
    }

    protected function createBreadcrumb() {
        $controler = $this->request->getParam(['controller']);
        $action = $this->request->getParam(['action']);
        if (($controler == 'AdminDashboard') && ($action == 'index')) {
            $breadcrumb = [
                'home' => [
                    'name' => '<strong>Home</strong>',
                    'url' => Router::url(['controller' => 'AdminDashboard', 'action' => 'index']),
                ],
            ];
            return $breadcrumb;
        } else {
            $breadcrumb = [
                'home' => [
                    'name' => 'Home',
                    'url' => Router::url(['controller' => 'AdminDashboard', 'action' => 'index']),
                ],
                'controller' => [
                    'name' => Inflector::humanize(Inflector::underscore($controler)),
                    'url' => Router::url(['controller' => $controler, 'action' => 'index']),
                ],
                'action' => [
                    'name' => ($action == 'index') || (empty($action)) ? '' : Inflector::humanize(Inflector::underscore($action)),
                ],
                'title' => ($action == 'index') ? Inflector::humanize(Inflector::underscore($controler)) : Inflector::humanize(Inflector::underscore($action . " $controler"))
            ];
            return $breadcrumb;
        }
    }

    protected function showButtonTop($buttonTops) {
        $action = $this->request->getParam(['action']);
        foreach ($buttonTops as $buttonAction => $buttons) {
            if ($action == $buttonAction) {
                $this->set('buttonTops', $buttons);
            }
        }
    }

    protected function _buttonTopCustom() {
        $controller = $this->request->getParam(['controller']);
        $buttonTop = [
            'index' => [
                [
                    'name' => Inflector::humanize(Inflector::underscore("Add $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'add']),
                    'icon' => 'plus',
                    'color' => 'success',
                ],
            ],
            'add' => [
                [
                    'name' => Inflector::humanize(Inflector::underscore("List $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'index']),
                    'icon' => 'list',
                    'color' => 'primary',
                ],
            ],
            'edit' => [
                [
                    'name' => Inflector::humanize(Inflector::underscore("List $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'index']),
                    'icon' => 'list',
                    'color' => 'primary',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("Add $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'add']),
                    'icon' => 'plus',
                    'color' => 'success',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("View $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'view']),
                    'icon' => 'eye',
                    'color' => 'warning',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("Delete $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'delete']),
                    'icon' => 'trash',
                    'color' => 'danger',
                ],
            ],
            'view' => [
                [
                    'name' => Inflector::humanize(Inflector::underscore("List $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'index']),
                    'icon' => 'list',
                    'color' => 'primary',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("Add $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'add']),
                    'icon' => 'plus',
                    'color' => 'success',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("View $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'view']),
                    'icon' => 'eye',
                    'color' => 'warning',
                ],
                [
                    'name' => Inflector::humanize(Inflector::underscore("Delete $controller")),
                    'url' => Router::url(['controller' => $controller, 'action' => 'delete']),
                    'icon' => 'trash',
                    'color' => 'danger',
                ],
            ]
        ];
        return $buttonTop;
    }

}
