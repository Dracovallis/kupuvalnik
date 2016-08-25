<?php $this->title = 'Items';?>

<h1><?=htmlspecialchars($this->title)?></h1>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Author ID</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->items as $item) : ?>
    <tr>
        <td><?= $item['id'] ?></td>
        <td><?= htmlspecialchars($item['title']) ?></td>
        <td><?= cutLongText($item['description']) ?></td>
        <td><?= htmlspecialchars($item['date']) ?></td>
        <td><?= $item['user_id'] ?></td>
        <td><a href="<?=APP_ROOT?>/items/edit/<?=$item['id']?> ">[Edit]</a>
            <a href="<?=APP_ROOT?>/items/delete/<?=$item['id']?> ">[Delete]</a></td>
    </tr>
    <?php endforeach ?>
</table>

<a href="<?=APP_ROOT?>/items/create">[Create New]</a>
