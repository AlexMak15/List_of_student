<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form registration</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="wrapper">
    <!--  Form add users to bd  -->
 <?php
 function show_form($errors = null){

     print<<<HTML
    <div class="block-form-regist">
        <h3 class="block-form-regist_title">Реєстрація</h3>
        <form id="form-registration" method="post" action="#">
            <div class="wrapper-block-input">
                <div class="block-input">
                    <input type="text" name="name" placeholder="Ваше імя" autofocus >
                    <input type="text" name="last-name" placeholder="Ваше прізвище" >
                    <input type="email" name="email" placeholder="Ваш e-mail" >
                    <div class="block-select">
                        <h3 class="block-select_title">Виберіть вашу стать!</h3>
                        <select name="gender" >
                            <option value="female">Жіноча</option>
                            <option value="male">Чоловіча</option>
                        </select>
                    </div>
                </div>
                <div class="block-input">
                    <input type="number" name="group-number" min="1" placeholder="Номмер вашої групи">
                    <input type="number" name="points" min="1" placeholder="Ваші бали">
                    <input type="text" name="year-of-birth" placeholder="Рік вашого народження">
                    <div class="block-select">
                        <h3 class="block-select_title">Ви місцевий (місцева)? </h3>
                        <select name="select-status">
                            <option value="resident">Місцевий</option>
                            <option value="nonresident">Іногородній</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" name="send_add" value="Надіслати">
        </form>
    </div>
    HTML;

     if ($errors) {
         print '<i class="error-style">Please correct these errors:</i> <ul class="error-style"><li>';
         print implode ('</li><li>', $errors);
         print ' </li></ul>';
     }
 }

 function process_form(){
     print('Good');
 }

 function validate_form() {
     $required_fields = [
         'name', 'last-name', 'email',
         'gender', 'group-number', 'points',
         'year-of-birth', 'select-status'
     ];
     $errors = [];

     foreach ($required_fields as $field => $value) {
         if ($field == "email") {
            if (!filter_var(trim($value), FILTER_VALIDATE_EMAIL)) {
                $errors[$field] = 'Email must be valid';
            }
         }elseif($field == "name") {
            if($value != "Alex") {
                $errors[$field] = "Ви ввели не то імя!";
            }
         }

     }
     return $errors;
 }

 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     if ($form_errors = validate_form()) {
        show_form($form_errors);
     }else{
         process_form();
     }

 }else{
     show_form();
 }


 ?>

    <!-- Form add users to bd END   -->
</div>

</body>
</html>
