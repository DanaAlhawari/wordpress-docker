<?php
//   4. Skapa en class som heter cart som kan innehålla klassen Product. 
class DanasProduct
{
    public $price;
    public $title;
    public $id;
    public function __construct($price = 0, $title = "Untitled", $id = 0) //våra värden som vi hämtar från custom fields
    {
        $this->price = $price;
        $this->title = $title;
        $this->id = $id;
    }
}
