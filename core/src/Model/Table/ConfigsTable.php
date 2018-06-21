<?php

namespace App\Model\Table;

use App\Model\Entity\Config;
use Cake\ORM\Entity;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ConfigsTable extends Table {

    public function validationDefault(Validator $validator) {
        $validator->integer('id')->allowEmpty('id', 'create');

        return $validator;
    }

}
