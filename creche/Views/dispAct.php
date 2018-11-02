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
        ACTIVITE
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>

<div class="row">
    <div class="col-sm-2">
    <form action="activity.php" method="get">
                <button class="btn btn-info" name="activity" type="submit">activitées</button>
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
  
if (isset($_GET['seeact'])) {
    
    $id = $_GET['inputact'];
    $id = intval($id);
    $reponse = $bdd->query('SELECT * FROM activity WHERE activity_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <div class="card-header">
                '.$donnees['activity_name'].'
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">'.$donnees['activity_type'].'</li>
                    <li class="list-group-item">'.$donnees['activity_number_max_child'].'</li>
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