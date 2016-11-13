<?php


class UserLifecycle
{

    const IS_ACTIVE = 1;
    const USER = 'user';

    /**
     * @var PDO
     */
    private $db = null;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getEmail(string $username) : string
    {
        $sql = "
            SELECT 
                email
            FROM
               users
            WHERE 
              username = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['email'];
    }

    public function getPassword(string $username) : string
    {
        $sql = "
            SELECT
                password
            FROM
                users
            WHERE 
               username = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['password'];
    }

    public function getFullName(string $username) : string
    {
        $sql = "
            SELECT
                full_name
            FROM
                users
            WHERE 
               username = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['full_name'];
    }

    public function getBirthday(string $username) : string
    {
        $sql = "
            SELECT
                birthday
            FROM
                users
            WHERE
                username = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['birthday'];
    }

    public function getRole(string $username) : string
    {
        $sql = "
            SELECT
                role
            FROM
                users
            WHERE
                username = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result['role'];
    }

    public function delete(string $username) : bool
    {
        $sql = "
            DELETE
            FROM
                users
            WHERE
               username = ? 
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        $result = $statement->fetch();

        return $result;
    }

    public function edit(string $username, array $data, array &$userInfo) : bool
    {
        if ($username != $data['username']) {
            if ($this->exists($data['username'])) {
                throw new Exception('Username is taken');
            }
        }

        $sql = "
            UPDATE
                users
            SET
                username = ?,
                email = ?,
                birthday = ?,
                full_name = ?, 
            WHERE
                username = ?
        ";

        $editStmt = $this->db->prepare($sql);

        $editStmt->execute([
            $data['username'],
            $data['email'],
            $data['birthday'],
            $data['full_name'],
            $data['username']
        ]);

        $userInfo['username'] = $data['username'];

        return $editStmt->rowCount() > 0;
    }

    public function register(string $username, string $password, string $email, string $full_name, DateTime $birthday) : bool
    {
        if ($this->exists($username)) {
            throw new Exception('Username already taken');
        }

        $day = $birthday->format('Y-m-d H-i-s');

        $sql = "
            INSERT INTO
                users
            (username, password, email, full_name, birthday, is_active)
            VALUES 
            (?, ?, ?, ?, ?, ?)
        ";

        $registerStmt = $this->db->prepare($sql);

        $registerStmt->execute([
            $username,
            password_hash($password, PASSWORD_BCRYPT),
            $email,
            $full_name,
            $day,
            self::IS_ACTIVE
        ]);

        return $registerStmt->rowCount() > 0;
    }

    public function login (string $username, string $password) : bool
    {
        $sql = "
            SELECT
                username,
                password
            FROM 
                users
            WHERE 
               username = ?
        ";

        $userStmt = $this->db->prepare($sql);

        $userStmt->execute([$username]);

        if ($userStmt->rowCount() <= 0) {
            return false;
        }

        $result = $userStmt->fetch(PDO::FETCH_ASSOC);

        $hashPassword = $result['password'];

        if (password_verify($password, $hashPassword)) {
            return true;
        }

        return false;
    }

    private function exists(string $username) : bool
    {
        $sql = "
                SELECT
                    *
                FROM
                    users
                WHERE
                    username = ?
            ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$username]);

        return $statement->rowCount() > 0;
    }
}