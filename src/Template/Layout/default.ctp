<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CAPview qq';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?php echo $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon'));?>
    
    <?= $this->Html->script('/js/jquery-2.1.1.js') ?>
    <?= $this->Html->css('/css/style.css') ?>
    <?= $this->Html->css('/css/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css') ?>
    <?= $this->Html->css('/css/bootstrap.min.css') ?>
    <?= $this->Html->css('/css/plugins/fontawesome/css/font-awesome.css') ?>
    <?= $this->Html->css('/css/plugins/animate.css/animate.css') ?>
    <?= $this->Html->script('/js/plugins/slimScroll/jquery.slimscroll.min.js') ?>
    <?= $this->Html->script('/js/plugins/bootstrap/dist/js/bootstrap.min.js') ?>
    <!-- <?= $this->Html->script('/js/inspinia.js') ?> -->
    <?= $this->Html->css('plugins/sweetalert/sweetalert') ?>
    <?= $this->Html->script('plugins/sweetalert/sweetalert.min') ?>
    <?= $this->Html->script('/js/pace.min.js') ?>
    <?= $this->Html->script('/js/super_admin') ?>
    <?= $this->Html->script('/js/plugins/jquery/dist/jquery.min.js') ?>
    <?= $this->Html->script('/js/plugins/jquery-ui/jquery-ui.min.js') ?>
    <?= $this->Html->script('/js/plugins/jquery-flot/jquery.flot.js') ?>
    <?= $this->Html->script('/js/plugins/jquery-flot/jquery.flot.resize.js') ?>
    <?= $this->Html->script('/js/plugins/jquery-flot/jquery.flot.pie.js') ?>
    <?= $this->Html->script('/js/plugins/flot.curvedlines/curvedLines.js') ?>
    <?= $this->Html->script('/js/plugins/jquery.flot.spline/index.js') ?>
    <?= $this->Html->script('/js/plugins/iCheck/icheck.min.js') ?>
    <?= $this->Html->script('/js/plugins/peity/jquery.peity.min.js') ?>
    <?= $this->Html->script('/js/plugins/sparkline/index.js') ?>
    <!-- <?= $this->Html->script('homer.js') ?> -->

    <?= $this->fetch('css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="fixed-navbar fixed-sidebar">

    <div class="boxed-wrapper">
        <?= $this->element('Navigation/topnav'); ?>

        <?= $this->element('Navigation/sidenav'); ?>
        <?= $this->fetch('nav') ?>
        <?=  $this->Form->hidden('baseUrl',['id'=>'baseUrl','value'=>$this->Url->build('/', true)]); ?>

        <div id="wrapper">
            <!--  Breadcum sidebar -->
            <?= $this->element('titleband')?>
            <div class="content animate-panel">
                <?= $this->Flash->render('auth', ['element' => 'Flash/error']) ?>
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
    <?php //echo $this->element('footer'); ?>

</div>
</div>

</body>
</html>
