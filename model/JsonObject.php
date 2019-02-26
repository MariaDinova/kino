<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/26/2019
 * Time: 1:52 PM
 */

namespace model;


class JsonObject implements \JsonSerializable {
    public function jsonSerialize(){

        return get_object_vars($this);
    }

}