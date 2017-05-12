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
            <?php if($sideNavData['role_name']== "admin") { ?>
            <li>
                <?= $this->Html->link(__('Dashboard'), ['controller'=>'users/adminDashboard','action' => 'index']) ?>
            </li>

            <li>
                <a href="#"><span class="nav-label">Users</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li><?= $this->Html->link(__('View All'), ['controller'=>'users/adminDashboard','action' => 'index']) ?></li>
                    <li><?= $this->Html->link(__('Add User'), ['controller'=>'integrateideas/user/users','action' => 'add']) ?></li>
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
            </li>

            <li>
            <?php } elseif($sideNavData['role_name']== "manager") {?>
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
                    <?php } else {?>
            <!-- <li>
                <?= $this->Html->link(__('Dashboard'), ['controller'=>'users/employeeDashboard','action' => 'index']) ?>
            </li> -->
            <!-- <li class="<?php //echo $mnu_setting;?>">
                <a href="#"><span class="nav-label">Interface</span><span class="fa arrow"></span> </a>
                <ul class="nav nav-second-level">
                    <li class="">
                        <a href="#">Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li><?= $this->Html->link(__('View All'), ['controller'=>'users/employeeDashboard','action' => 'index']) ?></li>
                            </ul>
                    </li> -->
                <?php } ?>    
                </ul>
            </li>
        </ul>
    </div>
</aside>
<?php $this->end();?>