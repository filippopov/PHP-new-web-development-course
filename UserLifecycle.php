<?php


class UserLifecycle
{
    private $data = [];

    public function __construct()
    {
        include 'database.php';
        $this->data = $users;
    }

    public function getEmail(string $username) : string
    {
        $aUsers = $this->data;

        $user = isset($aUsers[$username]) ? $aUsers[$username] : array();
        $email = isset($user['email']) ? $user['email'] : '';

        return $email;
    }

    public function getPassword(string $username) : string
    {
        $aUsers = $this->data;

        $user = isset($aUsers[$username]) ? $aUsers[$username] : array();
        $password = isset($user['password']) ? $user['password'] : '';

        return $password;
    }

    public function getFullName(string $username) : string
    {
        $aUsers = $this->data;

        $user = isset($aUsers[$username]) ? $aUsers[$username] : array();
        $fullName = isset($user['full_name']) ? $user['full_name'] : '';

        return $fullName;
    }

    public function getBirthday(string $username) : string
    {
        $aUsers = $this->data;

        $user = isset($aUsers[$username]) ? $aUsers[$username] : array();
        $birthday = isset($user['birthday']) ? $user['birthday'] : '';

        return $birthday;
    }

    public function getRole(string $username) : string
    {
        $aUsers = $this->data;

        $user = isset($aUsers[$username]) ? $aUsers[$username] : array();
        $role = isset($user['role']) ? $user['role'] : '';

        return $role;
    }

    public function delete(string $username) : bool
    {
        unset($this->data[$username]);

        $usersAsText = var_export($this->data, true);

        $declaration = '<?php' . PHP_EOL . '$users = ' . $usersAsText . ';';

        $result = file_put_contents('database.php', $declaration);

        return $result !== false;
    }

    public function edit(string $username, array $data, array &$userInfo) : bool
    {
        $role = $this->getRole($username);

        $newUser = $data['username'];

        if ($data['password'] != $data['confirm']) {
            throw new Exception('Password and Confirm password do not match');
        }

       if ($newUser == $username) {
           $users[$newUser] = [
               'password' => $data['password'],
               'email' => $data['email'],
               'birthday' => $data['birthday'],
               'full_name' => $this->data[$username]['full_name'],
               'role' => $role
           ];
       } else {
           if(array_key_exists($newUser, $this->data)) {
               throw new Exception('Username is already taken');
           }

           $this->data[$newUser] = [
               'password' => $data['password'],
               'email' => $data['email'],
               'birthday' => $data['birthday'],
               'full_name' => $this->data[$username]['full_name'],
               'role' => $role
           ];

           unset($this->data[$username]);
       }

       $userInfo['user'] = $newUser;

       $usersAsText = var_export($this->data, true);

       $declaration = '<?php' . PHP_EOL . '$users = ' . $usersAsText . ';';

       $result = file_put_contents('database.php', $declaration);

       return $result !== false;
    }

    public function register (array $data) : bool
    {
        $user = isset($data['username']) ? $data['username'] : '';
        $password = isset($data['password']) ? $data['password'] : '';
        $passwordConfirm = isset($data['confirm']) ? $data['confirm'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $birthday = isset($data['birthday']) ? $data['birthday'] : '';
        $fullName = isset($data['full_name']) ? $data['full_name'] : '';

        if (empty($user)) {
            throw new Exception('Please enter username');
        }

        if (empty($password)) {
            throw new Exception('Please enter password');
        }

        if (empty($fullName)) {
            throw new Exception('Please enter full name');
        }

        if ($password != $passwordConfirm) {
            throw new Exception('Password and Confirm password do not match');
        }

        if(array_key_exists($user, $this->data)) {
            throw new Exception('This username already exist');
        }

        $this->data[$user] = [
            'password' => $password,
            'email' => $email,
            'birthday' => $birthday,
            'full_name' => $fullName,
            'role' => 'user'
        ];

        $usersAsText = var_export($this->data, true);

        $declaration = '<?php' . PHP_EOL . '$users = ' . $usersAsText . ';';

        $result = file_put_contents('database.php', $declaration);

        return $result !== false;
    }
}