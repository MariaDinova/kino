<?php

namespace model\dao;

use model\User;
class UserDao {

    public static function addUser(User $user){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("INSERT INTO users(first_name, last_name, email, password, age) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPassword(), $user->getAge()));
        $user->setId($pdo->lastInsertId());
    }

    /** @param $email
     * @return User*/
    public static function getByEmail($email){

        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT user_id, first_name, last_name, email, age, is_admin FROM users WHERE email=?");
        $stmt->execute(array($email));
        if ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $user = new User($row->user_id,$row->first_name, $row->last_name, $row->email,$row->age);
            $user->setIsAdmin($row->is_admin);
            return $user;
        }
        else {
            return null;
        }
    }

    public function updateUser (User $user){

    }
}