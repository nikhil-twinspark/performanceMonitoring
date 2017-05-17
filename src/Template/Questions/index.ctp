<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                <div class="text-right">
                                <?=$this->Html->link('Add New Question', ['controller' => 'questions', 'action' => 'add'],['class' => ['btn', 'btn-success']])?>
                    </div>
                    <br>
                    <h5>This is the list of all the Questions associated with individual Competencies which will show up on the Employee's Dashboard. You can add, edit or delete a Question as per requirement.</h5>
                    <br>
                    <div class="table-responsive">
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('text') ?></th>
                                    <th scope="col"><?= $this->Paginator->sort('level_no') ?></th>
                                    <th scope="col"><?= __('Related Competency') ?></th>
                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($questions as $question){
                                    foreach ($question as $question) {
                                     ?>
                                    <tr>
                                        <td><?= $this->Number->format($question->id) ?></td>
                                        <td><?= h($question->text) ?></td>
                                        <td><?= $this->Number->format($question->level_no) ?></td>
                                        <td><?= h($question->competency_questions[0]->competency['text']) ?></td>
                                        <td class="actions">
                                        <?= '<a href='.$this->Url->build(['action' => 'view', $question->id]).' class="btn btn-xs btn-success">' ?>
                                            <i class="fa fa-eye fa-fw"></i>
                                        </a>
                                        <?= '<a href='.$this->Url->build(['action' => 'edit', $question->id]).' class="btn btn-xs btn-warning"">' ?>
                                            <i class="fa fa-pencil fa-fw"></i>
                                        </a>
                                        <?= $this->Form->postLink(__(''), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'class' => ['btn', 'btn-sm', 'btn-danger', 'fa', 'fa-trash-o', 'fa-fh']]) ?>
                                        </td>
                                    </tr>
                                <?php }  ?>
                                <?php }  ?>
                            </tbody>
                        </table>
                        <!-- <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

