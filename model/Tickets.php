<?php


namespace model;


class Tickets {
    private $ticketId;
    private $cinema;
    private $hall;
    private $movie;
    private $date;
    private $prise;
    private $userId;

    /**
     * Tickets constructor.
     * @param $ticketId
     * @param $cinema
     * @param $hall
     * @param $movie
     * @param $date
     * @param $prise
     * @param $userId
     */
    public function __construct($ticketId, $cinema, $hall, $movie, $date, $prise, $userId)
    {
        $this->ticketId = $ticketId;
        $this->cinema = $cinema;
        $this->hall = $hall;
        $this->movie = $movie;
        $this->date = $date;
        $this->prise = $prise;
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getTicketId()
    {
        return $this->ticketId;
    }

    /**
     * @param mixed $ticketId
     */
    public function setTicketId($ticketId)
    {
        $this->ticketId = $ticketId;
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
    public function getPrise()
    {
        return $this->prise;
    }

    /**
     * @param mixed $prise
     */
    public function setPrise($prise)
    {
        $this->prise = $prise;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }




}