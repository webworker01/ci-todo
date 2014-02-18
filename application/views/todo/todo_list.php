<h1>Todo</h1>

<?php if ($auth['logged_in']): ?>
    <?= validation_errors(); ?>

    <?= form_open("todo"); ?>

        <?= form_input($item);?>
        <?= form_input($date_due);?>
        <?= form_input($completed);?>
        <?= form_input($formid);?>

        <?= form_submit('submit', 'Submit');?>
    <?= form_close(); ?>
<?php endif; ?>

<table class="todolist">
    <tr>
        <th>Todo Item</th>
        <th>Due Date</td>
        <?php if ($auth['logged_in']) : ?><th>Completed</td><?php endif; ?>
    </tr>
<?php foreach ($list as $row => $data) : ?>
    <tr<?php if ($data->completed): ?> class="completed"<?php endif; ?>>
        <td><?= $data->item; ?></td>
        <td><?= $data->date_due; ?></td>
        <?php if ($auth['logged_in']) : ?><td><input type="checkbox" <?php if ($data->completed): ?>checked="checked"<?php endif; ?> id="todo-<?= $data->id; ?>" class="todo-checkbox"></td><?php endif; ?>
    </tr>
<?php endforeach; ?>
</table>

<script>
    var base_url = '<?= base_url(); ?>';    
</script>