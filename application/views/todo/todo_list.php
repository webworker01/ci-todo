<h1>Todo</h1>

<?= validation_errors(); ?>

<?= form_open("todo"); ?>
 
    <?= form_input($item);?>
    <?= form_input($date_due);?>
    <?= form_input($completed);?>
    <?= form_input($formid);?>

    <?= form_submit('submit', 'Submit');?>
<?= form_close(); ?>

<table>
    <tr>
        <th>Todo Item</th>
        <th>Due Date</td>
        <th>Completed</td>
    </tr>
<?php foreach ($list as $row => $data) : ?>
    <tr>
        <td><?= $data->item; ?></td>
        <td><?= $data->date_due; ?></td>
        <td><?= $data->completed; ?></td>
    </tr>
<?php endforeach; ?>
