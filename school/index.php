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
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title> Registration Form </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        body {
            background-image: url(44.png);
            background-size: cover;
            
        }
    </style>
    <script type="text/javascript">
        
        function chkName() {
            var name = document.getElementById("Cname");
            if (name.value == "") {
                alert("Please Enter Student Name");
                name.focus();
                name.select();
                return false;
            }
        }
        function chkFName() {
            var name = document.getElementById("Fname");
            if (name.value == "") {
                alert("Please Enter Father Name");
                name.focus();
                name.select();
                return false;
            }
        }
        function chkMname() {
            var name = document.getElementById("Mname");
            if (name.value == "") {
                alert("Please Enter Mother Name");
                name.focus();
                name.select();
                return false;
            }
        }
        function chkCity() {
            var City = document.getElementById("City");
            if (City.value == "") {
                alert("Please Enter City");
                City.focus();
                City.select();
                return false;
            }
        }
        function chkCountry() {
            var City = document.getElementById("Country");
            if (City.value == "") {
                alert("Please Enter counrty");
                City.focus();
                City.select();
                return false;
            }
        }
        function chkPhone() {
            var City = document.getElementById("Phone");
            if (City.value == "") {
                alert("Please Enter Phone number");
                City.focus();
                City.select();
                return false;
            }
        }
        function chkUsername() {
            var Username = document.getElementById("Username");
            if (Username.value == "") {
                alert("Please Enter Username");
                Username.focus();
                Username.select();
                return false;
            }
        }
        function chkPassword() {
            var Password = document.getElementById("Password");
            if (Password.value == "") {
                alert("Please Enter Password");
                Password.focus();
                Password.select();
                return false;
            }
        }
        function chkEmail() {
            var myName = document.getElementById("Email");
            var pos = myName.value.search(
                /[A-Za-z_0-9]+@[A-Za-z_0-9]+\.[A-Za-z]+/);

            if (pos == -1) {
                alert("Email must contain @ and .");
                myName.focus();
                myName.select();
                return false;
            } else
                return true;
        }
        function chkPasswords() {
            var Password = document.getElementById("Password");
            var re_Password = document.getElementById("Password2");

            if (Password.value != re_Password.value) {
                alert("The Two Passwords Are Not The Same");
                Password.focus();
                Password.select();
                return false;
            } else
                return true;
        }
        function chkMessage() {
            var Message = document.getElementById("Message");

            if (Message.value.length > 10) {
                alert("It's too long your new Message is ");
                Message.value = Message.value.substring(0, 10);
                Message.focus();
                Message.select();
                return false;
            } else
                return true;
        }
        function chkAddress() {
            var Message = document.getElementById("Address");

            if (Message.value.length > 10) {
                alert("It's too long your new Address is ");
                Message.value = Message.value.substring(0, 10);
                Message.focus();
                Message.select();
                return false;
            } else
                return true;
        }
    </script>
</head>

