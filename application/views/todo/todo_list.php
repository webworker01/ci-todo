<h1>Todo</h1>

<?= validation_errors(); ?>

<?= form_open("todo/add"); ?>
 
    <?= form_input($item);?>
    <?= form_input($date_due);?>
    <?= form_checkbox($completed);?>

    <?= form_submit('submit', 'Submit');?>
<?= form_close(); ?>

<ul>
<?php foreach ($list as $row => $data) : ?>
    <li><?= $data->item; ?></li>
<?php endforeach; ?>
</ul>