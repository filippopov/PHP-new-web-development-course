<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 13.11.2016 г.
 * Time: 17:23
 */

namespace DTO;


class Profile
{
    private $username;
    private $password;
    private $email;
    private $birthday;
    private $fullName;

    /**
     * Profile constructor.
     * @param $username
     * @param $password
     * @param $email
     * @param $birthday
     */
    public function __construct($username, $password, $email, $birthday, $fullName)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }


}