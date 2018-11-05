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

    if (isset($_POST['modifyact'])) {
    
    
        $id = $_POST['input'];
     
        $type = $_POST['type'];
        $number_max_child = $_POST['number_max_child'];
     

        $bdd->query("
        UPDATE
        activity
        SET
        activity_type = '".$type."',
        activity_number_max_child = '".$number_max_child."'
        WHERE
        activity_id = ".$id);
    $reponse = $bdd->query('SELECT * FROM activity WHERE activity_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <div class="card-header">
                '.$donnees['activity_name'].'
            </div>
                <ul class="list-group list-group-flush">
                    <form method="post">
                    <li class="list-group-item"><textarea name="type">'.$donnees['activity_type'].'</textarea></li>
                    <li class="list-group-item"><textarea name="number_max_child">'.$donnees['activity_number_max_child'].'</textarea></li>
                    <input class="invisible" name="input" value=' . $id . '>
                    <button class="btn btn-info" name="modifyact" type="submit">modifier</button>
                    </form>
                </ul>
            </div>';
 
    };
}else{
    $reponse = $bdd->query('SELECT * FROM activity WHERE activity_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <div class="card-header">
                '.$donnees['activity_name'].'
            </div>
                <ul class="list-group list-group-flush">
                    <form method="post">
                    <li class="list-group-item"><textarea name="type">'.$donnees['activity_type'].'</textarea></li>
                    <li class="list-group-item"><textarea name="number_max_child">'.$donnees['activity_number_max_child'].'</textarea></li>
                    <input class="invisible" name="input" value=' . $id . '>
                    <button class="btn btn-info" name="modifyact" type="submit">modifier</button>
                    </form>
                </ul>
            </div>';
    };

}

};
  
  
  
  ?>

</div>

<div class="col-sm-2"></div>

</div>








    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>