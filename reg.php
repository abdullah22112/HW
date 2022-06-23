<?php 
 //include_once 'con-db.php';
 $servername = "localhost";
$user = "root";
$Password = "";
$dbname = "School";
$conn = new PDO("mysql:host=$servername;dbname=$dbname",$user,$Password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->exec("SET CHARACTER SET UTF8");
    if(isset($_POST['submit']))
    {
        $Cname = $_POST['Cname'];
        $BDate = $_POST['BDate'];
        $Sex = $_POST['Sex'];
        $Language = $_POST['Language'];
        $Speak = $_POST['Speak'];
        $STbefore = $_POST['STbefore'];
        $Level = $_POST['Level'];
        $Fname = $_POST['Fname'];
        $Mname = $_POST['Mname'];
        $Supervisor = $_POST['Supervisor'];
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $Country = $_POST['Country'];
        $City = $_POST['City'];
        $Address = $_POST['Address'];
        $Message = $_POST['Message'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];
        
        $stm = "INSERT INTO students (Cname,BDate,Sex,Language,Speak,STbefore,Level,Fname,Mname,Supervisor,Email,Phone,Country,City,Address,Message,Username,Password) VALUES ('$Cname','$BDate','$Sex','$Language','$Speak','$STbefore','$Level','$Fname','$Mname','$Supervisor','$Email',$Phone,'$Country','$City','$Address','$Message','$Username','$Password');";
        try{
            $conn->beginTransaction();

            $conn->exec($stm);
            $conn->commit();
            echo "New record created successfully";
           // header("Location: home.php");
        }catch(Exception $e)
        {
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
