<?php

class Calendar extends DateTime{
    protected $year;
    protected $month;
    protected $monthName;
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
    public function getMonthName(){
        return $this->monthName;
    }
    public function getNextMonth(){
        $nextMonth = [$this->getMonth()+1,$this->getYear()];
        if ($nextMonth[0]>12){
            $nextMonth = [1,$nextMonth[1]+1];
        }
        return $nextMonth;

    }
    public function getPrevMonth(){
        $prevMonth = [$this->getMonth()-1,$this->getYear()];
        if ($prevMonth < 1){
            $prevMonth = [1,$prevMonth[1]-1];
        }
        return $prevMonth;

    }
    public function create(){
        $date = $this->setDate($this->getYear(),$this->getMonth(),1);
        $daysInMonth = $date->format('t');
        $startday = $date->format('N')-1;
        $this->monthName = $date->format('F');
        

        $days = array_fill(0, $startday,'');

        for ($x=1;$x<=$daysInMonth;$x++){
            $days[] = $x;
        }

        $this->weeks = array_chunk($days,7);
        $this->weeks[count($this->weeks)-1] = array_pad($this->weeks[count($this->weeks)-1],7,'');


    }
}