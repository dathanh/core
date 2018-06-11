<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Configure;
use Cake\Routing\Router;
use App\Utility\Utils;

class NavigationComponent extends Component {

    public function getNavList($request) {
        if (empty($request)) {
            return [];
        }
        $controller = !empty($request->getParam(['controller'])) ? $request->getParam(['controller']) : FALSE;
        $action = !empty($request->getParam(['action'])) ? $request->getParam(['action']) : FALSE;
        $menuList = [
            'content' => [
                'label' => 'Content Managemnet',
                'icon' => 'star',
                'subNav' => [
                    [
                        'label' => 'AdminDashboard',
                        'icon' => 'th-large',
                        'class' => ($controller == 'AdminDashboard') ? 'active' : '',
                        'subNav' => [
                            [
                                'label' => 'list zzz',
                                'class' => ($action == 'index') ? 'active' : '',
                                'url' => Router::url(['controller' => 'AdminDashboard', 'action' => 'index'])
                            ],
                        ]
                    ],
                    [
                        'label' => 'Dashboard',
                        'icon' => 'th-large',
                        'class' => ($controller == 'AdminDashboard1') ? 'active' : '',
                        'subNav' => [
                            [
                                'label' => 'list zzz',
                                'class' => ($action == 'index') ? 'active' : '',
                                'url' => Router::url(['controller' => 'AdminDashboard1', 'action' => 'index'])
                            ],
                            [
                                'label' => 'list zzz1',
                                'class' => ($action == 'add') ? 'active' : '',
                                'url' => Router::url(['controller' => 'AdminDashboard1', 'action' => 'add'])
                            ],
                            [
                                'label' => 'list zzz2',
                                'class' => ($action == 'edit') ? 'active' : '',
                                'url' => Router::url(['controller' => 'AdminDashboard1', 'action' => 'edit'])
                            ],
                            [
                                'label' => 'list zzz3',
                                'class' => ($action == 'view') ? 'active' : '',
                                'url' => Router::url(['controller' => 'AdminDashboard1', 'action' => 'view'])
                            ],
                        ]
                    ]
                ]
            ]
        ];
        return $menuList;
    }

}