<body>
    
    <form action="index.php" method="POST" accept-charset="utf-8"style="margin: 1rem 0 0 20rem;">
        <table>
            <tr style="height: 4rem;">
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="Cname" name="Cname" onmouseleave="chkName()" /></td>
                <td style="transform: translateX(13rem);" ><h3>: ?????? ???????????? ????????????</h3></td>            
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="date" id="BDate" name="BDate" require  />
                <td style="transform: translateX(13rem);"><h3>: ?????????? ??????????????</h3></td>
                </td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><select name="Sex" id="Sex" require>
                <option value="??????">??????</option>
                    <option value="????????">????????</option>
                </select>
                <td style="transform: translateX(13rem);"><h3>: ?????? ??????????</h3></td>    
                 </td>
            </tr>
           <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><select name="Language" id="Language" require>
                <option value="?????????? ??????????????">?????????? ??????????????</option>
                    <option value="?????????? ????????????????????">?????????? ????????????????????</option>
                </select>
                <td style="transform: translateX(13rem);"><h3>: ???????? ?????????? ???????? ???????? ???????????????? ??????????</h3></td>   
                    
                 </td>
           </tr>
           <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><select name="Speak" id="Speak" require>
                <option value="??????">??????</option>
                    <option value="????">????</option>
                
                
                </select>
                <td style="transform: translateX(13rem);"><h3>???? ???????????? ???????? ???????????? ?????? ??</h3></td>   
                    
                 </td>
           </tr>
           <tr style="height: 4rem;">
            
                <td style="transform: translateX(8rem);"><select name="STbefore" id="STbefore" require>
                <option value="??????">??????</option>
                    <option value="????">????</option>
                </select>
                <td style="transform: translateX(13rem);"><h3>???? ?????????? ???????????? ??</h3></td>   
                    
                 </td>
           </tr>
           <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><select name="Level" id="Level" require>
                <option value="??????????">??????????</option>
                    <option value="??????????">??????????</option>
                    <option value="??????">??????</option>
                </select>
                <td style="transform: translateX(13rem);"><h3>???? ???? ????????????/???? ?????? ??</h3></td>   
                    
                 </td>
           </tr>
           <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="Fname" name="Fname" onmouseleave="chkFName()" /></td>
                <td style="transform: translateX(13rem);"><h3>: ?????? ???????? ????????????</h3></td>            
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="Mname" name="Mname" onmouseleave="chkMname()" /></td>
                <td style="transform: translateX(13rem);"><h3>: ?????? ???????? ??????????????</h3></td>            
            </tr>
           <tr style="height: 4rem;"> 
                   
                <td style="transform: translateX(8rem);"><select name="Supervisor" id="Supervisor" require>
                <option value="????????">????????</option>
                    <option value="????????">????????</option>
                    <option value="???????? ?????????? ????????">???????? ?????????? ????????</option>
                </select>
                <td style="transform: translateX(13rem);"><h3>: ????????????</h3></td>   
                    
                 </td>
           </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="chkEmail" id="Email" name="Email" value="" require></td>
                <td style="transform: translateX(13rem);"><h3>: ??????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="Phone" name="Phone" onmouseleave="chkName()" require /></td>
                <td style="transform: translateX(13rem);"><h3>: ????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="Country" name="Country" onmouseleave="chkName()" require /></td>
                <td style="transform: translateX(13rem);"><h3>: ??????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" id="City" name="City" onmouseleave="chkName()" require /></td>
                <td style="transform: translateX(13rem);"><h3>: ??????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><textarea name="Address" id="Address" rows="4" cols="40" onmouseleave="chkMessage()"></textarea></td>
                <td style="transform: translateX(13rem);"><h3>: ?????????? ?????????? ????????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
                
                <td style="transform: translateX(8rem);"><textarea name="Message" id="Message" rows="4" cols="40" onmouseleave="chkMessage()"></textarea></td>
                <td style="transform: translateX(13rem);"><h3>: ???????????? ???? ?????????? ?????? ??????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
            
            <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="text" name="Username" value="" require></td>
            <td style="transform: translateX(13rem);"><h3>: ?????? ????????????????</h3></td>
            </tr>
            <tr style="height: 4rem;">
            
            <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="Password" name="Password" require></td>
            <td style="transform: translateX(13rem);"><h3>: ???????? ????????</h3></td> 
             </tr>
             </tr style="height: 4rem;">
            <tr>
            
            <td style="transform: translateX(8rem);"><input style="width: 11rem;height: 2rem;border-radius: 0.7rem;" type="Password" name="Password2" require></td>
            <td style="transform: translateX(13rem);"><h3>: ?????????? ???????? ????????</h3></td>
            </tr style="height: 20rem;">
            <tr style="height:10rem;">
            <td style="transform: translateX(10rem);font-size:1.5rem;"><strong> Already Have An Account ?<br></br>Log in here :</strong></td>
            <td style="transform: translateX(10rem);font-size:1.5rem;" collspan="5"><a href="login.php"><br></br>Login</a></td>
            </tr> 
            <tr style="height: 20rem;"><td></td>
            <td style="transform: translateX(-8rem);"><input style="width: 10rem;height: 2.5rem;border-radius: 1.7rem;background-color: #5757f4;color: white;font-size:1.2rem;" type="reset" value="reset form" />
                    <input style="width: 10rem;height: 2.5rem;border-radius: 1.7rem;background-color: #f00;color: white; font-size:1.2rem;" type="submit" name="submit" value="submit" /></td></tr>


        </table>
    </form>
</body>

</html>