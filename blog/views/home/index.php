<?php $this->title = 'Welcome to My Blog'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<aside>
    <h2>Categories</h2>
    <?php foreach ($this->sidebarItems as $category) : ?>
        <a href="<?=APP_ROOT?>/home/view/<?= $category['name']?>"><?=
            htmlentities($category['name'])?></a>
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
            <a href="<?= APP_ROOT ?>/home/view/<?= htmlentities($item['id']) ?>"><img src="<?= htmlentities($item['image_link']) ?>" alt="thumbnail"></a>
            <p class="description"><?= $item['description'] ?></p>
        <?php endforeach ?>
    </article>
</main>
