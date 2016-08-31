<div class="edit-form">
    <form method="post">
        <div class="edit-create-item-title">
            <div>Title:</div>
            <input type="text" value="<?= htmlspecialchars($this->item['title']) ?>" disabled/>
        </div>
        <div class="edit-create-item-description">
            <div>Описание:</div>
    <textarea rows="10" disabled>
        <?= htmlspecialchars($this->item['description']) ?>
    </textarea>
        </div>
        <div class="edit-create-item-buttons">

        <div><input class="edit-create-item-edit-button"  type="submit" value="Delete"/>
            <a class="edit-create-item-cancel-button" href="<?= APP_ROOT ?>/users/info">Cancel</a></div>
            </div>
    </form>
</div>

