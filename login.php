<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'rootroot');
define('DB_DATABASE', 'riad');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);  
 session_start();
   
  // if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      if (isset($_POST["login"])) {
          
        $sql = "SELECT * FROM users WHERE email = '".$_POST['username']."' and pass = '".$_POST['password']."'";
      $result = mysqli_query($db,$sql);
    //  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      while($data = mysqli_fetch_array($result))
      {
        $count = mysqli_num_rows($result);
        if($count == 1) {

            $_SESSION['id'] = $data["id"];
            $_SESSION['fullname'] = $data["fullname"];
            $_SESSION['permission'] = $data["permission"];
            if($data["permission"] === "admin"){
              header("location: admin.php");

            }else{
              header("location: welcome.php");

            }
            
         }else {
            $error = "Your Login Name or Password is invalid";
         }
      }
      }
      
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
     
  // }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion Form</title>
    <script
      src="https://kit.fontawesome.com/66aa7c98b3.js"
      crossorigin="anonymous"
    ></script>
    <style>
    *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

.container {
  height: 100vh;
  margin: 0 auto;
  position: relative;
 /* background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);
 */
background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);
}

.container .form-1 {
  display: flex;
  flex-direction: column;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #fff;
  width: 40%;
  border-style: solid;
  border-color: #cb8670;
  background:linear-gradient(to right, #7a7b7b, #7d889a, #7f9ea9, #8694a7);
  border-width: 15px;
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.3);
  transition-duration:300ms;
}

.form-1 h1 {
  text-align: center;
  margin-top: 0.7rem;
  margin-bottom: 1.5rem;
  color:white;
}

input[type="email"],
input[type="password"],input[type="text"] {
  border: none;
  outline: none;
  border-bottom: 1px solid;
  background: none;
  margin: 0.9rem 2rem;
  font-size: 1rem;
}

label {
  margin: 0 2rem;
  color:white;
}

span {
  margin: 0 2rem;
  color: blue;
  cursor: pointer;
}

button {
  margin: 2rem;
  margin-bottom: 1.5rem;
  padding: 0.5rem;
  cursor: pointer;
  border-radius: 1rem;
  border: none;
  font-size: 1.1rem;
  font-weight: bolder;
  color: #fff;
  /*background: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);*/
  background-color:#cb8670;
}

/* ........///Sign-Up///......... */

p {
  text-align: center;
  font-weight: bolder;
}

.icons {
  display: flex;
  justify-content: center;
  margin-bottom: 3rem;
  margin-top: 0.5rem;
}

.icons a {
  text-decoration: none;
  font-size: 1rem;
  margin: 0.2rem;
}

.icons .fa-facebook-f {
  border-radius: 50%;
  background: #5d75ab;
  color: #fff;
  padding: 1rem;
}

.icons .fa-twitter {
  border-radius: 50%;
  background: #1da1f2;
  color: white;
  padding: 1rem;
}

.icons .fa-google {
  border-radius: 50%;
  background: #ee5645;
  color: #fff;
  padding: 1rem;
}

/* ....///Media query///..... */

@media (max-width: 501px) {
  html {
    font-size: 15px;
  }

  .container .form-1 {
    width: 300px;
  }
}

@media (min-width: 501px) and (max-width: 768px) {
  html {
    font-size: 14px;
  }

  .container .form-1 {
    width: 450px;
  }
}

@media (min-width: 765px) and (max-width: 1200px) {
  html {
    font-size: 18px;
  }

  .container .form-1 {
    width: 540px;
    height: 550px;
  }
}

@media (orientation: landscape) and (max-height: 500px) {
  .container {
    height: 100vmax;
  }
}

</style>
  </head>
  <body>
    <div class="container">
      <form class="form-1" method="post" action="#">
        <h1>Se Connecter</h1>
        <label for="email">Email</label>
        <input type="email" name="username" id="email" required />
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" id="password" required />
        <a href="register.php"><span>Créer un Compte</span></a>
        <button name="login">Se connecter</button>


       
      </form>
    </div>
  </body>
</html>
