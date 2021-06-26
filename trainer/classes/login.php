<?php
require_once("classes/FormAssist.class.php");
require_once("classes/DataAccess.class.php");
require_once("classes/FormValidator.class.php");
require_once("classes/Authentication.class.php");

$fields=array("email"=>"","password"=>"");
$rules= array("email"=>array("required"=>"","minlength"=>3,"maxlength"=>30,"email"=>""),
        "password"=>array("required"=>"")   );
$labels=array("email"=>"Username","password"=>"Password");
$validator=new FormValidator($rules,$labels);
$form=new FormAssist($fields,$_POST);
$dao=new DataAccess();
$auth = new Authentication();
if(isset($_POST["Login"]))
{
  if($validator->validate($_POST))
  {
      if($auth->authenticate($_POST["email"],$_POST["password"]))
      {
        session_start();
        $type = $auth->utype;
        if($type=="admin")
        {
          $_SESSION["admin"]=$_POST["email"];
          header("location:admin/home.php");
         //$msg=$type;
        }
      }
      else
      {
        $msg=$auth->error;
      }

     
  }
  else
  {
        $msg="Failed ,please try again";
        //var_dump($dao->getQuery());

  }
}
else
{
    $error=true;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
  <img class="wave" src="img/wave.png">
  <div class="container">
    <div class="img">
      <img src="img/bg.svg">
    </div>
    <div class="login-content">
      <form method="post" enctype="multipart/form-data">
        <img src="img/avatar.svg">
        <br>
        <font color=#2E8B57><h3>LOGIN</h3></font>
        <br>
              
            <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-at"></i>
                 </div>
                 <div class="div">
                    
                    <?php echo $form->textBox("email",array("placeholder"=>"Email","type"=>"email")); ?>
                    <?php echo $validator->error("email"); ?>

                 </div>
              </div>
              <div class="input-div one">
                 <div class="i">
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    
                    <?php echo $form->passwordBox("password",array("placeholder"=>"Password")); ?>
                    <?php echo $validator->error("password"); ?>

                 </div>
              </div>
              <p><?php echo isset($msg)?$msg:""; ?></p>

              <input type="submit" class="btn" value="Login" name="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
