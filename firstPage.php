<?php
session_start();
  //Login
  include("conn.php");
  $message = "";
    if(isset($_POST["singInBtn"])){
      $uname = $_POST["loginUsernaem"];
      $pass = $_POST["loginPassword"];
        $selectQuery = "SELECT * FROM users WHERE username = '$uname'";
        $result = mysqli_query($con,$selectQuery);
        if(mysqli_num_rows($result) > 0){
            $rows = mysqli_fetch_assoc($result);
             $usersName = $rows['username'];
             $deliveryDistrict = $rows['district'];
             $_SESSION["diliveryDistrict"] = $deliveryDistrict;
             $_SESSION["userName"] = $usersName;
            $verifyPassword = password_verify($pass,$rows['password']);
            if($uname == $usersName && $verifyPassword){ 
                header("Location:index.php");
            }else{
              $message = '<div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
    Invalied user name or password !
  </div>
</div>';
            }

        }else{
          $message = '<div class="alert alert-primary d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>
          <div>
            No record found !
          </div>
        </div>';
        }
    }
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Login & Registration Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/firstPage.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">

  <!-- favicon -->
  <link rel="icon" href="img/userimg/favicon.ico" type="image/x-icon">
</head>
<body>

<?php
//Register

  if(isset($_POST["btnSingUp"])){
    $fullname = $_POST["fullNameSingUp"];
    $userName = $_POST["userNameSingUp"];
    $district = $_POST["district"];
    $password = password_hash($_POST["passwordSingUp"],PASSWORD_DEFAULT);
    $insertQuery = "INSERT INTO users(fullname,username,district,password)VALUES('$fullname','$userName','$district','$password')";
    $checkQuery = "SELECT * FROM users WHERE username = '$userName'";
    $userresult = mysqli_query($con,$checkQuery);
    if(!mysqli_num_rows($userresult) >=1){
      if(mysqli_query($con,$insertQuery)){ ?>
             <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>Swal.fire({icon: "success", title: "success",text: "successfuly Registerd !",});</script>
    <?php  }else{
          die("There is somme error detected !");
      }
    } else{ ?>
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           <script>Swal.fire({icon: "error", title: "Oops...",text: "UserName is already exist !",});</script>
 <?php   }
    
  }
?>



  <div class="cont">
    <div class="form sign-in">
      <form  method="post">
        <h2>Sign In</h2>
      <label>
        <span>User Name</span>
        <input type="text" name="loginUsernaem" required>
      </label>
      <label>
        <span>Password</span>
        <input type="password" name="loginPassword" required>
      </label>
      <button class="submit" type="submit" name="singInBtn">Sign In</button>
     
      </form>

      <div class="social-media">

       <p><?=$message ?></p>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h1>New here to</h1>
          <h2>The Market Basket</h2>
          <p>sign up and discover</p>
        </div>
        <div class="img-text m-in">
          <h1>One of us to</h1>
          <h2>The Market Basket</h2>
          <p>just sign in</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
      <form method="post">
        <h2>Sign Up</h2>
        <label>
          <span>Full name</span>
          <input type="text" name="fullNameSingUp" required>
        </label>
        <label>
          <span>UserName</span>
          <input type="text" name="userNameSingUp" required>
        </label>
        <label>
          <span>Select District</span>
          <select class="selct" name="district" required>
            <option value="Colombo">Colombo</option>
            <option value="Anuradhapura">Anuradhapura</option>
            <option value="Badulla">Badulla</option>
            <option value="Galle">Galle</option>
            <option value="Gampaha">Gampaha</option>
            <option value="Hambanthota">Hambanthota</option>
            <option value="Kaluthara">Kaluthara</option>
            <option value="Kandy">Kandy</option>
            <option value="Kegalle">Kegalle</option>
            <option value="Matale">Matale</option>

          </select>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="passwordSingUp" required>
        </label>
        <button type="submit" class="submit" name="btnSingUp">Sign Up Now</button>
      </div>
      </form>
    </div>
  </div>
<script type="text/javascript" src="js/firstPage.js"></script>
</body>
</html>