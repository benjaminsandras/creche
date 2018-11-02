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
        AJOUTER UN ENFANT
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <form action="index.php" method="get">
                <button class="btn btn-info" name="see" type="submit">acceuil</button>
            </form>
        </div>
        
        <div class="col-sm-8">
        <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Prenom</label>
    <input type="text" name="firstname" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Entrer prénom">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nom</label>
    <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Entrer nom">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date de naissance</label>
    <input type="date" name="birthday" class="form-control" id="birthday" placeholder="jj/mm/aaaa">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adresse</label>
    <input type="text" name="adress" class="form-control" id="adress" placeholder="Entrer adresse">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Contact Parents</label>
    <input type="text" name="parents_contact" class="form-control" id="parents_contact" placeholder="Entrer n° de téléphone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Remarques</label>
    <textarea type="text" name="remarks" class="form-control" id="remarks" placeholder="">
    </textarea>
  </div>
  
  <button type="submit" name="addChild" class="btn btn-primary">Ajouter</button>
</form>

<?php 
    require("../Class/child.class.php");

if(isset($_POST['addChild'])){

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];
    $adress = $_POST['adress'];
    $parents_contact = $_POST['parents_contact'];
    $remarks = $_POST['remarks'];

    var_dump($firstname);
    var_dump($lastname);
    var_dump($birthday);
    var_dump($adress);
    var_dump($parents_contact);
    var_dump($remarks);

    $child = new child($firstname,  $lastname, $birthday, $adress, $parents_contact, $remarks);
    $child->add();
    header("location: addChild.php");
}

?>

</div>

    <div class="col-sm-2">

     <form action="admin.php" method="get">
                <button class="btn btn-info" name="see" type="submit">gérer</button>
            </form>
    </div>
</div>






    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>