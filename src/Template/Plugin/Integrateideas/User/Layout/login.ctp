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

$cakeDescription = 'CAPview asdas';
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

    <!-- <?= $this->Html->css('base.css') ?> -->
    <!-- <?= $this->Html->css('cake.css') ?> -->
    <?= $this->Html->css(['/css/bootstrap.min.css']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?=  $this->Form->hidden('baseUrl',['id'=>'baseUrl','value'=>$this->Url->build('/', true)]); ?>
    <nav class="top-bar expanded" data-topbar role="navigation">
            <?php 
                  $controller = \Cake\Utility\Inflector::humanize($this->request->params['controller']);
                  $underscoreAction = \Cake\Utility\Inflector::underscore($this->request->params['action']);
                  $action = \Cake\Utility\Inflector::humanize($underscoreAction);
             ?>
                <h3 class="text-center"><?= $controller.' - '.$action ?></h3>

                <hr>
        <!-- <div class="top-bar-section">
            <ul class="right">
            </ul>
        </div> -->
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
<?= $this->Html->script([
                        '/js/jquery-2.1.1.js', 
                        '/js/bootstrap.min.js',
                        '/integrateideas/user/js/user-management' 
                    ]) 
?>
</html>
