<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \App\Model\Entity\OrderLine $orderLine
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $products
 * @var \Cake\Collection\CollectionInterface|string[] $orders
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

</div>
    <h1 class="h3 mb-2 text-gray-800">Add New Order</h1>
    <div class="row">
            <div class="form-group py-sm-3 mb-2">
            <?= $this->Form->create($order) ?>
            <div class="col-sm-10">
                <?php echo $this->Form->control('order_date');?>
                <div class="mt-3">
                    <?php echo $this->Form->control('customer_id', ['options' => $customers, 'empty'=>'Select a customer']);
                    echo $this->Form->control('order_lines.1.product_id',['empty'=>'Select a product']);
                    echo $this->Form->control( 'order_lines.1.quantity');
                    echo $this->Form->control('order_lines.2.product_id',['empty'=>'Select a product']);
                    echo $this->Form->control( 'order_lines.2.quantity');
                    ?>
                </div>
            </div>
            <?= $this->Form->button(__('Place Order',['class' => 'd-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mr-1'])); ?>
            <?= $this->Form->end() ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

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
