<?php $this->title = $this->category['name']; ?>



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
        <!--<div class="all-items-plus-image"> -->
            <div class="all-items">

                <?php if (count($this->allItems) <= 0){

                    ?> <div id="category-no-items" class="no-items"><img src="http://practicallyinspired.com/images/thumb-noitemsfound.png" alt="no-items"></div>
                <?php } ?>

                <?php foreach ($this->allItems as $item) : ?>
                    <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($this->model->getItemId($item['title'])) ?>">
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
                        </div>
                    </a>
                <?php endforeach ?>
                <div class="category-image">
                    <img src="<?= $this->category['image_link'] ?>" alt="category-img">
                </div>
            </div>
        <!--  </div> -->
    </main>
