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
        AJOUTER UNE ACTIVITE
        </div>
        <div class="col-sm-4"></div>
    </div>
    </div>

    <div class="row">
        <div class="col-sm-2">
            <form action="activity.php" method="get">
                <button class="btn btn-info" name="see" type="submit">activitées</button>
            </form>
        </div>
        
        <div class="col-sm-8">
        <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Nom</label>
    <input type="text" name="name" class="form-control" id="firstname" aria-describedby="emailHelp" placeholder="Entrer nom">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Type</label>
    <input type="text" name="type" class="form-control" id="lastname" placeholder="Entrer type">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre d'enfants</label>
    <input type="number" name="number_max_child" class="form-control" id="birthday" placeholder="nombre max d'enfant autorisé">
  </div>
  
  <button type="submit" name="addActivity" class="btn btn-primary">Ajouter</button>
</form>

<?php 
    require("../Class/activity.class.php");

if(isset($_POST['addActivity'])){

    $name = $_POST['name'];
    $type = $_POST['type'];
    $number_max_children = $_POST['number_max_child'];

    $activity = new activity($name, $type, $number_max_children);
    $activity->add();

    header("location: addActivity.php");
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