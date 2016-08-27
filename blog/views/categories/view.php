<?php $this->title = $this->category['name']; ?>
<h1><?=htmlspecialchars($this->title)?></h1>


<div><?= gettype($this->allItems) ?></div>
<?php foreach ($this->allItems as $item) : ?>

    <div><?= gettype($item) ?></div>

<?php endforeach ?>


<table>
    <tr>
        <th>Product Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Author ID</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->allItems as $item) : ?>
        <tr>
            <td><img src="<?= htmlspecialchars($item['image_link']) ?>" alt="thumbnail"></td>
            <td><?= htmlspecialchars($item['title']) ?></td>
            <td><?= cutLongText($item['description']) ?></td>
            <td><?= htmlspecialchars($item['date']) ?></td>
            <td><?= $item['user_id'] ?></td>
            <td><?= $item['price'] ?></td>
            <td><?= $item['category'] ?></td>
            <td><a href="<?=APP_ROOT?>/items/edit/<?=$item['id']?> ">[Edit]</a>
                <a href="<?=APP_ROOT?>/items/delete/<?=$item['id']?> ">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>