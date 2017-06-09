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
            <li>
                <?= $this->Html->link(__('Dashboard'), ['controller'=>'users/adminDashboard','plugin'=>false,'action' => 'index']) ?>
            </li>
            <li>
                <a href="#"><span class="nav-label">Users</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'users/adminDashboard','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add User'), ['action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Roles</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Roles'), ['controller' => 'user/roles','plugin'=>false, 'action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Job Designation</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'jobDesignations','plugin'=>false,'action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add Job Designation'), ['controller'=>'jobDesignations','plugin'=>false,'action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Competency</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'competencies','plugin'=>false,'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Competency'), ['controller'=>'competencies','plugin'=>false,'action' => 'add']) ?></li>
                </ul>
                <a href="#"><span class="nav-label">Questions</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                <li><?= $this->Html->link(__('View All'), ['controller'=>'questions','plugin'=>false,'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('Add Question'), ['controller'=>'questions','plugin'=>false,'action' => 'add']) ?></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<?php $this->end();?>