<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Quizes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quizes form large-9 medium-8 columns content">
    <?= $this->Form->create($quize) ?>
    <fieldset>
        <legend><?= __('Add Quize') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('subtitle');
            echo $this->Form->input('logo');
            echo $this->Form->input('sponsor_logo');
            echo $this->Form->input('short_description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
