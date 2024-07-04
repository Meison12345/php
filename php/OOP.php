<?php
// class Note{
    // private $title;
    // public $pages = 1;

//     public function currPage($num){
//         if (!is_numeric($num)) return "Ошибка";
//         return "Текущая страница" . $num;
//         // return $this->title;
//     }
//     //setter
//     public function setPages($numeric){
//         $this->pages = $numeric;
//     }
//     //getter
//     public function getPages(){
//         return $this->pages;
//     }
// }

// $note1 = new Note();
// $note1->setPages(20);
// echo $note1->getPages() . "<br>";
// print_r($note1);


// $note1->title = 'test1';
// $note1->pages = 14;

// $note2 = new Note();
// $note2->title = 'test2';
// $note2->pages = 16;

// echo $note1->currPage(20);

// print_r($note1->pages + $note2->pages);




//2
// class Note{
//     protected $title;
//     protected $pages;
    
//     public function __construct($title, $pages)
//     {
//        $this->title = $title;
//        $this->pages = $pages;
//     }

//     public function currPage($num){
//         if (!is_numeric($num)) return "Ошибка";
//         return "Текущая страница" . $num;
//     }
//     //setter
//     public function setPages($numeric){
//         $this->pages = $numeric;
//     }
//     //getter
//     public function getPages(){
//         return $this->pages;
//     }

//     public function setTitle(){
//         var_dump($this->title);
//         mb_strlen($this->title)>10 && mb_strlen($this->title)<100 ? "true" : "false";
//     }
// }

// $note1 = new Note("БОЙ НА ПОЛЯНЕ", 20);
// echo $note1->setTitle();


// class News extends Note{
//     public $date;      

//     function __construct($date) {
//         $this->date = $date;
//         //конструктор базового класса
//         parent::setTitle();
//         // parent::__construct($title,$pages);
//     }
//     public function setTitle(){
//         var_dump($this->title);
//         mb_strlen($this->title)>10 && mb_strlen($this->title)<100 ? parent::setTitle($this->title) : false;
//     }
// }

// $history = new News("История Хрущёва", 20, "99.99.9999");
// var_dump($history->setTitle());
// echo mb_strlen('История Хрущёва')




class Date {
    private $year;
    private $month;
    private $day;

    public function __construct($date = null) {
        if ($date) {
            list($year, $month, $day) = explode('-', $date);
            $this->year = (int)$year;
            $this->month = (int)$month;
            $this->day = (int)$day;
        } else {
            $this->year = date('Y');
            $this->month = date('m');
            $this->day = date('d');
        }
    }

    public function getDay() {
        return $this->day;
    }

    public function getMonth($lang = null) {
    if($lang == "ru"){
        return ['январь', 'февраль', 'март', 'апрель', 'май', 'июнь', 'июль', 'август', 'сентябрь', 'октябрь', 'ноябрь', 'декабрь'][$this->month-1];
    }elseif($lang == 'en'){
        return ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"][$this->month-1];
    }else{
        return $this->month;
    }
    }

    public function getYear() {
        return $this->year;
    }

    public function getWeekDay($lang = null) {
        if ($lang === 'ru') {
            return ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'][date('w')];
        } elseif ($lang === 'en') {
            return ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][date('w')];
        } else {
            return (string)date('l');
        }
    }

    public function addDay($value) {
       return $this->day + $value;
    }

    public function subDay($value) {
        return $this->day - $value;
    }

    public function addMonth($value) {
        $this->month += (int)$value;
        if ($this->month > 12) {
            $this->addYear((int)floor(($this->month - 1) / 12));
            $this->month %= 12;
        } elseif ($this->month < 1) {
            $this->subMonth((int)(-($this->month + 12)));
        }
    }

    public function subMonth($value) {

        return $this->month;


        $this->month -= (int)$value;
        if ($this->month < 1) {
            $this->subYear((int)floor(($this->month + 12) / 12));
            $this->month += 12;
        } elseif ($this->month > 12) {
            $this->addMonth((int)(-$value));
        }
    }

    public function addYear($value) {
        return $this->year + $value;
    }

    public function subYear($value) {
        return $this->year - $value;
    }

    // public function format($format) {
        // return date("U", $format);
        // return $this->month . "-" . $this->year . "-" . $this->day;
    // }

    public function __toString() {
        return $this->month . "-" . $this->year . "-" . $this->day;
    }
}

    $date = new Date("2025-12-31");
	
    echo $date->getDay() . "<br>";
	echo $date->getYear() . "<br>";  // выведет '2025'
	echo $date->getMonth() . "<br>"; // выведет '12'
	echo $date->getMonth("ru") . "<br>"; // выведет 'декабрь'
	echo $date->getMonth("en") . "<br>"; // выведет 'December'
    echo $date->addDay(20) . "<br>"; //51
    echo $date->subDay(20) . "<br>"; //11
    echo $date->addYear(5) . "<br>"; //2030
    echo $date->subYear(5) . "<br>"; //2020
    echo $date->__toString() . "<br>"; 
    // echo $date->format("22.04.2001") . "<br>"; 
    echo $date->subMonth() . "<br>";
	
	echo $date->getWeekDay();     // выведет '3'
	echo $date->getWeekDay("ru"); // выведет 'среда'
	echo $date->getWeekDay("en"); // выведет 'wednesday'



?>

