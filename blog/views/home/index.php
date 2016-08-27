<?php $this->title = 'Welcome to My Blog'; ?>
<link rel="stylesheet" type="text/css" href="blog/content/home-styles.css"/>

<h1><?= htmlspecialchars($this->title) ?></h1>

<aside>
    <h2>Categories</h2>
    <?php foreach ($this->sidebarItems as $category) : ?>
        <a href="<?= APP_ROOT ?>/categories/view/<?= $category['id'] ?>"><?=
            htmlentities($category['name']) ?></a>
    <?php endforeach ?>
</aside>

<main id="items">
    <div class="all-items">
        <?php foreach ($this->items as $item) : ?>
            <div class="individual-item">
                <div class="home-image-thumbnail">
                    <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($item['id']) ?>"><img
                            class="home-image-thumbnail"
                            src="<?= htmlentities($item['image_link']) ?>" alt="thumbnail"></a>
                </div>
                <div class="item-info">
                    <div class="title"><h2><?= htmlentities($item['title']) ?></h2></div>
                    <div class="date-author-price">
                        <div class="date-and-author-div">
                            <div class="date"><i>Date: </i>
                                <?= (new DateTime($item['date']))->format('d-M-Y') ?>
                            </div>
                            <div class="author">
                                <i>Author: </i> <?= htmlentities($item['full_name']) ?>
                            </div>
                        </div>
                        <div class="price">
                            <div class="price-text"></div>
                            <i>$ </i> <?= htmlentities($item['price']) ?>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <p><?= $item['description'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</main>
