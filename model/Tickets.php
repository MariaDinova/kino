<?php


namespace model;


class Tickets {

    private $date;
    private $price;
    private $row;
    private $seat;
    private $startHour;
    private $movie;
    private $hall;
    private $cinema;

    /**
     * Tickets constructor.
     * @param $date
     * @param $price
     * @param $row
     * @param $seat
     * @param $startHour
     * @param $movie
     * @param $hall
     * @param $cinema
     */
    public function __construct($date, $price, $row, $seat, $startHour, $movie, $hall, $cinema)
    {
        $this->date = $date;
        $this->price = $price;
        $this->row = $row;
        $this->seat = $seat;
        $this->startHour = $startHour;
        $this->movie = $movie;
        $this->hall = $hall;
        $this->cinema = $cinema;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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

    /**
     * @return mixed
     */
    public function getStartHour()
    {
        return $this->startHour;
    }

    /**
     * @param mixed $startHour
     */
    public function setStartHour($startHour)
    {
        $this->startHour = $startHour;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @param mixed $movie
     */
    public function setMovie($movie)
    {
        $this->movie = $movie;
    }

    /**
     * @return mixed
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @param mixed $hall
     */
    public function setHall($hall)
    {
        $this->hall = $hall;
    }

    /**
     * @return mixed
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * @param mixed $cinema
     */
    public function setCinema($cinema)
    {
        $this->cinema = $cinema;
    }


}

