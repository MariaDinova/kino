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
     * @return mixed
     */
    public function getMovieName()
    {
        return $this->movieName;
    }

    /**
     * @param mixed $movieName
     */
    public function setMovieName($movieName)
    {
        $this->movieName = $movieName;
    }

    /**
     * @return mixed
     */
    public function getHallType()
    {
        return $this->hallType;
    }

    /**
     * @param mixed $hallType
     */
    public function setHallType($hallType)
    {
        $this->hallType = $hallType;
    }

    /**
     * @return mixed
     */
    public function getCinemaName()
    {
        return $this->cinemaName;
    }

    /**
     * @param mixed $cinemaName
     */
    public function setCinemaName($cinemaName)
    {
        $this->cinemaName = $cinemaName;
    }

    /**
     * @return mixed
     */
    public function getHourStart()
    {
        return $this->hourStart;
    }

    /**
     * @param mixed $hourStart
     */
    public function setHourStart($hourStart)
    {
        $this->hourStart = $hourStart;
    }

    /**
     * @return mixed
     */
    public function getMovieSlot()
    {
        return $this->movieSlot;
    }

    /**
     * @param mixed $movieSlot
     */
    public function setMovieSlot($movieSlot)
    {
        $this->movieSlot = $movieSlot;
    }




}