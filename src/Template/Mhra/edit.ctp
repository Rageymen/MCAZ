<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mhra $mhra
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $mhra->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $mhra->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Mhra'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="mhra form large-9 medium-8 columns content">
    <?= $this->Form->create($mhra) ?>
    <fieldset>
        <legend><?= __('Edit Mhra') ?></legend>
        <?php
            echo $this->Form->control('system_name');
            echo $this->Form->control('display_name');
            echo $this->Form->control('created_at');
            echo $this->Form->control('update_at');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
