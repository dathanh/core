<?php

namespace App\Controller;

use Cake\Routing\Route;
use Cake\Core\Configure;
use Cake\ORM;
use Cake\Event\Event;
use App\Utility\Utils;
use App\Controller\CoreController;
use App\Controller\BackendController;

class ConfigsController extends BackendController {

    protected $multiLanguageFields = [
        'title' => [
            'label' => 'tieu de',
            'type' => 'text',
            'value' => '',
            'validation' => ''
        ],
        'content' => [
            'label' => 'noi dung',
            'type' => 'textarea',
            'value' => '',
            'validation' => ''
        ],
    ];
    protected $singlePhotos = [
        'thumbnail' => [
            'label' => 'thumbnail',
            'type' => 'upload',
            'isRequire' => true,
            'width' => 400,
            'height' => 400,
        ],
        'banner' => [
            'label' => 'banner',
            'type' => 'upload',
            'isRequire' => true,
            'width' => 400,
            'height' => 400,
        ],
    ];
    protected $multiPhotos = [
        'gallery' => [
            'isRequired' => true,
        ],
    ];

    public function initialize() {
        parent::initialize();
        $this->modelName = 'configs';
        $this->model = 'Configs';
    }

    protected function _prepareObject() {
        $inputField = [
            'title' => [
                'label' => 'title fqwfqf',
                'type' => 'text',
                'value' => '',
                'validation' => ''
            ],
            'content' => [
                'label' => 'content efwef',
                'type' => 'textarea',
                'value' => '',
                'validation' => ''
            ],
            'age' => [
                'label' => 'age',
                'type' => 'dropdown',
                'options' => ['1', '2', 'a', 'b'],
                'value' => '',
                'validation' => ''
            ],
        ];
        return $inputField;
    }

}
