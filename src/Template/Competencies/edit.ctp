<div class="row">
<div class="col-lg-12">
    <div class="hpanel">
        <div class="panel-heading">
            <?= __('Edit Competency') ?>
        </div>
        <div class="panel-body">
            <?= $this->Form->create($competency, ['data-toggle'=>"validator",'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"]) ?>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('name', __('Competency Name'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('text', ['label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('label', __('Maximum levels in this competency'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('maximum_level', ['min'=>1,'label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('description', __('Description'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('description', ['label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <?= $this->Form->label('Tags', 'Associated Job Designation', ['class' => ['col-sm-2', 'control-label'],]); ?>
                    <div class="col-sm-10">
                    <?php foreach ($jobDesignations as $jobDesignation) {
                        $checked = in_array($jobDesignation->id, $competency->job_designation_competencies) ? "checked" : "";

                    ?>
                        <div class="checkbox i-checks">

                            <label title="<?= $jobDesignation['label'] ?>" >
                                <input type="checkbox" name= "job_designation_id[<?= $jobDesignation['id'] ?>]"  <?= $checked ?> value= '<?= $jobDesignation['id'] ?>'>
                                <?= $jobDesignation['label'] ?>
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
</div>
