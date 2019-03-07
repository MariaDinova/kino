<?php
namespace model\dao;

use model\User;
class UserDao {
    /**
     * @param User $user
     *
     * @return void
     */
    public static function addUser(User $user){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("INSERT INTO users(first_name, last_name, email, password, age) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPassword(), $user->getAge()));
        $user->setId($pdo->lastInsertId());
    }


    /**
     * UserCotroller use this in:
     *  -register - to check if email is already exist
     *  -in login - to get user info for session
     *
     * @param $email
     * @return object User
     */
    public static function getByEmail($email){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT user_id, first_name, last_name, email, password, age, is_admin FROM users WHERE email=?");
        $stmt->execute(array($email));
        if ($row = $stmt->fetch(\PDO::FETCH_OBJ)) {
            $user = new User($row->user_id,$row->first_name, $row->last_name, $row->email,$row->password, $row->age,$row->is_admin);
            $user->removePass();
            return $user;
        }
        else {
            return null;
        }
    }

    /**
     * UserCotroller use this in login to verify the password
     *
     * @param $email
     * @return string $password
     */
    public static function getPassByEmail($email){
        $pdo = DBConnection::getSingletonPDO();
        $stmt = $pdo->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->execute(array($email));
        if($stmt->rowCount()== 0){
            return null;
        }
        else {
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result["password"];
        }
    }
}

