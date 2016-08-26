<?php $this->title = "Create New Item"; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Title:</div>
    <input type="text" name="item_title">
    <div>Image URL:</div>
    <input type="text" name="item_image_link">
    <div>Description:</div>
    <textarea rows="10" name="item_description"></textarea>
    <div name="item_category_box">Category:</div>
    <select name="item_category">
        <option value="none">-Изберете категория-</option>
        <?php foreach ($this->dropDownOptions as $option) : ?>

           
            <option value=" <?=htmlentities($option['id'])?> "> <?=htmlentities($option['name'])?> </option>

        <?php endforeach ?>
    </select>

    


    <div>Price:</div>
    <input type="number" step="0.01" name="item_price">
    <div><input type="submit" value="Create" />
        <a href="<?=APP_ROOT?>/items">[Cancel]</a></div>
</form>

