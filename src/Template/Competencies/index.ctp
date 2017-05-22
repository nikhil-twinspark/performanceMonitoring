<?= $this->Html->script('plugins/dataTables/datatables.min.js') ?>
<?= $this->Html->css('plugins/dataTables/datatables.min.css') ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                <div class="text-right">
                                <?=$this->Html->link('Add New Competency', ['controller' => 'competencies', 'action' => 'add'],['class' => ['btn', 'btn-success']])?>
                    </div>
                    <br>
                    <h5>This is the list of all the Competencies required to perform efficiently here at Twinspark. You can add, edit or delete a Competency as per requirement.</h5>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                                    <th scope="col"><?= __('Job Designation') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('maximum_level') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                use Cake\Collection\Collection;

                                foreach ($competencies as $competency) {
                                        foreach ($competency as $competency) {
                                        $jobDesig = new Collection($competency['job_designation_competencies']);
                                        $Desig = $jobDesig->extract('job_designation.label');
                                        $Desig = $Desig->toArray();
                                ?>
                                    <tr>
                                        <td><?= $this->Number->format($competency->id) ?></td>
                                        <td><?= h($competency->text) ?></td>
                                        <td><?= h(implode(', ', $Desig)) ?></td>
                                        <td><?= $this->Number->format($competency->maximum_level) ?></td>
                                        <td class="actions">
                                        <?= '<a href='.$this->Url->build(['action' => 'view', $competency->id]).' class="btn btn-xs btn-success">' ?>
                                            <i class="fa fa-eye fa-fw"></i>
                                        </a>
                                        <?= '<a href='.$this->Url->build(['action' => 'edit', $competency->id]).' class="btn btn-xs btn-warning"">' ?>
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>
                                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $competency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competency->id), 'class' => ['btn', 'btn-sm', 'btn-danger', 'fa', 'fa-trash-o', 'fa-fh']]) ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php } ?>
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
