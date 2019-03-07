<?php
namespace model;
class TicketInfo{
    private $movieName;
    private $hallType;
    private $cinemaName;
    private $hourStart;
    private $movieSlot;

    /**
     * TicketInfo constructor.
     * @param $movieName
     * @param $hallType
     * @param $cinemaName
     * @param $hourStart
     * @param $movieSlot
     */
    public function __construct($movieName, $hallType, $cinemaName, $hourStart, $movieSlot){
        $this->movieName = $movieName;
        $this->hallType = $hallType;
        $this->cinemaName = $cinemaName;
        $this->hourStart = $hourStart;
        $this->movieSlot = $movieSlot;
    }

    /**
     * @return string $movieName
     */
    public function getMovieName(){
        return $this->movieName;
    }

    /**
     * @param string $movieName
     */
    public function setMovieName($movieName){
        $this->movieName = $movieName;
    }

    /**
     * @return string $hallType
     */
    public function getHallType(){
        return $this->hallType;
    }

    /**
     * @param string $hallType
     */
    public function setHallType($hallType){
        $this->hallType = $hallType;
    }

    /**
     * @return string $cinemaName
     */
    public function getCinemaName(){
        return $this->cinemaName;
    }

    /**
     * @param string $cinemaName
     */
    public function setCinemaName($cinemaName){
        $this->cinemaName = $cinemaName;
    }

    /**
     * @return $hourStart
     */
    public function getHourStart(){
        return $this->hourStart;
    }

    /**
     * @param $hourStart
     */
    public function setHourStart($hourStart){
        $this->hourStart = $hourStart;
    }

    /**
     * @return int $movieSlot
     */
    public function getMovieSlot(){
        return $this->movieSlot;
    }

    /**
     * @param int $movieSlot
     */
    public function setMovieSlot($movieSlot){
        $this->movieSlot = $movieSlot;
    }
}

