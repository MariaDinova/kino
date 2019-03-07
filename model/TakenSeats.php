<?php
namespace model;

class TakenSeats {
    private $row;
    private $seat;

    /**
     * TakenSeats constructor.
     * @param $row
     * @param $seat
     */
    public function __construct($row, $seat){
        $this->row = $row;
        $this->seat = $seat;
    }

    /**
     * @return int $row
     */
    public function getRow(){
        return $this->row;
    }

    /**
     * @param int $row
     */
    public function setRow($row){
        $this->row = $row;
    }

    /**
     * @return int $seat
     */
    public function getSeat(){
        return $this->seat;
    }

    /**
     * @param int $seat
     */
    public function setSeat($seat){
        $this->seat = $seat;
    }
}



