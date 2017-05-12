<!-- <div class="row"> -->
<div class="row">
    <div class="col-lg-6">
    <div class="lead">
    <p>Hello <strong> <?= $loggedInUser['first_name'] ?></strong>,</p> 
    <p><small>Welcome to CAPview.</small></p>
    </div>
    </div>
</div>
    <div class="col-lg-12">
        <div class="hpanel">
            <div class="panel-body">
            <div class="text-right">
                                <?=$this->Html->link('Add New User', ['controller' => 'integrateideas/user/users', 'action' => 'add'],['class' => ['btn', 'btn-success']])?>
                    </div>
                    <br>
                    <h5>This is the list of all the users of this software here at Twinspark. You can add, edit or delete a user as per requirement.</h5>
                    <br>
                 <div class="table-responsive">
                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('username') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($users as $key => $user): ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= h($user->role->name)?></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->username) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->phone) ?></td>
                            <td><?= h($user->status)?'Active':'Inactive' ?></td>
                            <td class="actions">
                            <?= '<a href='.$this->Url->build(['controller'=>'integrateideas/user/users','action' => 'view', $user->id]).' class="btn btn-xs btn-success">' ?>
                                <i class="fa fa-eye fa-fw"></i>
                            </a>
                            <?= '<a href='.$this->Url->build(['controller'=>'integrateideas/user/users','action' => 'edit', $user->id]).' class="btn btn-xs btn-warning"">' ?>
                                <i class="fa fa-pencil fa-fw"></i>
                            </a>
                            <?= $this->Form->postLink(__(''), ['controller'=>'integrateideas/user/users','action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => ['btn', 'btn-sm', 'btn-danger', 'fa', 'fa-trash-o', 'fa-fh']]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->