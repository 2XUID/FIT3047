<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine $orderLine
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
                class="fas fa-sm text-white-50"></i> Back</a></div>

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Order Line'), ['action' => 'edit', $orderLine->order_lines_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Order Line'), ['action' => 'delete', $orderLine->order_lines_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->order_lines_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Order Lines'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Order Line'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="row">
        <div class="column-responsive column-80">
            <div class="orderLine view content">
                <h3>Purchased ID <?= h($orderLine->order_lines_id) ?></h3>
                <table>
                    <th class="heading"><?= __('Actions') ?></th>
                    <td><?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderLine->order_lines_id], ['class' => 'side-nav-item']) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderLine->order_lines_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->order_lines_id), 'class' => 'side-nav-item']) ?>
                        <tr>
                            <th><?= __('Product') ?></th>
                            <td><?= $orderLine->has('product') ? $this->Html->link($orderLine->product->product_name, ['controller' => 'Products', 'action' => 'view', $orderLine->product->product_id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Order') ?></th>
                            <td><?= $orderLine->has('order') ? $this->Html->link($orderLine->order->order_id, ['controller' => 'Orders', 'action' => 'view', $orderLine->order->order_id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Order line Id') ?></th>
                            <td><?= $this->Number->format($orderLine->order_lines_id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Order Quantity') ?></th>
                            <td><?= $this->Number->format($orderLine->quantity) ?></td>
                        </tr>
                </table>
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
