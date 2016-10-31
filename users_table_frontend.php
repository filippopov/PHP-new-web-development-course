<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Birthday</th>
                <th>Full Name</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($users as $name => $value) : ?>
        <tr>
            <td><?=$name?></td>
            <td><?=$value['email']?></td>
            <td><?=$value['birthday']?></td>
            <td><?=$value['full_name']?></td>
            <td><?=$value['role']?></td>
            <?php if($isAdmin) : ?>
                <td><a href="profile_edit.php?adminEdit=<?=$name?>" class="btn btn-info">Edit Profile</a></td>
                <td><a class="btn btn-danger" id="<?=$name?>" onclick="deleteUser(this.id)">Delete Profile</a></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
</div>

<a href="profile.php">Back to profile</a>

<script>
    function deleteUser(name) {
        $.ajax({
            url: 'profile_delete.php',
            data: {
                user: name
            },
            success: function() {
                window.location.reload(true);
            }
        }, 1);
    }
</script>