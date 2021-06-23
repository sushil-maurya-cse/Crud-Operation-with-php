

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERS</title>
    <style>
        body {
         font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
table {
  border-collapse: collapse;
  border-spacing: 0;
  
  width: 100%;
  border: 1px solid #ddd;
  border-radius:50px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
tr:nth-child(odd){background-color: #EC4521;
color: #fff;
}
button{
    padding: 8px;
    border: 1px solid #ddd;
    border-radius:5px;
}
.delete{
    color: #fff;
    background-color: red;
}
.update{
    background-color: blue;
}
.heading-table{
    background-color: black;
    color: white;
}
h1{
    text-align: center;
    margin-top: 10px;
    float:left;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    color:black;
    margin-left: 30%;
}
.img{
    border: none;
    border-radius: 50%;
}
a{
    text-decoration: none;
    color: white;
}
.addNewUSer{
    padding:10px;
    float: right;
    margin-right: 10%;
    margin-top: 15px;
    background-color: black;
}
</style>
</head>
<body>
    <h1>Display Users</h1>
    <button class="addNewUSer"><a href="insert.php">Add New User</a></button>
    <table >
        
    <tr class="heading-table" >
    <th>ID</th>
    <th>Username</th>
    <th>nickname</th>
    <th>Profile Image</th>
    <th>designation</th>
    <th>dob</th>
    <th>field</th>
    <th>Gender</th>
    <th>Delete</th>
    <th>Update</th>
    </tr>
       
    <?php
    include 'conn.php';
        $query="select * from crud_php";
        $sql=mysqli_query($con,$query);
        while($row=mysqli_fetch_array($sql)){
    ?>
    <tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['username'];?></td>
    <td><?php echo $row['nickname'];?></td>
    <td><img class="img" src="<?php echo $row['image'];?>" width="100" height="100"></img></td>
    <td><?php echo $row['designation'];?></td>
    <td><?php echo $row['dob'];?></td>
    <td><?php echo $row['field'];?></td>
    <td><?php echo $row['gender'];?></td>
    <td><button class="update"><a href="update.php?id=<?php echo $row['id'];?>">Update</a></button></td>
    <td><button class="delete"><a href="delete.php?id=<?php echo $row['id'];?>">Delete</a></button></td>
    </tr>
    <?php
        }
    ?>
    </table>
</body>
</html>