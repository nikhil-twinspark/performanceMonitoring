<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-heading"><?= __('Add Role') ?>
            </div>
            <div class="panel-body">
                <?= $this->Form->create($role, ['data-toggle'=>'validator','class' => 'form-horizontal', 'enctype'=>"multipart/form-data"]) ?>
                <div class="hr-line-dashed"></div>
                  <div class="form-group">
                    <?= $this->Form->label('name', __('Name'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->input('name', ['label' => false, 'required' => true, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">

                  <?= $this->Form->label('label', __('Label'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->input('label', ['label' => false, 'required' => true, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="form-group">

                <?= $this->Form->label('login_redirect_url', __('Login Redirect Url'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                        <?= $this->Form->input('login_redirect_url', ['label' => false, 'required' => false, 'class' => 'form-control']); ?>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?= $this->Form->button(__('Submit'), ['id'=>'check_submit','class' => ['btn', 'btn-primary']]) ?>
                        <?= $this->Html->link('Cancel',$this->request->referer(),['id'=>'check_cancel','class' => ['btn', 'btn-danger']]);?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>