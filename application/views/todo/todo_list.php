<h1>Todo</h1>

<ul>
<?php foreach ($list as $row => $data) : ?>
    <li><?= $data->item; ?></li>
<?php endforeach; ?>
</ul>