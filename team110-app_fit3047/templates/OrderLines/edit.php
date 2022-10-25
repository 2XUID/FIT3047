<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine $orderLine
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
echo $this->Html->css("/vendor/datatables/dataTables.bootstrap4.min.css");
echo $this->Html->script("/vendor/datatables/jquery.dataTables.min.js");
echo $this->Html->script("/vendor/datatables/dataTables.bootstrap4.min.js");
$formTemplate = [
    'inputContainer' => '<div class="input {{type}}{{required}}">{{content}}</div>',
    'label' => '<label{{attrs}} class="form-label">{{text}}</label>',
    'input' => '<input type="{{type}}" name="{{name}}" class="form-control" {{attrs}}/>',
    'textarea' => '<textarea name="{{name}}" class="form-control" {{attrs}}>{{value}}</textarea>',
    'nestingLabel' => '{{hidden}}<label class="form-check-label" {{attrs}}>{{input}}{{text}}</label>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}} class="form-check-input""{{attrs}}>'
];
$this->Form->setTemplates($formTemplate);
?>
<div class="orders index content">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="<?= $this->Url->build(['action' => 'index'])?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-1"><i
                class="fas fa-sm text-white-50"></i> Back</a>
    </div>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <legend><?= __('Edit Purchased ID ') ?><?= h($orderLine->order_lines_id) ?></legend>
            <table>
                <th class="heading"><?= __('Actions') ?></th>
                <td><?= $this->Form->postLink(
                        __('Delete'), ['action' => 'delete', $orderLine->order_lines_id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->order_lines_id), 'class' => 'side-nav-item']
                    ) ?></td>
                <td><?= $this->Html->link(__('List Order Line'), ['action' => 'index'], ['class' => 'side-nav-item']) ?></td>
            </table>
            <?= $this->Form->create($orderLine) ?>
            <fieldset>
                <tr>
                    <td><?php
                        echo $this->Form->control('product_id', ['options' => $products]);
                        echo $this->Form->control('quantity');
                        ?></td>
                </tr>
            </fieldset>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
</div>
</div>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
</style>
