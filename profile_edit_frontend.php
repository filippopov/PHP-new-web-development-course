<h2><?= $error ?></h2>
<h2><?= $success ?></h2>

<form method="post">
    <div>
        Username:
        <input type="text" name="username" value="<?= $username ?>">
    </div>
    <div>
        Password:
        <input type="password" name="password" value="<?= $password ?>">
    </div>
    <div>
        Confirm:
        <input type="password" name="confirm" placeholder="Confirm Password">
    </div>
    <div>
        Email:
        <input type="text" name="email" value="<?= $email ?>">
    </div>
    <div>
        Birthday:
        <input type="text" name="birthday" value="<?= $birthday ?>">
    </div>
    <div>
        Full Name:
        <input type="text"  value="<?= $fullName ?>" disabled="disabled">
    </div>
    <div>
        <input type="submit"  value="Edit">
    </div>
</form>

<a href="profile.php">Back to profile</a>