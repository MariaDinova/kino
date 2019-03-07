<?php
namespace model;

class Period{
    private $period_id;
    private $start_date;
    private $end_date;

    /**
     * Period constructor.
     * @param $period_id
     * @param $start_date
     * @param $end_date
     */
    public function __construct($period_id, $start_date, $end_date){
        $this->period_id = $period_id;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    /**
     * @return int $periodId
     */
    public function getPeriodId(){
        return $this->period_id;
    }

    /**
     * @param int $period_id
     */
    public function setPeriodId($period_id){
        $this->period_id = $period_id;
    }

    /**
     * @return $start_date
     */
    public function getStartDate(){
        return $this->start_date;
    }

    /**
     * @param $start_date
     */
    public function setStartDate($start_date){
        $this->start_date = $start_date;
    }

    /**
     * @return $end_date
     */
    public function getEndDate(){
        return $this->end_date;
    }

    /**
     * @param $end_date
     */
    public function setEndDate($end_date){
        $this->end_date = $end_date;
    }
}



