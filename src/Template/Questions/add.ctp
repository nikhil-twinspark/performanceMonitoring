    <div class="row">
<div class="col-lg-12">
    <div class="hpanel">
        <div class="panel-heading">
            <?= __('Add Question') ?>
        </div>
        <div class="panel-body">
            <?= $this->Form->create($question, ['data-toggle'=>"validator",'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"]) ?>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('name', __('Question Text'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('text', ['label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('response_group', __('Response Option'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('response_group_id', ['label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('related_competency', __('Related Competency'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->input('competency_id', ['onchange'=>"myFunction()", 'id'=>"competency_id" ,'label' => false,'class' => ['form-control']]); ?>
                    </div>  
            </div>           
            <div class="hr-line-dashed"></div>
                <div class="form-group">
                <?= $this->Form->label('label', __('Level Number'), ['class' => ['col-sm-2', 'control-label']]); ?>
                    <div class="col-sm-10">
                       <?= $this->Form->select('level_no',[], ['min'=>1, 'label' => false, 'id' => 'level_no' , 'class' => ['form-control']]); ?>
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
<script type="text/javascript">
    $("#level_no").empty();
    var maxLevels = <?= json_encode($competencyMaxLevel)?> ;
    function myFunction() {
        var competencyId = $("#competency_id").find(":selected").val();
        $("#level_no").empty();
        var levelNo = document.getElementById('level_no');
        for(var i = 1; i <= maxLevels[competencyId]; i++) {
            var opt = document.createElement('option');
            opt.innerHTML = i;
            opt.value = i;
            levelNo.appendChild(opt);
        }
    }   

</script>