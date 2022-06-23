<?php
$servername = "localhost";
$dbname ="School";
$Username = "root";
$Password = "";
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $Username, $Password);

if(isset($_POST['submit']))
{
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $sql = "SELECT * FROM students WHERE Username='". $Username."' AND Password = '".$Password."'";
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $data = $conn->prepare($sql);
    $data->execute();
    $rows= $data->fetchAll();
    if($Username == "admin" & $Password=="123")
    {
        header("Location: manager.php?Username=". $Username);
    }
    else{
    
    if(!$rows)
    {
        die('check your Username and Password');
    }
      else
      {
        
        
        header("Location: home.php?Username=". $Username);
      }
    
      $conn = null;
    }

}
?>
<html>
<head>
    <title>Manager</title>
    <style type="text/css">
        body {
            background-image: url(image/44.png);
            background-size: cover;
            
        }
    </style>
</head>


<form action="" method="POST" style="margin: 8rem 0 0 32rem;">
    <table style="border: 1px solid #b0b0b0;padding: 4rem;border-radius: 40px 0;">
        <tr style="height:3rem;">
            <td><b>Username :</b></td>
            <td style="transform:translatex(2rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" name="Username"/></td>
        
        </tr>
        <tr style="height:3rem;">
            <td><b>Password:</b></td>
        <td style="transform:translatex(2rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="Password" name="Password"  /></td>
        </tr>
        <tr style="height:3rem;">
            <td></td>
            <td><input style="width: 6rem;height: 2.2rem;border-radius: 1.5rem;background-color: #5757f4;color: white;font-size:1rem; transform:translatex(7rem);" type="submit" name="submit" value="Login"></td>
        </tr>
        <tr style="height:3rem;">
            <td collspan="2"><a href="index.php">Register</a></td>
        </tr>
    </table>
</form>