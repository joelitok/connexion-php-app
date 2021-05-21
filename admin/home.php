<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>



<?php
  $host = 'localhost';
  $dbname = 'registration';
  $username = 'root';
  $password = '';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Users";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>










<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css" />

  <script type="text/javascript"> 
         function refresh(){
             var t = 1000; // rafraîchissement en millisecondes
             setTimeout('showDate()',t)
         }
         
         function showDate() {
             var date = new Date()
             var h = date.getHours();
             var m = date.getMinutes();
             var s = date.getSeconds();
             if( h < 10 ){ h = '0' + h; }
             if( m < 10 ){ m = '0' + m; }
             if( s < 10 ){ s = '0' + s; }
             var time = h + ':' + m + ':' + s
             document.getElementById('horloge').innerHTML = time;
             refresh();
          }
      </script>



  </head>
  <body onload=showDate();>
    <div class="sucess">
    <h1>Bienvenue <?php echo $_SESSION['username']; ?>!  
<span id='horloge' style="background-color:#1C1C1C;color:silver;font-size:40px;"></span></h1>
    <p>C'est votre espace admin.</p>
    <a href="add_user.php">Add user</a> | 
    <a href="#">Update user</a> | 
    <a href="#">Delete user</a> | 
    <a href="../logout.php">Déconnexion</a>


    </ul>
    </div>
  
 



 <div class="card text-center">
  <div class="card-header">
   users system information
  </div>
  <div class="card-body">
    <h5 class="card-title"> GLOGAL INFORMATION </h5>
    <p class="card-text">that is all information on the users inside out site since 2003.</p>
    <a href="#" class="btn btn-primary">List</a>
 
    <table>
   <thead>
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email</th>
     </tr>
   </thead>
   <tbody>
     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
       <td><?php echo htmlspecialchars($row['id']); ?></td>
         <td><?php echo htmlspecialchars($row['username']); ?></td> 
         <td><?php echo htmlspecialchars($row['email']); ?></td> 
     </tr>
     <?php endwhile; ?>
   </tbody>
 </table>


  </div>
  <div class="card-footer text-muted">
   best thing for us
  </div>
</div>






  </body>
</html>