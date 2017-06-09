<?php $this->start('nav');?>
<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="javascript:void(0)">
            <?= $this->Html->image('2017-04-03_1312.png',['width' =>'80px','height' => '80px', 'class' => 'img-circle m-b','alt' => 'logo'])?>
            </a>
        </div>
       
        <ul class="nav" id="side-menu">
            <?php $role = $this->request->session()->read('loginSuccessEvent.role');
            if($role['id'] == 1) { ?>
            <li>
                <?= $this->Html->link(__('Dashboard'), ['controller'=>'users/adminDashboard','action' => 'index']) ?>
            </li>

            <li>
                <a href="#"><span class="nav-label">Users</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'users/adminDashboard','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add User'), ['controller'=>'integrateideas/user/users','action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Roles</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'integrateideas/user/roles','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Roles'), ['controller' => 'roles','plugin'=>false, 'action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Job Designation</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'jobDesignations','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Job Designation'), ['controller'=>'jobDesignations','action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Competency</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'competencies','action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Competency'), ['controller'=>'competencies','action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Questions</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'questions','action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Question'), ['controller'=>'questions','action' => 'add']) ?></li>
                </ul>
            </li>
            <?php } elseif($role['id'] ==  2) {?>
            <li>
                <?= $this->Html->link(__('Dashboard'), ['controller'=>'users/managementDashboard','action' => 'index']) ?>
            </li>
            <li>
                <a href="#"><span class="nav-label">Job Designation</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'jobDesignations','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Job Designation'), ['controller'=>'jobDesignations','action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Competency</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'competencies','action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Competency'), ['controller'=>'competencies','action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Questions</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'questions','action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Question'), ['controller'=>'questions','action' => 'add']) ?></li>
                </ul>
            </li>
            <?php } else {?>
               
            <?php } ?>    
        </ul>
    </div>
</aside>
<?php $this->end();?>