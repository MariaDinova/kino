<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/6/2019
 * Time: 3:27 PM
 */

namespace model;


class HallTypes{
    private $typeId;
    private $type;

    public function __construct($typeId, $type){
        $this->typeId = $typeId;
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }



}