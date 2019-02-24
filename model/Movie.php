<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2/24/2019
 * Time: 1:25 PM
 */

namespace model;


class movie{
    private $id;
    private $name;
    private $description;
    private $movie_type;
    private $image_uri;
    private $trailer_uri;
    private $age_rest;
    private $start_date;
    private $end_date;

    /**
     * movie constructor.
     * @param $name
     * @param $description
     * @param $movie_type
     * @param $image_uri
     * @param $trailer_uri
     * @param $age_rest
     * @param $start_date
     * @param $end_date
     */
    public function __construct($name, $description, $movie_type, $image_uri, $trailer_uri, $age_rest, $start_date, $end_date){
        $this->name = $name;
        $this->description = $description;
        $this->movie_type = $movie_type;
        $this->image_uri = $image_uri;
        $this->trailer_uri = $trailer_uri;
        $this->age_rest = $age_rest;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * @param mixed $id
     */
    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getMovieType()
    {
        return $this->movie_type;
    }

    /**
     * @return mixed
     */
    public function getImageUri()
    {
        return $this->image_uri;
    }

    /**
     * @return mixed
     */
    public function getTrailerUri()
    {
        return $this->trailer_uri;
    }

    /**
     * @return mixed
     */
    public function getAgeRest()
    {
        return $this->age_rest;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $movie_type
     */
    public function setMovieType($movie_type)
    {
        $this->movie_type = $movie_type;
    }

    /**
     * @param mixed $image_uri
     */
    public function setImageUri($image_uri)
    {
        $this->image_uri = $image_uri;
    }

    /**
     * @param mixed $trailer_uri
     */
    public function setTrailerUri($trailer_uri)
    {
        $this->trailer_uri = $trailer_uri;
    }

    /**
     * @param mixed $age_rest
     */
    public function setAgeRest($age_rest)
    {
        $this->age_rest = $age_rest;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }




}