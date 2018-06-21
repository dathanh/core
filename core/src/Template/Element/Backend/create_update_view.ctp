
<div class="tabs-container">
    <?= $this->Form->create($object = '', ['class' => 'form-horizontal', 'accept-charset' => 'utf-8', 'enctype' => 'multipart/form-data']) ?>
    <ul class="nav nav-tabs">
        <li class="active "><a data-toggle="tab" href="#defualt" > <?= __('Default') ?></a></li>
        <?php if (!empty($mutiLanguage)): ?>
            <?php foreach ($mutiLanguage as $language) : ?>
                <li class="">
                    <a data-toggle="tab" href="#<?= $language ?>"><?= __($language) ?></a>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
    <div class="tab-content">
        <div id="defualt" class="tab-pane active">
            <div class="panel-body">
                <?= $this->element('/Backend/create_update_field', ['inputField' => $inputField]) ?>   
            </div>
        </div>
        <?php if (!empty($mutiLanguage)): ?>
            <?php foreach ($mutiLanguage as $languageCode => $languageName) : ?>
                <div id="<?= $languageName ?>" class="tab-pane">
                    <div class="panel-body">
                        <?= $this->element('/Backend/create_update_field', ['inputField' => $multiLangFields[$languageCode]]) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <br>
    <div class="form-group">
        <div class="row col-sm-2 col-sm-offset-2">
            <?= $this->Html->link('<i class="fa fa-arrow-circle-o-left"></i> ' . __('Back'), !empty($lastUrl) ? $lastUrl : ['action' => 'index'], ['class' => 'btn btn-warning', 'escape' => false]) ?>
            <button class="btn btn-default" type="reset" ><?= __('Reset') ?></button> 
            <button class="btn btn-primary btn-save" type="submit" >
                <i class="fa fa-save"></i> 
                <?= __('Save') ?>
            </button> 
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>