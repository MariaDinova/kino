<?php
namespace model;
class User {
    private $user_id;
    private $firstName;
    private $lastName;
    private $email;
    private $password;
    private $age;
    private $isAdmin;

    /**
     * User constructor.
     * @param $firstName
     * @param $lastName
     * @param $email
     * @param $password
     * @param $age
     * @param $isAdmin
     */
    public function __construct($user_id, $firstName, $lastName, $email, $password, $age, $isAdmin) {
        $this->user_id = $user_id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
        $this->isAdmin = $isAdmin;
    }

    /**
     * @param int $id
     */
    public function setId($id) {
        $this->user_id = $id;
    }

    /**
     * @param int $isAdmin
     */
    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }

    /**
     * @return int $id
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @return string $firstName
     */
    public function getFirstName(){
        return $this->firstName;
    }

    /**
     * @return string $lastName
     */
    public function getLastName(){
        return $this->lastName;
    }

    /**
     * @return string $email
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @return string $password
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @return void
     */
    function removePass(){
        unset($this->password);
    }

    /**
     * @return int $age
     */
    public function getAge(){
        return $this->age;
    }

    /**
     * @return int $isAdmin
     */
    public function getIsAdmin() {
        return $this->isAdmin;
    }
}


