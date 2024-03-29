<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Question'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Quizes'), ['controller' => 'Quizes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Quize'), ['controller' => 'Quizes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="questions index large-9 medium-8 columns content">
    <h3><?= __('Questions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('quize_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('subtitle') ?></th>
                <th><?= $this->Paginator->sort('logo') ?></th>
                <th><?= $this->Paginator->sort('correct_answer') ?></th>
                <th><?= $this->Paginator->sort('total_correct_answers') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
            <tr>
                <td><?= $this->Number->format($question->id) ?></td>
                <td><?= $question->has('quize') ? $this->Html->link($question->quize->title, ['controller' => 'Quizes', 'action' => 'view', $question->quize->id]) : '' ?></td>
                <td><?= h($question->title) ?></td>
                <td><?= h($question->subtitle) ?></td>
                <td><?= h($question->logo) ?></td>
                <td><?php if($question->correct_answer) echo 'B'; else echo 'A'; ?></td>
                <td><?= $this->Number->format($question->total_correct_answers) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $question->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $question->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
