<?php
/**
 * Class Ticket:
 *  $num : numero de Ticket
 *  dateEntree : date de passage de client : saisie de ticket dans la base des données
 * dateSortie : date de paiment de ticket
 * payee: un bollean qui renseigne si le ticket est payee ou pas
 * cinAgentResponsable : identifiant de l'agent qui a effectuée l'operation de passage 
 */



class Ticket
{   //les attributs de ticket
    private $num;
    private $categorie;
    private $nomStationDepart;
    private $nomLigne;
    private  $nomStationArrivee;
    private  $payee;
    private  $dateEntree;
    private  $dateSortie;
    private $cinAgentResponsable; /*le numero de cin de l'agent qui a realise l'operation*/

    function _construct($num,$categorie,$stationDepart,$line,$cinAgentResponsable)
    {
        $this->num=$num;
        $this->categorie=$categorie;
        $this->nomStationArriveeationpeage=$stationDepart;
        $this->cinAgentResponsable=$cinAgentResponsable;
        $this->nomLigne =$line;
    }
     function  constucteur($num,$categorie,$stationDepart,$line,$stationArrivee,$payee,$dateEntree,$dateSortie,$cinAgentResponsable) {

         $this->num=$num;
         $this->categorie=$categorie;
         $this->nomSationDepart=$stationDepart;
         $this->nomLigne =$line;
         $this->sationArrivee=$stationArrivee;
         $this->dateEntree=$dateEntree;
         $this->dateSortie=$dateSortie;
         $this->payee=$payee;
         $this->cinAgentResponsable=$cinAgentResponsable;


     }


  /*  les getters  */
    function getNum() { return $this->num;}
    function  getNomLigne(){ return $this->nomLigne;}
    function  getCategorie(){return $this->categorie ;}
    function  getNomStationDepart(){return $this->nomStationDepart;}
    function  getStationArrivee(){return $this->stationArrivee;}
    function getPayee() {return $this->payee;}
    function getDateEntree(){ return $this->dateEntree ;}
    function  getDateSortie(){ return $this->dateSortie;}
    function getNumCinAgentResponsabe(){return $this->cinAgentResponsable;}


    /*  les setters */
    public  function setNomLigne($nomLigne){ $this->nomLigne=$nomLigne;}
    public  function setCategorie($categorie){   $this->categorie=$categorie;}
    public  function setPayee($bool){   $this->payee=$bool;}
    public  function setDateEntree($dateEntree){  $this->dateEntrée=$dateEntree;}
    public  function  setNomStationArrivee($stationArrivee){ $this->nomStationArrivee=$stationArrivee;}
    public  function  setDateSortie($dateSortie ) { $this->dateSortie=$dateSortie;}
    public function setCinAgentResponsable($cinAgentResponsable){ $this->cinAgentResponsable=$cinAgentResponsable;}


}
?>