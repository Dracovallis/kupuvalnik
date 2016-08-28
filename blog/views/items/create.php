<?php $this->title = "Create New Item"; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Title:</div>
    <input type="text" name="item_title">
    <div>Image URL:</div>
    <input  id="item_image_link" type="text" name="item_image_link">
    <div><input type="button" onclick="show_image('http://orig10.deviantart.net/14d5/f/2010/183/6/c/random_item_stock_29_by_storms_stock.jpg',
                 '  No Preview');" value="Preview Image"></div>
    <div id="imageDiv"></div>
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



<script>

    function show_image(src, alt) {

        var img = document.createElement("img");
        img.src = document.getElementById('item_image_link').value;
        //img.width = width;
        //img.height = height;
        img.alt = alt;

        img.width = 100;
        img.height = 100;

        // This next line will just add it to the <body> tag
        // document.body.appendChild(img);

        document.getElementById('imageDiv').innerHTML = "";
        document.getElementById('imageDiv').appendChild(img);
    }




</script>