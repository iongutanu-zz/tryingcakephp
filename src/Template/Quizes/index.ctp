<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Quize'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Questions'), ['controller' => 'Questions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Questions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="quizes index large-9 medium-8 columns content">
    <h3><?= __('Quizes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('subtitle') ?></th>
                <th><?= $this->Paginator->sort('logo') ?></th>
                <th><?= $this->Paginator->sort('sponsor_logo') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($quizes as $quize): ?>
            <tr>
                <td><?= $this->Number->format($quize->id) ?></td>
                <td><?= h($quize->title) ?></td>
                <td><?= h($quize->subtitle) ?></td>
                <td><?= h($quize->logo) ?></td>
                <td><?= h($quize->sponsor_logo) ?></td>
                <td><?= h($quize->created) ?></td>
                <td><?= h($quize->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Pass Quiz'), ['controller' => 'Questions', 'action' => 'passquiz', $quize->id, 1]) ?>
                    <?= $this->Html->link(__('View'), ['action' => 'view', $quize->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $quize->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $quize->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quize->id)]) ?>
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
