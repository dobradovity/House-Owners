<!DOCTYPE html>
<html>
<head>
  <title>Rents</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style type="text/css">

  .btn{
    color: black;
  }
  body{
              
background-image: url('images/image1.jpg');
              background-repeat: no-repeat;
              background-position: center;
              background-attachment: fixed; 
              }
    
  </style>
</head>
<body>

  <section style="color:black;font-weight:  bold;" >
  <div class="container">
  <div class="row">
  <div class="col-sm-12">
     <?php 

  require_once 'db_connect.php';


            $sql = "SELECT * FROM renters";

            $result = $conn->query($sql);

 
            echo "<div class='row'>";    
            if($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {

                    echo "
                        <div class='col-sm-6'>
                          <div class='thumbnail' style='background-color:lightgray;'>
                            <p class='text-center'>".$row['id']."</p>
                              
                              
                                <p class='text-center'>".$row['name']."</p>
                                <p class='text-center'>".$row['lastname']."</p>
                                
                                <p class='text-center'>".$row['birthdate']."</p>
                                <p class='text-center'>".$row['phone']."</p><br>
                               <p class='text-center' >".$row['address']."</p><br>
                                <hr>
                              </div>
                          </div>
                        
";

                }

            }
            echo "</div>";

            ?>
          </div>

  </div>
  
</div>
</div>
</section>
<div class="conteiner">
  <a href="home.php" class="btn btn-primary" type="button">Back</a>
</div>

</body>
</html>