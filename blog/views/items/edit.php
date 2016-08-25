<?php $this->title = 'Edit Existing Item'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Title:</div>
    <input type="text" name="item_title" value="<?=htmlspecialchars($this->item['title'])?>" />
    <div>Image URL:</div>
    <input type="text"  name="item_image_link" value="<?=htmlspecialchars($this->item['image_link'])?>" />
    <div><input type="button" value="Check image"></div>
    <div>Description:</div>
    <textarea rows="10" name="item_description"><?=
        htmlspecialchars($this->item['description'])?></textarea>
    <div>Price:</div>
    <input type="number" step="0.01" name="item_price" value="<?=htmlspecialchars($this->item['price'])?>" />

    <!-- <div style="display: none">Date (yyy-MM-dd hh:mm:ss):</div> -->
    <input type="text" name="item_date" value="<?=
        htmlspecialchars($this->item['date'])?>" style="display: none" disabled/>
    <!--<div>Author ID:</div>
    <input type="text" name="user_id" value="<?=
    htmlspecialchars($this->item['user_id'])?>" /> -->
    <div><input type="submit" value="Edit">
        <a href="<?=APP_ROOT?>/items">[Cancel]</a></div>
</form>




