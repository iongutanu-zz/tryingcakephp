<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Pass Quiz'), ['controller' => 'Questions', 'action' => 'passquiz', $quize->id, 1]) ?> </li>
        <li><?= $this->Html->link(__('Edit Quize'), ['action' => 'edit', $quize->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Quize'), ['action' => 'delete', $quize->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quize->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Quizes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Quize'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="quizes view large-9 medium-8 columns content">
    <h3><?= h($quize->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($quize->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Subtitle') ?></th>
            <td><?= h($quize->subtitle) ?></td>
        </tr>
        <tr>
            <th><?= __('Logo') ?></th>
            <td><?= h($quize->logo) ?></td>
        </tr>
        <tr>
            <th><?= __('Sponsor Logo') ?></th>
            <td><?= h($quize->sponsor_logo) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($quize->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($quize->created) ?></tr>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($quize->modified) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Short Description') ?></h4>
        <?= $this->Text->autoParagraph(h($quize->short_description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Questions') ?></h4>
        <?php if (!empty($quize->questions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Quize Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Subtitle') ?></th>
                <th><?= __('Logo') ?></th>
                <th><?= __('Question Text') ?></th>
                <th><?= __('Answer A') ?></th>
                <th><?= __('Answer B') ?></th>
                <th><?= __('Correct Answer') ?></th>
                <th><?= __('Total Correct Answers') ?></th>
                <th><?= __('Total Answers') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($quize->questions as $questions): ?>
            <tr>
                <td><?= h($questions->id) ?></td>
                <td><?= h($questions->quize_id) ?></td>
                <td><?= h($questions->title) ?></td>
                <td><?= h($questions->subtitle) ?></td>
                <td><?= h($questions->logo) ?></td>
                <td><?= h($questions->question_text) ?></td>
                <td><?= h($questions->answer_a) ?></td>
                <td><?= h($questions->answer_b) ?></td>
                <td><?= h($questions->correct_answer) ?></td>
                <td><?= h($questions->total_correct_answers) ?></td>
                <td><?= h($questions->total_answers) ?></td>
                <td><?= h($questions->created) ?></td>
                <td><?= h($questions->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Questions', 'action' => 'view', $questions->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Questions', 'action' => 'edit', $questions->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
