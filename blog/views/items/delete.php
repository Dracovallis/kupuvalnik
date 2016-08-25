<?php $this->title = 'Delete Item'; ?>

<h1>Are you sure you want to delete this item?</h1>

<form method="post">
    <div>Title:</div>
    <input type="text" value="<?=htmlspecialchars($this->item['title'])?>" disabled/>
    <div>Description:</div>
    <textarea rows="10" disabled>
        <?= htmlspecialchars($this->item['description'])?>
    </textarea>
    <div>Date:</div>
    <input type="text" value="<?= htmlspecialchars($this->item['date'])?>" disabled/>
    <div>Author ID:</div>
    <input type="text" value="<?=htmlspecialchars($this->item['user_id'])?>" disabled/>
    <div><input type="submit" value="Delete" />
        <a href="<?=APP_ROOT?>/items">Cancel</a></div>
</form>

