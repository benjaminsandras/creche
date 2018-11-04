<?php ini_set('display_errors', 1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>childrens</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
             LISTE DES ENFANTS
            </div>
            <div class="col-sm-4"></div>
    </div>
    

    <div class="row">
        <div class="col-sm-2">
            <form action="activity.php" method="get">
                <button class="btn btn-info" name="see" type="submit">activitées</button>
            </form>
        </div>
        
        <div class="col-sm-8">

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">prénom</th>
      <th scope="col">nom</th>
      <th scope="col"></th>
      <th scope="col">supprimer</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

<?php  
    require_once '../Class/child.class.php';
    
        try{
            $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
		}

		catch (Exception $e){
            die('Erreur : ' . $e->getMessage());
        }
        

        if (isset($_GET['delete'])) {
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
            }
            catch (Exception $e){
                die('Erreur : ' . $e->getMessage());
            }
    
            $id = $_GET['input2'];
            $id = intval($id);
            $bdd->query("DELETE FROM children WHERE children_id = ".$id);

            $reponse = $bdd->query('SELECT *FROM children');
        	
            $cmpt = 0;
        while($donnees=$reponse->fetch()) {
            $cmpt++;
            echo 
                '<tr>
                    <th scope="row">'.$cmpt.'</th>
                    <form action="dispChild.php" method="get">
                        <td>
                            <button class="btn btn-light " name="see" type="submit" >'.$donnees['children_firstname'].'</button>
                            
                        </td> 
                        <td>'.$donnees['children_lastname'].'
                        </td>
                        <td>
                            <input class="invisible" name="input" value=' . $donnees['children_id'] . '>
                        </td>
                        </form> 
                        <form method="get">
                        <td>
                            <button class="btn btn-danger" name="delete" type="submit">X</button>
                        </td>
                        <td>
                            <input class="invisible" name="input2" value=' . $donnees['children_id'] . '>
                        </td>
                        </form>
                    
                </tr>';
        };
        }else{
        
        $reponse = $bdd->query('SELECT *FROM children');
        	
            $cmpt = 0;
        while($donnees=$reponse->fetch()) {
            $cmpt++;
            echo 
                '<tr>
                    <th scope="row">'.$cmpt.'</th>
                    <form action="dispChild.php" method="get">
                        <td>
                            <button class="btn btn-light " name="see" type="submit" >'.$donnees['children_firstname'].'</button>
                            
                        </td> 
                        <td>'.$donnees['children_lastname'].'
                        </td>
                        <td>
                            <input class="invisible" name="input" value=' . $donnees['children_id'] . '>
                        </td>
                        </form> 
                        <form method="get">
                        <td>
                            <button class="btn btn-danger" name="delete" type="submit">X</button>
                        </td>
                        <td>
                            <input class="invisible" name="input2" value=' . $donnees['children_id'] . '>
                        </td>
                        </form>
                    
                </tr>';
        };

    }

    
 ?>
    </tbody>
</table>




</div>


    <div class="col-sm-2">

     <form action="addChild.php" method="get">
                <button class="btn btn-info" name="see" type="submit">ajouter un enfant</button>
            </form>
    </div>
</div>




</div>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>