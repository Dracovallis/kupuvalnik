<?php $this->title = $this->item['title']; ?>

<main id="single-item">
    <div class="single-item-all-blocks">

        <div class="single-item-block-one">
            <div class="single-item-image"><img src="<?= htmlentities($this->item['image_link']) ?>" alt="thumbnail">
            </div>
            <div class="single-item-title"><b><?= htmlentities($this->item['title']) ?></b></div>
            <div class="single-item-date">Публикувана на: <?= htmlentities($this->item['date']) ?></div>
            <div class="single-item-price-container">
                <div class="single-item-price"><b>$</b> <?= htmlentities($this->item['price']) ?></div>
            </div>
        </div>

        <div class="single-item-block-two">
            <div class="single-item-description"><?= htmlentities($this->item['description']) ?></div>
        </div>
        
        <div class="single-item-block-three">
            <img src="<?=
            $this->getCategoryImage($this->item['category']) ?>" alt="category-img">
        </div>

        <div class="single-item-block-four">
            <div class="single-item-seller-info-header"><b>За: <?= htmlspecialchars($this->item['username']); ?></b></div>
            <div class="single-item-seller-info-container">
                <div class="single-item-seller-info-title"></div>
                <div class="single-item-seller-info-username">
                    <span><b>Потребител:</b></span><br> <?= htmlspecialchars($this->item['username']); ?>
                </div>
                <br>
                <div class="single-item-seller-info-full-name">
                    <span><b>Име:</b></span><br> <?= $this->item['full_name']; ?> </div>
                <br>
                <div class="single-item-seller-info-address">
                    <span><b>Адрес:</b></span><br><?= $this->item['address']; ?>
                </div>
                <br>
                <div class="single-item-seller-info-phone">
                    <span><b>Телефон:</b></span><br><?= $this->item['phone_number']; ?>
                </div>
                <br>
                <div class="single-item-seller-info-email"><span><b>Имейл:</b></span><br><?= $this->item['email']; ?>
                </div>
            </div>
        </div>

    </div>
</main>
