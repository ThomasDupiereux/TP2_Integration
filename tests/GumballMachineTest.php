<?php

require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof
    private $nom1="XXX1";
    private $prenom1="YYY1";
    private $date_naissance1="29-09-1980";
    private $lieu_naissance1="ZZZ1";
    
    private $nom2="XXX2";
    private $prenom2="YYY2";
    private $date_naissance2="30-10-1981";
    private $lieu_naissance2="ZZZ2";
    
    private $nom3="XXX3";
    private $prenom3="YYY3";
    private $date_naissance3="31-12-1982";
    private $lieu_naissance3="ZZZ3";
    // cours
    private $intitule1="IOT";
    private $duree1="10";
    
    private $intitule2="IA";
    private $duree2="12";
    
    private $intitule3="C++";
    private $duree3="18";
    
    private $intitule4="EDL";
    private $duree4="30";
    
        
    public function setUp()
    {
        $this->gumballMachineInstance = new GumballMachine();
    }
    
    public function testAffichageProfAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom1,$this->prenom1,$this->date_naissance1,$this->lieu_naissance1));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
        echo $max_id1;
        echo $max_id2;
        
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom2,$this->prenom2,$this->date_naissance2,$this->lieu_naissance2));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
        echo $max_id1;
        echo $max_id2;
        
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom3,$this->prenom3,$this->date_naissance3,$this->lieu_naissance3));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
        echo $max_id1;
        echo $max_id2;
        
    }
    public function testAffichageProfAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Insertion of Professors"));
    }
     
    
    public function testAffichageCoursAVI()
    {
        /*à completer*/
    }
    public function testInsertC()
    {
       
        /*à completer*/
        
    }
    public function testAffichageCoursAPI()
    {
        /*à completer*/
    }

   
}
