<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OrderLine $orderLine
 * @var string[]|\Cake\Collection\CollectionInterface $products
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
$formTemplate = [
    'textarea' => '<textarea name="{{name}}" class="form-control" {{attrs}}>{{value}}</textarea>',
];
$this->Form->setTemplates($formTemplate);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry</title>
    <link rel="stylesheet" href="log_styles.css">
    <?=$this->Html->css(['log_styles']) ?>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<main>
    <div class="row">
        <div class="colm-form">
            <div class="form-container">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <?php
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class' => 'btn-new']) ?>
                <?= $this->Form->end() ?>
                <a class="btn-new" href="<?= $this->Url->build('/') ?>">Back To Home</a>
                <a class="btn-new" href="<?= $this->Url->build('/users/login') ?>">Back To Login</a>
            </div>
        </div>
    </div>
</main>
</body>
</html>
</body>
</html>