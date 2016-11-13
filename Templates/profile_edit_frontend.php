<?php
/** @var \DTO\Profile $data */
?>

<form method="post">
    <div>
        Username:
        <input type="text" name="username" value="<?= $data->getUsername() ?>">
    </div>
    <div>
        Email:
        <input type="text" name="email" value="<?= $data->getEmail() ?>">
    </div>
    <div>
        Birthday:
        <input type="text" name="birthday" value="<?= $data->getBirthday() ?>">
    </div>
    <div>
        Full Name:
        <input type="text"  value="<?= $data->getFullName() ?>" name="full_name">
    </div>
    <div>
        <input type="submit"  value="Edit">
    </div>
</form>

<a href="profile.php">Back to profile</a>