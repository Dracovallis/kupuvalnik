<?php $this->title = $this->item['title']; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main id="items">
    <article>
        <div class="date"><i>Posted on</i>
            <?=(new DateTime($this->item['date']))->format('d-M-Y')?>
            <i>by</i> <?=htmlentities($this->item['full_name'])?>
        </div>
        <p class="description"><?=$this->item['description']?></p>
    </article>
</main>
