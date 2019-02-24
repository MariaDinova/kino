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
     */
    public function __construct($user_id,$firstName, $lastName, $email, $password, $age) {
        $this->user_id = $user_id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->age = $age;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->user_id = $id;
    }

    /**
     * @param mixed $isAdmin
     */
    public function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }


    /**
     * @return mixed
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName(){
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName(){
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getEmail(){
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getAge(){
        return $this->age;
    }

    /**
     * @return mixed
     */
    public function getisAdmin() {
        return $this->isAdmin;
    }


}