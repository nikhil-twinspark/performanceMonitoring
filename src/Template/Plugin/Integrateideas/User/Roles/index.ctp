<div class="row">
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-2 pull-right">
                        <?=$this->Html->link('Add Roles', ['plugin' => 'Integrateideas/User', 'controller' => 'Roles', 'action' => 'add'],['class' => ['btn', 'btn-primary']])?>
                    </div>
                </div><br/>
                <div class="table-responsive">
                <table id="dTable" cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>

                        <th>S.no.</th>
                        <th>Name</th>
                        <th>Label</th>
                        <th>Login Redirect Url</th> 
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach ($roles as $key=>$role): ?>
                        <tr>
                            <td><?= $this->Number->format($key+1) ?></td>
                            <td><?= h($role->name) ?></td>
                            <td><?= h($role->label) ?></td>
                            <td><?= h($role->login_redirect_url ? $role->login_redirect_url : 'Default')?></td>
                            <td class="actions">
                                <?= '<a href='.$this->Url->build(['action' => 'view', $role->id]).' class="btn btn-xs btn-success">' ?>
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <?= '<a href='.$this->Url->build(['action' => 'edit', $role->id]).' class="btn btn-xs btn-warning"">' ?>
                                <i class="fa fa-pencil fa-fw"></i>
                            </a>
                            <?= $this->Form->postLink(__(''), ['action' => 'delete', $role->id], ['confirm' => __('Are you sure you want to delete # {0}?', $role->id), 'class' => ['btn', 'btn-sm', 'btn-danger', 'fa', 'fa-trash-o', 'fa-fh']]) ?>
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
<?= $this->Html->script('data_table') ?>