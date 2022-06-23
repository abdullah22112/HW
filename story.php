<style type="text/css">
        body {
            background-image: url(image/44.png);
            background-size: cover;
            
        }
</style>
<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","school");
$id='';
$name='';
$update = false;
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    $stm = "DELETE FROM stories WHERE Id=$id";
    mysqli_query($conn,$stm)or die($mysqli->error());
}

if(isset($_POST['update']))
{
    $id = $_POST['Id'];
    $name = $_POST['Name'];
    $pname = rand(1000,10000)."-".$_FILES["Path"]["name"];
    $stm = "UPDATE stories SET Name='$name',Path='$pname',Type='$filetype' WHERE Id=$id";
    mysqli_query($conn,$stm)or die($mysqli->error());
}


if(isset($_GET['edit']))
{
    $id = $_GET['edit'];
    $update = true;
    $stm = "SELECT * FROM stories WHERE Id=$id";
    $result =  mysqli_query($conn,$stm)or die($mysqli->error());

        $row = $result->fetch_array();
        $id = $row['Id'];
        $name=$row['Name'];
        $pname = $row['Path'];

}

if(isset($_POST['submit']))
    {
        
        $name = $_POST['Name'];
        $pname = rand(10,10000)."-".$_FILES["Path"]["name"];
        $filetype = $_FILES["Path"]["type"];
        
        $stm = "INSERT INTO stories (Name,Path,Type) VALUES ('$name','$pname','$filetype');";
        try{
            mysqli_query($conn,$stm);
            echo "New record created successfully";

      
        }catch(Exception $e)

        {
        echo "error1111";
        }
        $conn = null;
      

    }

    $sql = "SELECT * FROM stories";
        $data = mysqli_query($conn,$sql);
        if(!$data)
        {
            die('');
        }
        else
          {
              ?>
    <table style="margin:2rem 11rem;border:5px solid #989090;border-radius:50px 0;padding: 1rem 2rem 1rem 2rem;background-color: #5757f4;font-size: 1.1rem;">
     <tr>
     
         <th>Name</th>
         
         <th>Path</th>
     </tr>


<?php
             
           while( $category = mysqli_fetch_array($data))
           {
               ?>
                <tr>
                    <td>
                        <?php echo $category['Name']; ?>
                    </td>
                    <td>
                        <?php echo $category['Path'];?>
                    </td>
                    <td>
                        <a style="color: white;margin-right: 1rem;border: 1px;border-radius: 100%;padding: .9rem;" href="story.php?edit=<?php echo $category['Id']; ?>" >Edit</a>
                        <a style="color: white;margin-right: 1rem;border: 1px;border-radius: 100%;padding: .9rem .3rem;" href="story.php?delete=<?php echo $category['Id']; ?>" >Delete</a>
                    </td>
                </tr>

<?php

           }?>
           </table>
           <form style="margin: 4rem 0 0 32rem;" action="story.php" method="POST" enctype="multipart/form-data">
               
               <lable>Title :</lable>
               <input style="width: 11rem;height: 2rem;border-radius: 0.7rem;margin-left:2rem;" type="text" name="Name" id="Name" value="<?php echo $name; ?>"><br><br><br>
               <lable>Path :</lable>
               <input style="width: 11rem;height: 2rem;border-radius: 0.1rem;margin-left:2rem;" type="File" name="Path" id="Path" value="<?php echo $path; ?>"><br><br><br>
               <input style="width: 11rem;height: 2rem;border-radius: 0.7rem;margin-left:2rem;" type="hidden" name="Id" id="Id" value = "<?php echo $id; ?>"/><br><br>
               <?php

                    if($update == true):

               ?>
               <input style="width: 9rem;height: 2.5rem;border-radius: 1.7rem;background-color: #5757f4;color: white;font-size:1.2rem;transform:translateY(-2rem);"  type="submit" name="update" value="update" />
               <?php else: ?>
               <input style="width: 9rem;height: 2.5rem;border-radius: 1.7rem;background-color: #f00;color: white;font-size:1.2rem;transform:translateY(-2rem);margin-left:1rem;" type="submit" name="submit" value="Add" />
               <?php endif; ?>
           </form>
           
           <?php
            
          }
        
        $conn->close();
?>