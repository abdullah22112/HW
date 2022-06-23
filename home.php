<!DOCTYPE html>
<html>
<head>
<style type="text/css">
        body {
            background-image: url(image/44.png);
            background-size: cover;
            
        }
</style>
</head>
<body>
 <?php
 $con = mysqli_connect('localhost','root','','school');
 if (!$con) {
 die('Could not connect: ' . mysqli_error($con));
 }

 $sql="SELECT * FROM Movies ";
 $result = mysqli_query($con,$sql);
 ?>
    <table style="margin:2rem 11rem;border:5px solid #989090;border-radius:10px 0;padding: 1rem 2rem 1rem 2rem;background-color: #5757f4;font-size: 1.1rem;">
     <tr>
     
         <th>Movies</th>
     </tr>
<?php
foreach($result AS $data){
    $getfile = "data:". $data['Type'].";base64,". base64_encode($data['Path']);
echo "<tr><td><a style=margin:25rem auto;border:1px solid black;border-radius:10px 0;padding: 5rem 4rem 8rem 3rem; href='" . $getfile. "' download>".$data['Name']. "</a></td></tr><br>";
}
 echo "</table><br><br>";

 $sql="SELECT * FROM music ";
 $result = mysqli_query($con,$sql);
 ?>
    <table style="margin:2rem 11rem;border:5px solid #989090;border-radius:10px 0;padding: 1rem 2rem 1rem 2rem;background-color: #5757f4;font-size: 1.1rem;">
     <tr>
     
         <th>Music</th>
     </tr>
<?php
foreach($result AS $data){
    $getfile = "data:". $data['Type'].";base64,". base64_encode($data['Path']);
echo "<tr><td><a style=margin:25rem auto;border:1px solid black;border-radius:10px 0;padding: 5rem 4rem 8rem 3rem; href='" . $getfile. "' download>".$data['Name']. "</a></td></tr><br>";
} 
echo "</table><br><br>";

$sql="SELECT * FROM stories ";
$result = mysqli_query($con,$sql);
?>
   <table style="margin:2rem 11rem;border:5px solid #989090;border-radius:10px 0;padding: 1rem 2rem 1rem 2rem;background-color: #5757f4;font-size: 1.1rem;">
    <tr>
    
        <th>Story</th>
    </tr>
<?php
foreach($result AS $data){
   $getfile = "data:". $data['Type'].";base64,". base64_encode($data['Path']);
echo "<tr><td><a style=margin:25rem auto;border:1px solid black;border-radius:10px 0;padding: 5rem 4rem 8rem 3rem; href='" . $getfile. "' download>".$data['Name']. "</a></td></tr><br>";
} 
 echo "</table>";


 mysqli_close($con);
 ?>
</body></html>
