<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 2.3.2019 г.
 * Time: 18:04 ч.
 */

namespace model;


class TakenSeats {
    private $row;
    private $seat;

    /**
     * TakenSeats constructor.
     * @param $row
     * @param $seat
     */
    public function __construct($row, $seat)
    {
        $this->row = $row;
        $this->seat = $seat;
    }

    /**
     * @return mixed
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param mixed $row
     */
    public function setRow($row)
    {
        $this->row = $row;
    }

    /**
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param mixed $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }
}