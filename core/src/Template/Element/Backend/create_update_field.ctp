<?php

use Cake\Utility\Inflector ?>
<?php if (!empty($inputField)): ?>
    <?php foreach ($inputField as $nameField => $fieldInfo) : ?>
        <?php if ($fieldInfo['type'] == 'text'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10">
                    <input type="text" name="<?= $nameField ?>"  value="<?= !empty($fieldInfo['value']) ? $fieldInfo['value'] : '' ?>" class="form-control" placeholder="<?= Inflector::humanize($fieldInfo['label']) ?> ">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif ?>

        <?php if ($fieldInfo['type'] == 'textarea'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10">
                    <textarea name="<?= $nameField ?>" class="form-control" value="<?= !empty($fieldInfo['value']) ? $fieldInfo['value'] : '' ?>" placeholder="<?= Inflector::humanize($fieldInfo['label']) ?>"  rows="5" ></textarea>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif ?>

        <?php if ($fieldInfo['type'] == 'upload'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10">
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon bg-primary btn btn-primary btn-file">
                            <span class="fileinput-new "><?= __('Select file') ?></span>
                            <span class="fileinput-exists"><?= __('Change') ?></span>
                            <input type="file" name="<?= $nameField ?>"/>
                        </span>
                        <a href="#" class="input-group-addon btn bg-danger fileinput-exists" data-dismiss="fileinput"><?= __('Remove') ?></a>
                    </div> 
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

        <?php if ($fieldInfo['type'] == 'dropdown'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10 ">
                    <select  class="form-control  m-b" name="<?= $nameField ?>">
                        <option value="" > <?= 'Select ' . Inflector::humanize($fieldInfo['label']) ?></option>
                        <?php foreach ($fieldInfo['options'] as $value => $optionItem) : ?>
                            <option value="<?= $value ?>" ><?= $optionItem ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

        <?php if ($fieldInfo['type'] == 'toggle'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10 ">
                    <input name="<?= $nameField ?>" id="<?= $nameField ?>" type="checkbox" class="js-switch" checked />
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

        <?php if ($fieldInfo['type'] == 'muti_select'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?></label>
                <div class="col-sm-10 ">
                    <select data-placeholder="Choose <?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?>." class="chosen-select" multiple style="width:350px;" tabindex="4">
                        <?php foreach ($fieldInfo['options'] as $value => $optionItem) : ?>
                            <option value="<?= $value ?> " ><?= $optionItem ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

        <?php if ($fieldInfo['type'] == 'colorpicker'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?> </label>
                <div class="input-group my-colorpicker2">
                    <div class="input-group-addon">
                        <i></i>
                    </div>
                    <input type="text" class="form-control" value="" id="" name="<?= $nameField ?>" placeholder="<?= __('Please chose color') ?>" />
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

        <?php if ($fieldInfo['type'] == 'tag'): ?>
            <div class="form-group">
                <label class="col-sm-2 control-label"><?= !empty($fieldInfo['label']) ? Inflector::humanize($fieldInfo['label']) : '' ?> </label>
                <div class="col-sm-10">
                    <input class="tagsinput form-control" name="<?= $nameField ?>"  type="text" value=""/>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
        <?php endif; ?>

    <?php endforeach; ?>
<?php endif; ?>

