<?php
  if (isset($_POST['send_add'])){
      header("Location: http://list-of-students/");
      exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List of student</title>
    <link rel="stylesheet" href="main.css">

</head>
<body>

<div class="wrapper">
  <div class="toper">
      <!--Search Form-->
     <form method="get" action="#">
          <div class="block-searcht">
             <input  class ="search" placeholder="Пошук тут..." type="search" name="search">
             <input class = "search-btn" type="submit" name="btn_search" value="Знайти">
          </div>
     </form>
      <!--Search Form END-->
      <a href="form_registration.php" class="registr" >Реєстрація</a>
  </div>
</div>
</html>