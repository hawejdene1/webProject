<?php
class Station
{
    private $name;
    private $linename;
    private $dist;
    private $price;


     function __construct($name,$linename,$dist,$price){
        
        $this->name=$name;
        $this->linename=$linename;
        $this->dist=$dist;
        $this->price=$price;
    }

    

    public function equals(Station $s){
        return (bool) ($this->name==$s->getName() && ($this->linename==$s->getLineName()));
    }
    
    public function dist(Station $S){
        return abs($this->dist - $S->getDist());
    }


    public function toString(){
        $result= $this->name . ":" . (string) $this->linename . ":" . (string) $this->dist. ":" . (string) $this->price[0]. ":" . (string) $this->price[1]. ":" . (string) $this->price[2];

        return $result;
    }

    
    public function getLineName(){return $this->linename;}
    public function getName(){return $this->name;}
    public function getDist(){return $this->dist;}
    public function getPrice(){return $this->price;}

    //never these use setters
    public function setLinename($linename){ $this->linename=$linename;}
    public function setName($name){   $this->name=$name;}
    public function setDist($dist){   $this->dist=$dist;}
    public function setPrice($price){  $this->price=$price;}


    


}
?>