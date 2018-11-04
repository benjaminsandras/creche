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

    if (isset($_POST['modify'])) {
    
    
        $id = $_POST['input'];
     
        $birthday = $_POST['birthday'];
        $adress = $_POST['adress'];
        $parents_contact = $_POST['parents_contact'];
        $remarks = $_POST['remarks'];

        $bdd->query("
        UPDATE
        children
        SET
      
        children_birthday = '".$birthday."',
        children_adress = '".$adress."',
        children_parents_contact = '".$parents_contact."',
        children_remarks = '".$remarks."'
        WHERE
        children_id    = ".$id);


    $reponse = $bdd->query('SELECT * FROM children WHERE children_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <form method="post">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6>
                        <textarea name="firstname">'.$donnees['children_firstname'].'</textarea>
                    </div>
                    <div class="col-sm-6>
                        <textarea name="lastname"> ' .$donnees['children_lastname'].'</textarea>
                    </div>
                </div>
            </div>
                <ul class="list-group list-group-flush">
                    
                        <li class="list-group-item"><textarea name="birthday">'.$donnees['children_birthday'].'</textarea></li>
                        <li class="list-group-item"><textarea name="adress">'.$donnees['children_adress'].'</textarea></li>
                        <li class="list-group-item"><textarea name="parents_contact">'.$donnees['children_parents_contact'].'</textarea></li>
                        <li class="list-group-item"><textarea name="remarks">'.$donnees['children_remarks'].'</textarea></li>
                        <input class="invisible" name="input" value=' . $id . '>
                        <button class="btn btn-info" name="modify" type="submit">modifier</button>
                    </form>
                </ul>
            </div>';
 
    };

}else{
    $reponse = $bdd->query('SELECT * FROM children WHERE children_id='.$id) ;
                   
    while($donnees=$reponse->fetch()) {
        echo    
            '<div class="card" style="width: 18rem;">
            <form method="post">
            <div class="card-header">
                <div class="row">
                    <div class="col-sm-6>
                        <textarea name="firstname">'.$donnees['children_firstname'].'</textarea>
                    </div>
                    <div class="col-sm-6>
                        <textarea name="lastname"> ' .$donnees['children_lastname'].'</textarea>
                    </div>
                </div>
            </div>
                <ul class="list-group list-group-flush">
                    
                        <li class="list-group-item"><textarea name="birthday">'.$donnees['children_birthday'].'</textarea></li>
                        <li class="list-group-item"><textarea name="adress">'.$donnees['children_adress'].'</textarea></li>
                        <li class="list-group-item"><textarea name="parents_contact">'.$donnees['children_parents_contact'].'</textarea></li>
                        <li class="list-group-item"><textarea name="remarks">'.$donnees['children_remarks'].'</textarea></li>
                        <input class="invisible" name="input" value=' . $id . '>
                        <button class="btn btn-info" name="modify" type="submit">modifier</button>
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