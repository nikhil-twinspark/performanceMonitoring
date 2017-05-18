<div class = "row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                    <dt><?= __('Competency Name') ?>:</dt> 
                                        <dd>
                                            <span class="label label-success"><?= h($competency->text) ?></span>
                                        </dd>
                                    </dl> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Description') ?>:</dt> <dd> <?= h($competency->description) ?> </dd>
                                        <dt><?= __('Competency Id') ?>:</dt> <dd> <?= $this->Number->format($competency->id) ?> </dd>
                                        <dt><?= __('Maximum Level') ?>:</dt> <dd> <?= $this->Number->format($competency->maximum_level) ?> </dd>
                                        <dt><?= __('Created') ?>:</dt> <dd> <?= h($competency->created) ?> </dd>
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($competency->modified) ?></dd>
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
    </div>
</div>