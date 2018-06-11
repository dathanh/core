<?php

namespace App\Controller;

use Cake\ORM;
use Cake\Core\Configure;
use Cake\Routing\Route;
use App\Utility\Utils;
use App\Controller\CoreController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;

abstract class BackendController extends CoreController {

    protected $slug;
    protected $modelName;
    protected $model;
    protected $multiLanguageFields;
    protected $singlePhotos;
    protected $multiPhotos;

    public function index() {

        $this->render('/Element/Backend/list_view');
    }

    public function edit() {
        $mutilanguage = Configure::read('LanguageList');
        $this->_createTemplateFieldUpdate();
        $this->set('mutilanguage', $mutilanguage);
        $this->render('/Element/Backend/create_update_view');

        if ($this->request->is('post')) {
            $requestData = $this->_prepareDataUpdate($this->request->getData());
            $this->_createUpdate($requestData);
        }
    }

    protected function _prepareDataUpdate($dataRequest) {
        
    }

    protected function _createUpdate($requestData) {
        
    }

    protected function _createTemplateFieldUpdate() {
        $inputField = [];
        $multiLangFields = [];

        $inputField = array_merge($inputField, $this->_prepareObject());
        $inputField = array_merge($inputField, $this->_prepareObject());
        if (!empty($this->multiLanguageFields)) {
            $multiLangFields = array_merge($multiLangFields, $this->multiLanguageFields);
        }

        if (!empty($this->singlePhotos)) {
            $inputField = array_merge($inputField, $this->singlePhotos);
        }

//        if (!empty($this->multiPhotos)) {
//            $inputField = array_merge($inputField, $this->multiPhotos);
//        }

        $this->set('inputField', $inputField);
        $this->set('multiLangFields', $multiLangFields);
    }

    protected abstract function _prepareObject();
}
