<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
              <legend><?= __('Add Job Designation') ?></legend>
            </div>
            <div class="ibox-content">
            <?= $this->Form->create($jobDesignation, ['data-toggle'=>"validator",'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"]) ?>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('label', __('Designation Name'), ['class' => ['col-sm-2', 'control-label']]); ?>

                    <div class="col-sm-10">
                       <?= $this->Form->input('label', ['label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?= $this->Form->label('Tags', 'Associated Competencies', ['class' => ['col-sm-2', 'control-label'],]); ?>
                    <div class="col-sm-10">
                    <?php foreach($competencies as $competency) { ?>
                        <div class="checkbox i-checks">
                            <label title="<?= $competency['text'] ?>" >
                                <input type="checkbox" name= "compitancy[<?= $competency['id'] ?>]"  value = '<?= $competency['id'] ?>'>
                                <?= $competency['text'] ?>
                            </label>
                        </div>
                       <?php } ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <?= $this->Form->button(__('Submit'), ['class' => ['btn', 'btn-primary']]) ?>
                        <?= $this->Html->link('Cancel',$this->request->referer(),['class' => ['btn', 'btn-danger']]);?>
                    </div>
                </div> 
            <?= $this->Form->end() ?>
        </div>        
    </div>
</div>