<?php

namespace App\Controller;

use Cake\ORM;
use Cake\Core\Configure;
use Cake\Routing\Route;
use App\Utility\Utils;
use App\Controller\CoreController;
use Cake\ORM\TableRegistry;
use Cake\ORM\Table;
use App\Model\Entity\Config;
use App\Model\Entity\LanguageContent;

abstract class BackendController extends CoreController {

    protected $slug;
    protected $modelName;
    protected $model;
    protected $multiLanguageFields;
    protected $singlePhotos;
    protected $multiPhotos;

    public function initialize() {
        parent::initialize();
        Utils::useComponents($this, ['Upload']);
        Utils::useTables($this, ['LanguageContent']);
    }

    public function index() {

        $this->render('/Element/Backend/list_view');
    }

    public function edit() {
        $this->_createTemplateFieldUpdate();
        $this->render('/Element/Backend/create_update_view');

        if ($this->request->is('post')) {
            $requestData = $this->_prepareDataUpdate($this->request->getData());
            $this->_createUpdate($requestData);
        }
    }

    protected function _prepareDataUpdate($requestData) {

        return $requestData;
    }

    protected function _createUpdate($requestData, $id = false) {
        if ($id) {
            $object = $this->getObject($id);
            if (empty($object)) {

                return $this->redirect(['action' => 'index']);
            }
        } else {
            $object = $this->model->newEntity();
        }
        $errors = [];
        $object = $this->model->patchEntity($object, $requestData);
        foreach ($this->singlePhotos as $fieldName => $fieldInfo) {
//            debug($fieldInfo);
        }
//        die;
        $this->model->save($object);

        $controller = $this->request->getParam('controller');
        $mutiLanguage = Configure::read('LanguageList');
        Utils::useTables($this, ['LanguageContents']);
        foreach ($this->multiLanguageFields as $fieldName => $fieldInfo) {
            foreach ($mutiLanguage as $languageCode => $languageName) {
                $fieldData = $requestData[$fieldName . '_' . strtolower($languageName)];
                $mutiLangField = $this->LanguageContents->updateLanguageContent($object->id, $this->modelName, $languageCode, $fieldName, $fieldData);
            }
        }
    }

    protected function _createTemplateFieldUpdate() {

        $mutiLanguage = Configure::read('LanguageList');
        $inputField = [];
        $multiLangFields = [];
        $inputField = array_merge($inputField, $this->_prepareObject());
        $inputField = array_merge($inputField, $this->_prepareObject());
        if (!empty($this->multiLanguageFields)) {
            foreach ($mutiLanguage as $languageCode => $languageName) {
                $multiLangFields[$languageCode] = [];
                foreach ($this->multiLanguageFields as $fieldName => $fieldInfo) {
                    $fieldName = $fieldName . '_' . strtolower($languageName);
                    $multiLangFields[$languageCode] = array_merge($multiLangFields[$languageCode], [$fieldName => $fieldInfo]);
                }
            }
        }

        if (!empty($this->singlePhotos)) {
            $inputField = array_merge($inputField, $this->singlePhotos);
        }

//        if (!empty($this->multiPhotos)) {
//            $inputField = array_merge($inputField, $this->multiPhotos);
//        }

        $this->set('inputField', $inputField);
        $this->set('multiLangFields', $multiLangFields);
        $this->set('mutiLanguage', $mutiLanguage);
    }

    protected abstract function _prepareObject();

    protected function getObject($id = null, $contain = []) {
        $object = null;
        $object = $this->model->finfById(1);
    }

    protected function _handleUploadPhoto($param) {
        Utils::useComponents($this, ['App.Upload']);
        $destinationFolder = Configure::read('Upload.PhotoFolder');
        $this->Upload->setDestination($destinationFolder);
        if (!empty($this->singlePhotos)) {
            foreach ($this->singlePhotos as $field => $photoInfo) {
                if (empty($_FILES[$field . '_photo']['name']) && (empty($photoInfo['isRequired']) || !empty($object->{$field . '_id'}))) {
                    continue;
                }
                $ret = $this->Upload->handleUpload($field . '_photo');

                $photoError = [];
                if (!empty($ret['error'])) {
                    $photoError[] = $ret['error'];
                } else {
                    $photoPath = $destinationFolder . $ret['file'];
                    $photoSize = @getimagesize($photoPath);
                    $width = !empty($photoSize[0]) ? $photoSize[0] : 0;
                    $height = !empty($photoSize[1]) ? $photoSize[1] : 0;
                    if (!empty($photoInfo['width']) && $width < $photoInfo['width']) {
                        $photoError[] = __('Minimum width is ') . $photoInfo['width'] . ' px';
                    }
                    if (!empty($photoInfo['height']) && $height < $photoInfo['height']) {
                        $photoError[] = __('Minimum height is ') . $photoInfo['height'] . ' px';
                    }
                    if (!empty($photoInfo['width']) && !empty($photoInfo['height']) && !empty($photoInfo['fixRatio'])) {
                        if (($photoInfo['width'] / $photoInfo['height']) != ($width / $height)) {
                            $photoError[] = __('Photo size must be ') . $photoInfo['width'] . ' x ' . $photoInfo['height'];
                        }
                    }
                }
                if (!empty($photoError)) {
                    $errors[$field . '_photo'] = $photoError;
                } elseif (!empty($photoPath)) {
                    $photo = $this->Photos->newEntity([
                        'path' => str_replace(WWW_ROOT, '', $photoPath),
                    ]);
                    $this->Photos->save($photo);
                    $object->{$field . '_id'} = $photo->id;
                }
            }
        }
    }

}
