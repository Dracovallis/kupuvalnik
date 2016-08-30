<?php $this->title = 'Items';?>

<aside class="sidebar">
    <h2 class="sidebar-title">Рубрики</h2>
    <br>
    <?php foreach ($this->sidebarItems as $category) : ?>
        <a href="<?= APP_ROOT ?>/categories/view/<?= $category['id'] ?>"><img src="<?=
            htmlentities($category['image_link']) ?>" alt="category-img"><?=
            htmlentities($category['name']) ?></a>
    <?php endforeach ?>
</aside>

<main class="main-items">
    <div class="all-items">
        <?php foreach ($this->items as $item) : ?>
            <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($item['id']) ?>">
                <div class="all-items-individual-item">
                    <div class="home-image-thumbnail">
                        <img
                            class="home-image-thumbnail"
                            src="<?= htmlentities($item['image_link']) ?>" alt="thumbnail">
                    </div>
                    <div class="all-items-item-info">
                        <div class="title"><h2><?= htmlentities($item['title']) ?></h2></div>
                        <div class="date-author-price">
                            <div class="date-and-author-div">
                                <div class="date">
                                    <?= (new DateTime($item['date']))->format('d-M-Y') ?>
                                </div>
                                <div class="author">
                                    <img class="user-icon" src="<?= APP_ROOT ?>/content/images/user.png"
                                         alt="user"> <?= htmlentities($item['full_name']) ?>
                                </div>
                            </div>
                            <div class="price">
                                <div class="price-text"></div>
                                <i>$ </i> <?= htmlentities($item['price']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="all-items-description">
                        <p><?= $item['description'] ?></p>
                    </div>
                    <div class="category-img">
                        <img src="<?=
                        $this->getCategoryImage($item['category']) ?>" alt="category-img">
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</main>