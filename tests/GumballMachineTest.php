<?php

require 'GumballMachine.php';

class GumballMachineTest extends PHPUnit_Framework_TestCase
{
    public $gumballMachineInstance;
    //prof
    private $nom1="XXX1";
    private $prenom1="YYY1";
    private $date_naissance1="1980-09-29";
    private $lieu_naissance1="ZZZ1";
    
    private $nom2="XXX2";
    private $prenom2="YYY2";
    private $date_naissance2="1981-10-30";
    private $lieu_naissance2="ZZZ2";
    
    private $nom3="XXX3";
    private $prenom3="YYY3";
    private $date_naissance3="1982-12-31";
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
    
    //----------------------------Insert-------------------------------
    public function testAffichageProfAVI()
    {
        $this->gumballMachineInstance->DropDatas();
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Insertion of Professors"));
    }
    public function testInsertP()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom1,$this->prenom1,$this->date_naissance1,$this->lieu_naissance1));
        
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom2,$this->prenom2,$this->date_naissance2,$this->lieu_naissance2));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
        
        $max__id1=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals(true,$this->gumballMachineInstance->InsertP($this->gumballMachineInstance->getDB(),$this->nom3,$this->prenom3,$this->date_naissance3,$this->lieu_naissance3));
        $max__id2=$this->gumballMachineInstance->GetLastIDP();
        $this->assertEquals($max__id1+1,$max__id2);
        
    }
    public function testAffichageProfAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Insertion of Professors"));
    }
     
    
    public function testAffichageCoursAVI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Insertion of Courses"));
    }
    public function testInsertC()
    {
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule1, $this->duree1, $this->gumballMachineInstance->getIdP($this->nom2,$this->prenom2)));
        
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule2, $this->duree2, $this->gumballMachineInstance->getIdP($this->nom1,$this->prenom1)));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+1,$max__id2);
        
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule3, $this->duree3, $this->gumballMachineInstance->getIdP($this->nom3,$this->prenom3)));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+1,$max__id2);
        
        $max__id1=$this->gumballMachineInstance->GetLastIDC();
        $this->assertContains("good job",$this->gumballMachineInstance->InsertC($this->intitule4, $this->duree4, $this->gumballMachineInstance->getIdP($this->nom3,$this->prenom3)));
        $max__id2=$this->gumballMachineInstance->GetLastIDC();
        $this->assertEquals($max__id1+1,$max__id2);
        
        
    }
    public function testAffichageCoursAPI()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Insertion of Courses"));
    }
    
    //--------------------------------Update-----------------------------------
    public function testAffichageProfAVU()
    {
         $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Update of Professors"));
    }
    
    public function testUpdateP()
    {
        $idToUpdate = $this->gumballMachineInstance->getIdP("XXX1", "YYY1");
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateP($idToUpdate, "AAA1", "BBB1", "2018-04-23", "CCC1"));
        $datasP = $this->gumballMachineInstance->GetDatasP($idToUpdate);
        $this->assertEquals("AAA1",$datasP[0]);
        $this->assertEquals("BBB1",$datasP[1]);
        $this->assertEquals("2018-04-23",$datasP[2]);
        $this->assertEquals("CCC1",$datasP[3]);
        
    }
    
    public function testAffichageProfAPU()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Update of Professors"));
    }
    
    public function testAffichageCoursAVU()
    {
         $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Update of Courses"));
    }
    
    public function testUpdateC()
    {
        $idToUpdate = $this->gumballMachineInstance->getIdC("EDL", "30");
        $this->assertEquals(true,$this->gumballMachineInstance->UpdateC($idToUpdate, "MECAFLOTTE", "150", $this->gumballMachineInstance->getIdP($this->nom1,$this->prenom1)));
        $datasC = $this->gumballMachineInstance->GetDatasC($idToUpdate);
        $this->assertEquals("MECAFLOTTE",$datasC[0]);
        $this->assertEquals("150",$datasC[1]);
        $this->assertEquals($this->gumballMachineInstance->getIdP($this->nom1,$this->prenom1),$datasC[2]);
        
    }
    
    public function testAffichageCoursAPU()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Update of Courses"));
    }
    
    //--------------------Delete---------------------------------
    public function testAffichageProfAVD()
    {
         $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("Before Delete of Professors"));
    }
    
    public function testDeleteP()
    {
        $total1 = $this->gumballMachineInstance->countTable("prof");
        $idToDelete = $this->gumballMachineInstance->getIdP("AAA1", "BBB1");
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteP($idToDelete));
        $total2 = $this->gumballMachineInstance->countTable("prof");
        $this->assertEquals($total1, $total2-1);
    }
    
    public function testAffichageProfAPD()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageProf("After Delete of Professors"));
    }
    
    public function testAffichageCoursAVD()
    {
         $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("Before Delete of Courses"));
    }
    
    public function testDeleteC()
    {
        $total1 = $this->gumballMachineInstance->countTable("cours");
        $idToDelete = $this->gumballMachineInstance->getIdC("IA", "12");
        $this->assertEquals(true,$this->gumballMachineInstance->DeleteC($idToDelete));
        $total2 = $this->gumballMachineInstance->countTable("cours");
        $this->assertEquals($total1, $total2-1);
    }
    
    public function testAffichageCoursAPD()
    {
        $this->assertEquals(true,$this->gumballMachineInstance->AffichageCours("After Delete of Courses"));
    }
    
    

   
}
