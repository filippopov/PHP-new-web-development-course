<h2><?= $error ?></h2>

<form method="post">
    <div>
        Username:
        <input type="text" name="username"> *
    </div>
    <div>
        Password:
        <input type="password" name="password"> *
    </div>
    <div>
        Confirm:
        <input type="password" name="confirm"> *
    </div>
    <div>
        Email:
        <input type="text" name="email">
    </div>
    <div>
        Birthday:
        <input type="text" name="birthday">
    </div>
    <div>
        Full Name:
        <input type="text" name="full_name"> *
    </div>
    <div>
        <input type="submit"  value="Register">
    </div>
</form>

<a href="home.php">Home page</a>