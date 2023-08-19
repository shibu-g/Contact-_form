<?php
 if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['number'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];

    if($name=="" || $phone==""||$email==""||$subject==""||$message==""){
        echo "<script> alert('Please Fill All The Field.'); </script>";

    }else{
        $conn=mysqli_connect("localhost:3307","root","","contact_form_data");
        if($conn){
            $userip=$_SERVER['REMOTE_ADDR'];
            $cheak = "SELECT * FROM contact_form where userip='{$userip}';";
            // echo $cheak;
            $result1 = mysqli_query($conn,$cheak);
            if(mysqli_num_rows($result1)>0){
                echo "<script> alert ('Responce already registered')</script>";

            }
              else{ 
              
               $query="INSERT INTO contact_form (name,phone,email,subject,message,userip) VALUES('{$name}',{$phone},'{$email}','{$subject}','{$message}','{$userip}');";
            //   echo $query;
                 $result = mysqli_query($conn,$query);
                echo "<script> alert ('Form Submitted SuccessFully')</script>";
              }
        }else{
            echo "database connection error";
    
        }
    }
    // $msg="Hi New form was submitted \n Name :- ".$name."\n Phone :- ".$phone."\n Email Address :- ".$email."\n Subject :- ".$subject ."\n Message :- ".$message;
    
    // mail("shibugoper1@gmail.com","New Form Submitted ",$msg);
    
    // echo $name.$phone.$email.$subject.$message;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
<div class="form">
    <form action="" method="post">
        <div class="item">
            <label for="">Full Name</label>
            <input type="text" name="name" require>
        </div>
        <div class="item">
            <label for="">Phone Number</label> 
            <input type="number" name="number" require>
        </div>
        <div class="item">
            <label for="">Email</label>
            <input type="email" name="email" require>
        </div>
        <div class="item">
            <label for="">Subject</label>
            <input type="text" name="subject" require>
        </div>
        <div class="item">
            <label for="">Message</label>
            <input type="text" name="message" require>
        </div>
        <div class="btns">
            <button type="submit" name="submit">Submit</button>
            <button type="reset">Clear</button>
        </div>
        
    </form>
    
</div>

    </div>
</body>
</html>