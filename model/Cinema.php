<?php


namespace model;


class Cinema {

    private $cinema_id;
    private $name;
    private $thumb;
    private $img;
    private $location;
    /**
     * Cinema constructor.
     * @param $cinema_id
     * @param $name
     * @param $location
     * @param $thumb
     * @param $img
     */
    public function __construct($cinema_id, $name, $thumb, $img, $location)
    {
        $this->cinema_id = $cinema_id;
        $this->name = $name;
        $this->location = $location;
        $this->thumb = $thumb;
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getCinemaId()
    {
        return $this->cinema_id;
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
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return mixed
     */
    public function getThumb()
    {
        return $this->thumb;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }


}

