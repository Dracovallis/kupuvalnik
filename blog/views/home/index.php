<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<aside>
    <h2>Recent Items</h2>
    <?php foreach ($this->sidebarItems as $item) : ?>
        <a href="<?=APP_ROOT?>/home/view/<?= $item['id']?>"><?=
            htmlentities($item['title'])?></a>
    <?php endforeach ?>
</aside>

<main id="items">
    <article>
        <?php foreach ($this->items as $item) : ?>
            <h2 class="title"><?= htmlentities($item['title']) ?></h2>
            <div class="date"><i>Posted on</i>
                <?= (new DateTime($item['date']))->format('d-M-Y') ?>
                <i>by</i> <?= htmlentities($item['full_name']) ?>
            </div>
            <p class="description"><?= $item['description'] ?></p>
        <?php endforeach ?>
    </article>
</main>
