<?php


namespace model;


class Movie{
    private $movie_id;
    private $name;
    private $description;
    private $movie_type;
    private $image_uri;
    private $trailer_uri;
    private $age_rest;
    private $price;

    /**
     * Movie constructor.
     * @param $movie_id
     * @param $name
     * @param $description
     * @param $movie_type
     * @param $image_uri
     * @param $trailer_uri
     * @param $age_rest
     * @param $price
     */
    public function __construct($movie_id, $name, $description, $movie_type, $image_uri, $trailer_uri, $age_rest, $price)
    {
        $this->movie_id = $movie_id;
        $this->name = $name;
        $this->description = $description;
        $this->movie_type = $movie_type;
        $this->image_uri = $image_uri;
        $this->trailer_uri = $trailer_uri;
        $this->age_rest = $age_rest;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getMovieId()
    {
        return $this->movie_id;
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
    public function getPrice()
    {
        return $this->price;
    }




}