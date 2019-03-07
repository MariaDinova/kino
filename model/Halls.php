<?php
namespace model;

class Halls {
    private $hall_id;
    private $cinema;
    private $hallType;
    private $seats;
    private $hallRows;

    /**
     * Halls constructor.
     * @param $hall_id
     * @param $cinema
     * @param $hallType
     * @param $seats
     * @param $hallRows
     */
    public function __construct($hall_id, $cinema, $hallType, $seats, $hallRows){
        $this->hall_id = $hall_id;
        $this->cinema = $cinema;
        $this->hallType = $hallType;
        $this->seats = $seats;
        $this->hallRows = $hallRows;
    }

    /**
     * @return int $hallId
     */
    public function getHallId(){
        return $this->hall_id;
    }

    /**
     * @return string $cinema
     */
    public function getCinema(){
        return $this->cinema;
    }

    /**
     * @return $hallType
     */
    public function getHallType(){
        return $this->hallType;
    }

    /**
     * @return $seats
     */
    public function getSeats(){
        return $this->seats;
    }

    /**
     * @return $hallRows
     */
    public function getHallRows(){
        return $this->hallRows;
    }
}



