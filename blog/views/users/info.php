<?php $this->title = $this->user['username']; ?>



<wrapper class="user-info-wrapper">

    <aside class="user-info-sidebar">
       <div class="user-info">Username: <?= htmlspecialchars($this->user['username']); ?> </div>
       <div class="user-info">Full Name: <?= $this->user['full_name']; ?> </div>
       <div class="user-info">Address: <?= $this->user['address']; ?></div>
       <div class="user-info">Phone: <?= $this->user['phone_number']; ?> </div>
       <div class="user-info">E-mail: <?= $this->user['email']; ?> </div>
    </aside>
    
    
    <div>
        <div>Your Items:</div>

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
                </div>




            <?php endforeach ?>



        </div>
            
    </div>


    
</wrapper>