<?php

/* Задача #1. Есть класс Ticket (Билет). Реализуйте у него магический метод __toString так, 
чтобы при распечатке объекта класса, получалась разметка как указано в комментариях ниже */

class Ticket
{
    protected $idticket;
    public $from;
    public $to;
    public $price;
    public $name;

    public function __construct($from, $to, $price, $name)
    {
        $this->idticket = uniqid();
        $this->from = $from;
        $this->to = $to;
        $this->price = $price;
        $this->name = $name;
    }

    public function __toString()
    {
       return <<<HTML
       <html> 
       <div class="ticket">
       <h2>{$this->from} - {$this->to}</h2>
       <p> Номер билета № {$this->idticket}</p>
       <p>Пассажир: <strong>{$this ->name}</strong>
       <p> Цена: <strong> {$this->price} </strong></p>
       <div> 
       </html>
HTML; 
    } 
   }    
 
$ticket1 = new Ticket('Москва', 'Санкт-Петербург', 5000, 'Юрий');
echo $ticket1; 

/*
<div class="ticket">
<h2>Москва - Санкт-Петербург</h2>
<p>Номер билета № 4b3403665fea6
<p>Пассажир: <strong>Юрий</strong>
<p>Цена: <strong>5000</strong>
</div>
 */
// echo $ticket1, "<hr>";

/* Задача #2. Есть класс Sequence. Если создать экземпляр через new Sequence(10,20,5), то предполагается найти последователность чисел от 10 до 20 за 5 шагов, то есть: 10, 12, 14, 16, 18, 20. 

Реализуйте у него магический метод __invoke так, чтобы при объекта как функции выводилась последовательность чисел */

class Sequence
{
    public array $list = [];
    public function __construct($from, $to, $steps)
    {
        $this->from = $from;
        $this->to = $to;
        $this->steps = $steps;
    }

    public function __invoke ()
    {
      $step = ($this->to - $this->from)/$this->steps;
      $this->list = range($this->from, $this->to, $step);              
      return implode(',', $this->list);
    }
}

$sequence = new Sequence(10, 20, 5);
echo $sequence(). "<hr>"; 
