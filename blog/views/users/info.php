<?php $this->title = $this->user['username']; ?>


<div class="user-info-wrapper">

    <aside class="user-info-sidebar">
        <div class="user-info"><span><b>Потребител:</b></span><br> <?= htmlspecialchars($this->user['username']); ?>
        </div>
        <div class="user-info"><span><b>Име:</b></span><br> <?= $this->user['full_name']; ?> </div>
        <div class="user-info"><span><b>Адрес:</b></span><br><?= $this->user['address']; ?></div>
        <div class="user-info"><span><b>Телефон:</b></span><br><?= $this->user['phone_number']; ?> </div>
        <div class="user-info"><span><b>Имейл:</b></span><br><?= $this->user['email']; ?> </div>

        <a href="<?= APP_ROOT ?>/users/edit/<?= htmlentities($this->user['id']) ?>">
            <div id="edit-button" class="user-info">Редактирай</div>
        </a>
        <a href="<?= APP_ROOT ?>/users/logout">
            <div id="logout-button" class="user-info">Изход</div>
        </a>

    </aside>

</div>

<div class="all-items-wrapper">
    <div class="all-items-title"><b>Вашите обяви:</b></div>

    <div class="all-items">

        <?php if (count($this->items) <= 0){
            
            ?> <div class="no-items"><img src="http://practicallyinspired.com/images/thumb-noitemsfound.png" alt="no-items"></div>
        <?php } ?>
        
            

        <?php foreach ($this->items as $item) : ?>

            <div id="individual-item-user-info" class="individual-item">
                <div class="home-image-thumbnail">
                    <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($item['id']) ?>"><img
                            class="home-image-thumbnail"
                            src="<?= htmlentities($item['image_link']) ?>" alt="thumbnail"></a>
                </div>
                <div class="item-info">
                    <div class="title"><h2><?= htmlentities($item['title']) ?></h2></div>
                    <div class="date-author-price">
                        <div class="date-and-author-div">
                            <div class="date">
                                <?= (new DateTime($item['date']))->format('d-M-Y') ?>
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

                <div class="single-item-buttons">

                    <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($item['id']) ?>"><div class="details-button">Подробности</div></a>
                    <a href="<?= APP_ROOT ?>/items/delete/<?= htmlentities($item['id']) ?>"><div class="delete-button">Изтрий</div></a>
                    <a href="<?= APP_ROOT ?>/items/edit/<?= htmlentities($item['id']) ?>"><div class="edit-button">Редактирай</div></a>
                </div>

            </div>

        <?php endforeach ?>


    </div>

</div>

