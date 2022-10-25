<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $orderLines
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
    <div class="col-md-1 container-fluid">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->order_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->order_id], ['confirm' => __('Are you sure you want to delete ?', $order->order_id), 'class' => 'side-nav-item']) ?>
            <div>
                <?= $this->Html->link(__('List'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            </div>
            <div>
                <?= $this->Html->link(__('Add items'), ['controller' => 'OrderLines','action' => 'add'], ['class' => 'side-nav-item']) ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-9">
            <h3>Order ID <?= h($order->order_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order Date') ?></th>
                    <td><?= h($order->order_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $order->has('customer') ? $this->Html->link($order->customer->customer_name, ['controller' => 'Customers', 'action' => 'view', $order->customer->customer_id]) : '' ?></td>
                </tr>
                <div class="related">
                    <?php if (!empty($order->order_lines)) : ?>
                        <div class="card mb-4">
                            <table>
                                <tr>
                                    <th><?= __('Order Line ID') ?></th>
                                    <th><?= __('Product Name') ?></th>
                                    <th><?= __('Quantity') ?></th>
                                    <th><?= __('Unit Price') ?></th>
                                    <th><?= __('Total Price') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>

                                </tr>
                                <?php $sum = 0 ?>
                                <?php foreach ($order->order_lines as $orderLines) :
                                        foreach ($products as $product):
                                             if($product['product_id']== $orderLines['product_id']):?>
                                        <tr>
                                            <td><?= h($orderLines->order_lines_id) ?></td>
                                            <td><?= $product['product_name'] ?></td>
                                            <td><?= h($orderLines->quantity) ?></td>
                                            <td>$ <?php echo $product['product_price'];?></td>
                                            <td>$ <?php $subtotal = [$product['product_price']*$orderLines['quantity']];  echo $product['product_price']*$orderLines['quantity'];?></td>
                                            <?php foreach ($subtotal as $total)
                                                $sum+=$total; ?>

                                            <td class="actions">
                                                <?= $this->Html->link(__('Edit'), ['controller' => 'OrderLines', 'action' => 'edit', $orderLines->order_lines_id]) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderLines', 'action' => 'delete', $orderLines->order_lines_id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderLines->order_lines_id)]) ?>
                                            </td>
                                        </tr>
                                <?php endif;
                                        endforeach;
                                endforeach; ?>
                                <tr>
                                    <th><?= __('Order Total') ?></th>
                                    <td>$ <?php  echo $sum ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
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
