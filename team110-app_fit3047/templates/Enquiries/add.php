<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */

?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Enquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiries form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('Add Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('enquiry_full_name',['label'=>'Your Full Name']);
                    echo $this->Form->control('enquiry_email',['label'=>'Email Address']);
                    echo $this->Form->control('enquiry_body',['label'=>'Body']);
                    echo $this->Form->control('enquiry_created_time',['label'=>'Time']);
                    echo $this->Form->control('enquiry_email_sent',['label'=>'Status']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
