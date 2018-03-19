<?php

$conn =mysqli_connect('localhost','root', 'labas', 'mydb1');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['username']) || empty($_POST['password'])|| empty($_POST['phone']) || empty($_POST['miestas']) ||empty($_POST['email'])) {
        $error = "try again";
        if (strlen($_POST['username']) >= 1)
            $error = "too short";
    } else {
        $success = "valio";
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO penktadienis(username,password,phone,miestas,email)
            VALUES ('" . $_POST["username"] . "','" . $_POST["password"] . "','" . $_POST["phone"] . "','" . $_POST["miestas"] ."','" . $_POST["email"]. "')";
            $result = mysqli_query($conn, $sql);
//            var_dump($conn);
        }
    }
}
?>
<html>
<head>
    <title>Form</title>
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
          crossorigin="anonymous">
</head>
<body>
<div class="container">
    <H1> form</H1>
    <div class="row">
        <div class="col-4">
            <?php
            if(isset($error)){
                echo '<div class="alert alert-danger">' .$error.'</div>';
                }
                elseif(isset($success)){
                echo '<div class="alert alert-success">' .$success.'</div>';
            }?>
            <form method="POST" action="penktadienis.php">
                <div class="form-group">
                    <label for="name">username</label>
                    <input name="username" type="text" class="form-control"> </div>
                <div class="form-group"> <label for="email">password</label>
                    <input name="password" type="text" class="form-control" id="email"> </div>
                <div class="form-group"> <label for="phone">phone</label>
                    <input name="phone" type="tel" class="form-control" id="phone">
                    <div class="form-group"> <label for="phone">miestas</label>
                        <input name="miestas" type="text" class="form-control" id="">
                        <div class="form-group"> <label for="phone">email</label>
                            <input name="email" type="email" class="form-control" id="">
                    <button name="submit" type="submit" class="btn btn-primary">submit</button> </form> </div>



