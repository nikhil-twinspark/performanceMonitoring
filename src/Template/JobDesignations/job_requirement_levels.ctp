<?= $this->Html->script('plugins/dataTables/datatables.min.js') ?>
<?= $this->Html->css('plugins/dataTables/datatables.min.css') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                <?= $this->Form->create($jobDesignations, ['data-toggle'=>"validator",'class' => 'form-horizontal', 'enctype'=>"multipart/form-data"]) ?>
                    <div >
                        <h2><?= __('Job Requirement Levels') ?></h2>
                    </div>
                    <br><br>
                    <div class="lead">
                        <p><strong>Job Designation :</strong> <?= $jobDesignations['label'] ?> </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Associated Competency') ?></th>
                                    <th scope="col"><?= __('Maximum Levels in this Competency') ?></th>
                                    <th scope="col"><?= __('Set Job Requirement') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jobDesignations['job_designation_competencies'] as $key => $jobDesignation): ?>
                                    <tr>
                                        <td><?= h($key + 1) ?></td>
                                        <td ><?= h($jobDesignation['competency']['text']) ?></td>
                                        <td class="text-center"><?= h($jobDesignation['competency']['maximum_level']) ?></td>
                                        <td>
                                            <?php 
                                            for($i=0; $i< $jobDesignation['competency']['maximum_level'];$i++) {
                                                $options[$i+1] = (1+$i);
                                            }
                                
                                            echo $this->Form->select('required_level['.$jobDesignation['id'].']', $options, ['min'=>1, 'label' => false, 'id' => 'level_no' , 'class' => ['form-control']]); 
                                            unset($options); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                    <?= $this->Form->submit(__('Submit'), ['class' => ['btn', 'btn-primary']]) ?>
                    <?= $this->Html->link('Cancel',$this->request->referer(),['class' => ['btn', 'btn-danger']]);?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>