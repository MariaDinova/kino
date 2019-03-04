<?php


namespace model;


class AgeRestriction {

    private $age_rest_id;
    private $restriction;

    /**
     * AgeRestriction constructor.
     * @param $age_rest_id
     * @param $restriction
     */
    public function __construct($age_rest_id, $restriction){
        $this->age_rest_id = $age_rest_id;
        $this->restriction = $restriction;
    }

    /**
     * @param mixed $age_rest_id
     */
    public function setAgeRestId($age_rest_id) {
        $this->age_rest_id = $age_rest_id;
    }

    /**
     * @return mixed
     */
    public function getAgeRestId() {
        return $this->age_rest_id;
    }

    /**
     * @return mixed
     */
    public function getRestriction() {
        return $this->restriction;
    }




}