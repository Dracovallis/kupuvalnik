<div class="edit-form">
    <form method="post">
        <div class="edit-create-item-title">
            <div>ЗАГЛАВИЕ</div>
            <input type="text" name="item_title" value="<?= htmlspecialchars($this->item['title']) ?>"/>
        </div>
        <div class="edit-create-item-url">
            <div>Линк към изображението:</div>
            <input type="text" id="item_image_link" name="item_image_link"
                   value="<?= htmlspecialchars($this->item['image_link']) ?>"/>
            <div><input type="button" id="item_image_button" onclick="show_image('http://orig10.deviantart.net/14d5/f/2010/183/6/c/random_item_stock_29_by_storms_stock.jpg',
                 '  No Preview');" value="Виж изображението"></div>
            <div id="imageDiv"></div>
        </div>
        <div class="edit-create-item-description">
            <div>Описание:</div>
            <textarea rows="10" name="item_description"><?=
                htmlspecialchars($this->item['description']) ?></textarea>
        </div>
        <div class="edit-create-item-category">
            <div>Категория:</div>
            <select name="item_category">
                <option value="none">-Изберете категория-</option>
                <?php foreach ($this->dropDownOptions as $option) : ?>
                    <option value=" <?= htmlentities($option['id']) ?> "> <?= htmlentities($option['name']) ?> </option>

                <?php endforeach ?>
            </select>
        </div>
        <div class="edit-create-item-price">
            <div>Цена:</div>
            <input type="number" step="0.01" name="item_price" value="<?= htmlspecialchars($this->item['price']) ?>"/>
        </div>

        <input type="text" name="item_date" value="<?=
        htmlspecialchars($this->item['date']) ?>" style="display: none" disabled/>


        <div class="edit-create-item-buttons"><input class="edit-create-item-edit-button" type="submit" value="Промени">
            <div class="edit-create-item-cancel-button"> <a href="<?= APP_ROOT ?>/items">Отказ</a></div></div>


    </form>
</div>




<script>

    function show_image(src, alt) {

        var img = document.createElement("img");
        img.src = document.getElementById('item_image_link').value;
        //img.width = width;
        //img.height = height;
        img.alt = alt;

        img.width = 300;
        img.height = 300;

        // This next line will just add it to the <body> tag
        // document.body.appendChild(img);

        document.getElementById('imageDiv').innerHTML = "";
        document.getElementById('imageDiv').appendChild(img);
    }


</script>