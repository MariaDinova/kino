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
    private $duration;
    private $slot;

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
     * @param $duration
     * @param $slot
     */
    public function __construct($movie_id, $name, $description, $movie_type, $image_uri, $trailer_uri, $age_rest, $price, $duration, $slot){
        $this->movie_id = $movie_id;
        $this->name = $name;
        $this->description = $description;
        $this->movie_type = $movie_type;
        $this->image_uri = $image_uri;
        $this->trailer_uri = $trailer_uri;
        $this->age_rest = $age_rest;
        $this->price = $price;
        $this->duration = $duration;
        $this->slot = $slot;
    }

    /**
     * @return int $movieId
     */
    public function getMovieId(){
        return $this->movie_id;
    }

    /**
     * @return string $movieName
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return string $description
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @return string $movieType
     */
    public function getMovieType(){
        return $this->movie_type;
    }

    /**
     * @return $imageUri
     */
    public function getImageUri(){
        return $this->image_uri;
    }

    /**
     * @return $trailerUri
     */
    public function getTrailerUri(){
        return $this->trailer_uri;
    }

    /**
     * @return $ageRestriction
     */
    public function getAgeRest(){
        return $this->age_rest;
    }

    /**
     * @return $price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return int $duration
     */
    public function getDuration(){
        return $this->duration;
    }

    /**
     * @return int $slot
     */
    public function getSlot(){
        return $this->slot;
    }
}



