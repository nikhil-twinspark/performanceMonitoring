<?= $this->Html->script('plugins/dataTables/datatables.min.js') ?>
<?= $this->Html->css('plugins/dataTables/datatables.min.css') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <div class="text-right">
                                <?=$this->Html->link('Add New Job Designation', ['controller' => 'job-designations', 'action' => 'add'],['class' => ['btn', 'btn-success']])?>
                    </div>
                    <br>
                    <h5>This is the list of all the Job Designations here at Twinspark. You can add, edit or delete a Job Designation as per requirement.</h5>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= __('Designation Name') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jobDesignations as $key => $jobDesignation): ?>
                                    <tr>
                                        <td><?= h($key + 1) ?></td>
                                        <td><?= h($jobDesignation->label) ?></td>
                                        <td><?= h($jobDesignation->created) ?></td>
                                        <td><?= h($jobDesignation->modified) ?></td>
                                        <td class="actions">
                                        <?= '<a href='.$this->Url->build(['action' => 'view', $jobDesignation->id]).' class="btn btn-xs btn-success">' ?>
                                            <i class="fa fa-eye fa-fw"></i>
                                        </a>
                                        <?= '<a href='.$this->Url->build(['action' => 'edit', $jobDesignation->id]).' class="btn btn-xs btn-warning"">' ?>
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>
                                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $jobDesignation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobDesignation->id), 'class' => ['btn', 'btn-sm', 'btn-danger', 'fa', 'fa-trash-o', 'fa-fh']]) ?>
                                        <?= '<a href='.$this->Url->build(['controller'=> 'JobDesignations','action' => 'jobRequirementLevels', $jobDesignation->id]).' class="btn btn-xs btn-primary">' ?>
                                        <i class="fa fa-gears fa-fw"></i>
                                        </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
            $('.dataTables').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
        });
</script>