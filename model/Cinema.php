<?php


namespace model;


class Cinema {

    private $cinema_id;
    private $name;
    private $location;

    /**
     * Cinema constructor.
     * @param $name
     * @param $location
     */
    public function __construct($cinema_id,$name, $location) {
        $this->cinema_id = $cinema_id;
        $this->name = $name;
        $this->location = $location;
    }

    /**
     * @param mixed $id
     */
    public function setId($id) {
        $this->cinema_id = $id;
    }

    /**
     * @return mixed
     */
    public function getId() {
        return $this->cinema_id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getLocation() {
        return $this->location;
    }

}

