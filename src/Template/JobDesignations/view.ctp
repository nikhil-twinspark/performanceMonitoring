<div class = "row">
<div class="col-lg-9">
    <div class="wrapper wrapper-content animated fadeInUp">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="m-b-md">
                                <h2><?= h($jobDesignation->label) ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <dl class="dl-horizontal">
                                <dt><?= __('Designation Name') ?>:</dt> <dd> <?= h($jobDesignation->name) ?> </dd>
                                <dt><?= __('Designation Label') ?>:</dt> <dd> <?= h($jobDesignation->label) ?> </dd>
                                <dt><?= __('Related Competencies') ?>:</dt> <dd> <?= h(implode(",",$relCompetency)) ?> </dd>
                                <dt><?= __('Designation Id') ?>:</dt> <dd> <?= $this->Number->format($jobDesignation->id) ?> </dd>
                                <dt><?= __('Created') ?>:</dt> <dd> <?= h($jobDesignation->created) ?> </dd>
                                <dt><?= __('Modified') ?>:</dt> <dd><?= h($jobDesignation->modified) ?></dd>
                            </dl>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <?= $this->Html->link('Back',$this->request->referer(),['class' => ['btn', 'btn-warning']]);?>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>



