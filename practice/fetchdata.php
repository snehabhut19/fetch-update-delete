
<?php


require 'db.php';


$sql="select * from user123";
$result=mysqli_query($conn,$sql);

?>
<html>
    <head>
        <title>fetchdata</title>

</head>
<body>
   
    

<table border="2">
    <thead>
    <tr>
        <th>Id</th>
        <th>name</th>
        <th>email</th>
        <th>gender</th>
        <th>phone</th>
        <th>address</th>
        <th>city</th>
        <th>hobbies</th>
        <th>Operation</th>
        
       
    </tr>
</thead>
<tbody>
    

<?php

if(mysqli_num_rows($result)>0){
    while( $row=mysqli_fetch_assoc( $result ) ){       
        ?>
        <tr>
            <td><input type="text" value="<?php echo $row['Id'];?>"></td>
            <td><input type="text" value="<?php echo $row['name'];?>"></td>
            <td><input type="text" value="<?php echo $row['email'];?>"></td>
            <td><input type="text" value="<?php echo $row['gender'];?>"></td>
            <td><input type="text" value="<?php echo $row['phone'];?>"></td>
            <td><input type="text" value="<?php echo $row['address'];?>"></td>
            <td><input type="text" value="<?php echo $row['city'];?>"></td>
            <td><input type="text" value="<?php echo $row['hobbies'];?>"></td>
            <td>
                <form method="POST">
                    <input type=hidden name=id value="<?php echo $row['Id'];?>" >
                    <input type=submit value=Delete name=delete  >
                </form>
            </td>
            <td>
                <form action="updatehtml.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['Id'];?>">
                    <input type="submit" value="update" name="update">
                </form>
            </td>
           <!-- <td><button class="btn btn-primary"><a href="updatehtml.php? Id='.$Id.'" class="text-light">update</a></button></td> -->
        </tr>
        <?php
        
    }
    
    }else{
        echo "0 results";
    }
    if (isset($_POST['delete'])){
        
        $did=$_POST['id'];
        $query="delete From user123 where Id='$did'";
        $result=mysqli_query($conn,$query);
    }

    // if (isset($_REQUEST['update'])){
    //     $did=$_GET['id'];


     
    //     $name = $_POST['name'];
    //     $email = $_POST['email'];
    //     $address = $_POST['address'];
    //     $gender = $_POST['gender'];
    //     $city = $_POST['city'];
    //     $hobbies = $_POST['hobbies'];
    //     $hobby=implode("",$hobbies);
    //     $phone=$_POST['phone'];
        
    //     $sql="update user123 set Id='$did', name='$name',email='$email',gender='$gender',phone='$phone',address='$address',city='$city',hobbies='$hobby' where Id='$did'";
    //     $result=mysqli_query($conn,$sql);
    // }



?>
</tbody>

</table>

</body>
</html>
