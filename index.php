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
   <!-- Start Bootstrap Columns And Following Naming Convention To Align The Items In The Centre Of The Page -->

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
   
    </form>
  </div>
</nav>



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
                                   <button class="btn btn-primary" name="submit" type="submit" id="button-addon2">
                                       Add Task
                                   </button>
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
                                   echo '<div class="alert alert-light border shadow-sm pb-4 background-color-black">';
                                   echo "<li>".$value['todo_item']." ".$date.
                                   '<a class="btn btn-danger float-right" href="index.php?to='. $key.'&action=delete"><i class="fas fa-times"></i></a>'."</li><br>";
                                   echo '</div>';
                                   // End Of Displaying Items
                               }
                               // End ForEach For Loop
                           }
                       // End Session Super Global
                       ?>
                       </div>
               <div class="col-sm-2"></div>
       </div>
   </div>


<!-- End Bootstrap Columns And Following Naming Convention To Align The Items In The Centre Of The Page -->
   <!-- SCRIPTS -->
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/ac87d8aca0.js"></script>
   <!-- Main JS -->
   <script src="js/main.js"></script>
   <!-- End Of Scripts -->

</body>
</html>

