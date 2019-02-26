<?php
/**
 * Created by PhpStorm.
 * User: Maria
 * Date: 24.2.2019 г.
 * Time: 18:53 ч.
 */

namespace model;

class Program {
    private $program_id;
    private $hall;
    private $movie;
    private $cinema;
    private $hourStart;
    private $startDate;
    private $endDate;
    private $screening;
    private $slot;
    private $programByDate;

    /**
     * Program constructor.
     * @param $program_id
     * @param $hall
     * @param $movie
     * @param $cinema
     * @param $hourStart
     * @param $startDate
     * @param $endDate
     * @param $screening
     * @param $slot
     * @param $programByDate
     */
    public function __construct($program_id, $hall, $movie, $cinema, $hourStart, $startDate, $endDate, $screening, $slot, $programByDate)
    {
        $this->program_id = $program_id;
        $this->hall = $hall;
        $this->movie = $movie;
        $this->cinema = $cinema;
        $this->hourStart = $hourStart;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->screening = $screening;
        $this->slot = $slot;
        $this->programByDate = $programByDate;
    }

    /**
     * @return mixed
     */
    public function getProgramId()
    {
        return $this->program_id;
    }

    /**
     * @return mixed
     */
    public function getHall()
    {
        return $this->hall;
    }

    /**
     * @return mixed
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @return mixed
     */
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * @return mixed
     */
    public function getHourStart()
    {
        return $this->hourStart;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @return mixed
     */
    public function getScreening()
    {
        return $this->screening;
    }

    /**
     * @return mixed
     */
    public function getSlot()
    {
        return $this->slot;
    }

    /**
     * @return mixed
     */
    public function getProgramByDate()
    {
        return $this->programByDate;
    }



}