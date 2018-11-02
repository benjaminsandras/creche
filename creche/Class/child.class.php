<?php 


// Nous créons une classe « Child ».
class Child
{
    private $firstname;
    private $lastname;
    private $birthday;
    private $adress;
    private $parents_contact;
    private $remarks;
    

    public function __construct($firstname,$lastname,$birthday,$adress,$parents_contact,$remarks){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->adress = $adress;
        $this->parents_contact = $parents_contact;
        $this->remarks = $remarks;
        
    }

    
    public function add(){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
        }
        catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

		$bdd->query("INSERT INTO children (children_firstname, children_lastname, children_birthday, children_adress, children_parents_contact, children_remarks)
			VALUES ('" . $this->firstname . "', '" . $this->lastname . "', '" . $this->birthday . "', '" . $this->adress . "', '" . $this->parents_contact . "', '" . $this->remarks . "')");

    }

    public function delete($id){

        try{
            $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
        }
        catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
        }
        
        $bdd->query("DELETE FROM children WHERE children_id = ".$id);
    }
    


}
    









?>


