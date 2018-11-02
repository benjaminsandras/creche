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
        ENFANT
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
    <form action="index.php" method="get">
                <button class="btn btn-info" name="child" type="submit">enfants</button>
            </form>
    </div>

    <div class="col-sm-8">

  <?php 

try{
    $bdd = new PDO('mysql:host=localhost;dbname=creche;charset=utf8', 'benji', 'aqwsedcft7777');
}

catch (Exception $e){
    die('Erreur : ' . $e->getMessage());
}
  
if (isset($_GET['see'])) {
    
    $id = $_GET['input'];
    $id = intval($id);
    $reponse = $bdd->query('SELECT * FROM children WHERE children_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <div class="card-header">
                '.$donnees['children_firstname']. ' ' .$donnees['children_lastname'].'
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">'.$donnees['children_birthday'].'</li>
                    <li class="list-group-item">'.$donnees['children_adress'].'</li>
                    <li class="list-group-item">'.$donnees['children_parents_contact'].'</li>
                    <li class="list-group-item">'.$donnees['children_remarks'].'</li>
                </ul>
            </div>';
 
    };

};
  
  
  
  ?>



</div>

<div class="col-sm-2"></div>

</div>









    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>