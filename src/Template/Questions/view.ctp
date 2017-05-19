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
                                    <dt><?= __('Question Text') ?>:</dt> 
                                        <dd>
                                            <span class="label label-success"><?= h($question->text) ?></span>
                                        </dd>
                                    </dl> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dl class="dl-horizontal">
                                        <dt><?= __('Question Id') ?>:</dt> <dd> <?= $this->Number->format($question->id) ?> </dd>
                                        <dt><?= __('Level Number') ?>:</dt> <dd> <?= $this->Number->format($question->level_no)?> </dd>
                                        <dt><?= __('Created') ?>:</dt> <dd> <?= h($question->created) ?> </dd>
                                        <dt><?= __('Modified') ?>:</dt> <dd><?= h($question->modified) ?></dd>
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
