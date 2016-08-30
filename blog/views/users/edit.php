<?php $this->title = 'Edit User Settings'; ?>

<div class="edit-form">
    <form method="post">
        <div>Full Name</div>
        <input type="text" name="user_full_name" value="<?= htmlspecialchars($this->user['full_name']) ?>"/>
        <div>E-mail:</div>
        <input type="text" name="user_email"
               value="<?= htmlspecialchars($this->user['email']) ?>"/>
        <div>Address:</div>
    <textarea rows="10" name="user_address"><?=
        htmlspecialchars($this->user['address']) ?></textarea>
        <div>Phone Number:</div>
        <input type="text" name="user_phone_number"
               value="<?= htmlspecialchars($this->user['phone_number']) ?>"/>

        <div><input type="submit" value="Edit">
            <a href="<?= APP_ROOT ?>/items">[Cancel]</a></div>
    </form>
</div>