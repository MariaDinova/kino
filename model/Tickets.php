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
    public function __construct($date, $price, $row, $seat, $startHour, $movie, $hall, $cinema) {
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
     * @return $date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param $date
     */
    public function setDate($date){
        $this->date = $date;
    }

    /**
     * @return $price
     */
    public function getPrice(){
        return $this->price;
    }

    /**
     * @param $price
     */
    public function setPrice($price){
        $this->price = $price;
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

    /**
     * @return $startHour
     */
    public function getStartHour(){
        return $this->startHour;
    }

    /**
     * @param $startHour
     */
    public function setStartHour($startHour){
        $this->startHour = $startHour;
    }

    /**
     * @return string $movie
     */
    public function getMovie(){
        return $this->movie;
    }

    /**
     * @param string $movie
     */
    public function setMovie($movie){
        $this->movie = $movie;
    }

    /**
     * @return string $hall
     */
    public function getHall(){
        return $this->hall;
    }

    /**
     * @param string $hall
     */
    public function setHall($hall){
        $this->hall = $hall;
    }

    /**
     * @return string $cinema
     */
    public function getCinema(){
        return $this->cinema;
    }

    /**
     * @param string $cinema
     */
    public function setCinema($cinema){
        $this->cinema = $cinema;
    }
}



