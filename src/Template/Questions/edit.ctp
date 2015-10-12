<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $question->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Quizes'), ['controller' => 'Quizes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quize'), ['controller' => 'Quizes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questions form large-9 medium-8 columns content">
    <?= $this->Form->create($question) ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->input('quize_id', ['options' => $quizes]);
            echo $this->Form->input('title');
            echo $this->Form->input('subtitle');
            echo $this->Form->input('logo');
            echo $this->Form->input('question_text');
            echo $this->Form->input('answer_a');
            echo $this->Form->input('answer_b');
            echo $this->Form->input('correct_answer');
            echo $this->Form->input('total_correct_answers');
            echo $this->Form->input('total_answers');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
