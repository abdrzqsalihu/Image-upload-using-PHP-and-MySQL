<?php 

  include 'connect.php';
  $sql='SELECT * FROM images';
  $query = mysqli_query($conn, $sql);
  $products = mysqli_fetch_all($query, MYSQLI_ASSOC);
  mysqli_free_result($query);
  mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Image Upload Using PHP and MySQL</title>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
    body{
      font-family: 'Montserrat', sans-serif;
    }
</style>

</head>
<body> 

<nav style="background:#454CAD; position:fixed; z-index:9">
  <div class="container">
  <div class="row">
      <div class="col l4 m5 s6">
          <h5 style="font-weight:bold; font-family:monospace">Uploaded File</h5>
      </div>
      
      <div class="col l3 m4 s4 push-l6 push-s2 push-m4">
         <a href="upload.php"> <button class="btn white" style="color:#5F6982; border-radius:10px; font-weight:600">Upload File</button>  </a>
      </div>
    </div>
  </div>
</nav>


<div class="container"><br><br><br><br><br>

    <div class="row">
      <?php foreach ($products as $product){?>
            <div class="col l4 m4 s12">
              <div class="card hoverable">
                <div class="card-image">
                  <img class="responsive-img materialboxed" src="images/<?php echo $product['img'] ?>" alt="img-upload" />
                </div>
              </div>
            </div>
              
      <?php }?>
    </div>
 
</div>



  <!-- Compiled and minified Materialize JavaScript & JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script>
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
  </script>
</body>
</html>