<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Question'), ['action' => 'edit', $question->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Question'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Quizes'), ['controller' => 'Quizes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quize'), ['controller' => 'Quizes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="questions view large-9 medium-8 columns content">
    <h3><?= h($question->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Quize') ?></th>
            <td><?= $question->has('quize') ? $this->Html->link($question->quize->title, ['controller' => 'Quizes', 'action' => 'view', $question->quize->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($question->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Subtitle') ?></th>
            <td><?= h($question->subtitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Logo') ?></th>
            <td><?= h($question->logo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($question->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Correct Answers') ?></th>
            <td><?= $this->Number->format($question->total_correct_answers) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Answers') ?></th>
            <td><?= $this->Number->format($question->total_answers) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($question->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($question->modified) ?></tr>
        </tr>
        <tr>
            <th><?= __('Correct Answer') ?></th>
            <td><?php if($question->correct_answer) echo 'B'; else echo 'A'; ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Question Text') ?></h4>
        <?= $this->Text->autoParagraph(h($question->question_text)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer A') ?></h4>
        <?= $this->Text->autoParagraph(h($question->answer_a)); ?>
    </div>
    <div class="row">
        <h4><?= __('Answer B') ?></h4>
        <?= $this->Text->autoParagraph(h($question->answer_b)); ?>
    </div>
</div>
