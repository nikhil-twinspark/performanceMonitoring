<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Competency'), ['action' => 'edit', $competency->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Competency'), ['action' => 'delete', $competency->id], ['confirm' => __('Are you sure you want to delete # {0}?', $competency->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Competencies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Competency'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Job Designation Competencies'), ['controller' => 'JobDesignationCompetencies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job Designation Competency'), ['controller' => 'JobDesignationCompetencies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="competencies view large-9 medium-8 columns content">
    <h3><?= h($competency->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Text') ?></th>
            <td><?= h($competency->text) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($competency->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($competency->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Maximum Level') ?></th>
            <td><?= $this->Number->format($competency->maximum_level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($competency->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($competency->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Job Designation Competencies') ?></h4>
        <?php if (!empty($competency->job_designation_competencies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Job Designation Id') ?></th>
                <th scope="col"><?= __('Competency Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($competency->job_designation_competencies as $jobDesignationCompetencies): ?>
            <tr>
                <td><?= h($jobDesignationCompetencies->id) ?></td>
                <td><?= h($jobDesignationCompetencies->job_designation_id) ?></td>
                <td><?= h($jobDesignationCompetencies->competency_id) ?></td>
                <td><?= h($jobDesignationCompetencies->created) ?></td>
                <td><?= h($jobDesignationCompetencies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JobDesignationCompetencies', 'action' => 'view', $jobDesignationCompetencies->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JobDesignationCompetencies', 'action' => 'edit', $jobDesignationCompetencies->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JobDesignationCompetencies', 'action' => 'delete', $jobDesignationCompetencies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobDesignationCompetencies->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
