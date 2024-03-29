<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link href="css/style.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
   <title>MY TO DO LIST</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 
</head>


<body class="img" background="img/bg2.jpg">

   <!-- NavBar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">MY TO DO LIST <i class="fas fa-clipboard-list"></i></a> 
  </nav>


<!-- MAIN CONTENT -->
<div id="" class="text-center mt-5 container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <!-- FORM-->
    <form class="form" method="post" action="todo.php">
        <div class="input-group mt-5 mb-3">
        <!-- INPUT -->
        <input type="text" class="form-control" name="todo_input" placeholder="Item Name :" aria-label="Todo Item" aria-describedby="button-addon2">
            <div class="input-group-append">
            <!-- ADD BUTTON -->
            <button class="btn btn-primary" name="submit" type="submit" id="button-addon2">Add Task</button>
        </div>
        </div>
    </form>
  
    <!-- END OF FORM -->

    <!-- PHP  -->
    <!-- Session Start -->
    <?php
        session_start();
        // Getting Data For Actions In ToDo
        if(isset($_GET['to'])){
        $key = $_GET['to'];
        if($_GET['action'] == 'done'){
        $_SESSION['todo'][$key]['done']=true;
        }else if($_GET['action'] == 'cancel'){
        $_SESSION['todo'][$key]['done']=false;
        }else{
        unset( $_SESSION['todo'][$key]);
        }
        }
    ?>


    <?php
        // Session Super Global
        if(!empty($_SESSION['todo'])){
        // Current Date Initialization
        $date = date('Y-m-d');
        // ForEach For Loop Starts
        foreach($_SESSION['todo'] as $key => $value){
        // Displaying All The Items In A Div And In A Bootstrap Alert Box
        echo '<div class="alert alert-light border shadow-sm pb-4">';
        echo "<li>".$value['todo_item']." ".$date.
        '<a class="btn btn-danger float-right" href="index.php?to='. $key.'&action=delete"><i class="fas fa-times"></i></a>'."</li><br>";
        echo '</div>';
        }
        }
    ?>
    </div>
    <div class="col-sm-2"></div>
    </div>
    </div>





   <!-- SCRIPTS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/ac87d8aca0.js"></script>

   <!-- Main JS -->
   <script src="js/main.js"></script>

</body>
</html>

