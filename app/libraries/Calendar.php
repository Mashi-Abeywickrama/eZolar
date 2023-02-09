<?php

class Calendar extends DateTime{
    protected $year;
    protected $month;
    protected $weekDays = [
        'Mon','Tue','Wed','Thu','Fri','Sat','Sun'
    ];
    protected $weeks = [];

    public function getWeekDays(){
        return $this->weekDays;
    }

    public function getYear(){
        return $this->year;
    }

    public function setYear($year){
        $this->year = $year;
    }
    public function getMonth(){
        return $this->month;
    }
    public function setMonth($month){
        $this->month = $month;
    }
    public function getweeks(){
        return $this->weeks;
    }
    public function create(){
        $date = $this->setDate($this->getYear(),$this->getMonth(),1);
        $daysInMonth = $date->format('t');
        $startday = $date->format('N');

        $days = array_fill(0, $startday,'');

        for ($x=1;$x<=$daysInMonth;$x++){
            $days[] = $x;
        }

        $this->weeks = array_chunk($days,7);


    }
}