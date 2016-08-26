<?php $this->title = $this->category['name']; ?>
<h1><?=htmlspecialchars($this->title)?></h1>


<div><?= gettype($this->items) ?></div>

<?php foreach ($this->items as $item) : ?>

    <div><?= $item ?></div>

<?php endforeach ?>

<table>
    <tr>
        <th>Product Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Author ID</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->items as $item) : ?>
        <tr>
            <td><img src="<?= htmlspecialchars($item) ?>" alt="thumbnail"></td>
            <td><?= htmlspecialchars($item) ?></td>
            <td><?= cutLongText($item) ?></td>
            <td><?= htmlspecialchars($item) ?></td>
            <td><?= $item ?></td>
            <td><?= $item ?></td>
            <td><a href="<?=APP_ROOT?>/items/edit/<?=$item?> ">[Edit]</a>
                <a href="<?=APP_ROOT?>/items/delete/<?=$item?> ">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>