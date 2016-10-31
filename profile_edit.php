<?php
session_start();

include 'database.php';
include 'UserLifecycle.php';

$userInfo = $users[$_SESSION['user']];

$username = $_SESSION['user'];
$password = $userInfo['password'];
$email = $userInfo['email'];
$birthday = $userInfo['birthday'];
$fullName = $userInfo['full_name'];

$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';

$adminEdit = isset($_GET['adminEdit']) ? $_GET['adminEdit'] : '';

//if (! empty($_POST)) {
//    $editUser = $_POST['username'];
//    $editPassword = $_POST['password'];
//    $editPasswordConfirm = $_POST['confirm'];
//    $editEmail = $_POST['email'];
//    $editBirthday = $_POST['birthday'];
//
//    if ($editPassword != $editPasswordConfirm) {
//        header('Location: profile_edit.php?error=Password and Confirm password do not match');
//        exit;
//    }
//
//    if ($editUser == $_SESSION['user']) {
//        $users[$editUser] = [
//            'password' => $editPassword,
//            'email' => $editEmail,
//            'birthday' => $editBirthday,
//            'full_name' => $fullName
//        ];
//    } else {
//        if(array_key_exists($editUser, $users)) {
//            header('Location: profile_edit.php?error=This username already exist');
//            exit;
//        }
//
//        $users[$editUser] = [
//            'password' => $editPassword,
//            'email' => $editEmail,
//            'birthday' => $editBirthday,
//            'full_name' => $fullName
//        ];
//
//        unset($users[$_SESSION['user']]);
//
//        $_SESSION['user'] = $editUser;
//    }
//
//    $usersAsText = var_export($users, true);
//
//    $declaration = '<?php' . PHP_EOL . '$users = ' . $usersAsText . ';';
//
//    $result = file_put_contents('database.php', $declaration);
//
//    if (! $result) {
//        header('Location: profile_edit.php?error=Sorry but your data can not be update');
//        exit;
//    } else {
//        header('Location: profile_edit.php?success=Edit Successfully');
//        exit;
//    }
//}

$adminUri = '';

if(! empty($adminEdit)) {
    $username = $adminEdit;
    $adminUri = "adminEdit=$username&";
}


if (! empty($_POST)) {
    $userLifeCycle = new UserLifecycle();

    $result = false;

    try {
        $result = $userLifeCycle->edit($username, $_POST, $_SESSION);
    } catch (Exception $e) {
        header('Location: profile_edit.php?' . $adminUri . 'error=' . $e->getMessage());
        exit;
    }

    if (! $result) {
        header('Location: profile_edit.php?' . $adminUri . 'error=Sorry but your data can not be update');
        exit;
    } else {
        header('Location: profile_edit.php?' . $adminUri . 'success=Edit Successfully');
        exit;
    }
}

include 'profile_edit_frontend.php';