<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrderLine> $orderLines
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
<div class="orderLines index content">
    <?= $this->Html->link(__('New Order Line'), ['action' => 'add'], ['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm']) ?>
    <h3><?= __('Order Lines') ?></h3>
    <div class="card mb-4">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('order_lines_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderLines as $orderLine): ?>
                <tr>
                    <td><?= $this->Number->format($orderLine->order_lines_id) ?></td>
                    <td><?= $orderLine->has('product') ? $this->Html->link($orderLine->product->product_name, ['controller' => 'Products', 'action' => 'view', $orderLine->product->product_id]) : '' ?></td>
                    <td><?= $this->Number->format($orderLine->quantity) ?></td>
                    <td><?= $orderLine->has('order') ? $this->Html->link($orderLine->order->order_id, ['controller' => 'Orders', 'action' => 'view', $orderLine->order->order_id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orderLine->order_lines_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderLine->order_lines_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderLine->order_lines_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLine->order_lines_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<style>
    table {
        border-collapse: collapse;
        max-width: 90vw;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

</style>
