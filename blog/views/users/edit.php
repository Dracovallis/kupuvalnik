<?php $this->title = 'Edit User Settings'; ?>

<div class="edit-form">
    <form method="post">
        <div class="login-full-name">
            <div>Пълно име:</div>
            <input id="full_name" type="text" name="user_full_name"
                   value="<?= htmlspecialchars($this->user['full_name']) ?>"/>
        </div>
        <div class="login-email">
            <div>Имейл:</div>
            <input id="email" type="text" name="user_email"
                   value="<?= htmlspecialchars($this->user['email']) ?>"/>
        </div>
        <div class="login-address">
            <div>Address:</div>
            <textarea id="address" rows="10" name="user_address"><?=
                htmlspecialchars($this->user['address']) ?></textarea>
        </div>
        <div class="login-phone-number">
            <div>Телефон:</div>
            <input id="phone-number" type="text" name="user_phone_number"
                   value="<?= htmlspecialchars($this->user['phone_number']) ?>"/>
        </div>

        <div class="register-gotologin-buttons">
            <div><input class="login-register-button" type="submit" value="Запази промените"></div>

        </div>


    </form>
</div>