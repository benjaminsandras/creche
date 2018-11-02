<?php 


// Nous créons une classe « Child ».
class Activity
{
    private $name;
    private $type;
    private $number_max_child;
    
    public function __construct($name,$type,$number_max_child){
        $this->name = $name;
        $this->type = $type;
        $this->number_max_child = $number_max_child;
        
    }

    
    public function add(){


		try{
            $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
        }
        catch (Exception $e){
			die('Erreur : ' . $e->getMessage());
		}

		$bdd->query("INSERT INTO activity (activity_name, activity_type, activity_number_max_child)
			VALUES ('" . $this->name . "', '" . $this->type . "', '" . $this->number_max_child ."')");

    }
    


}
    









?>