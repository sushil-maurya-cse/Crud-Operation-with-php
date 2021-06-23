<?php
include 'conn.php';
$id = $_GET['id'];
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $nickname = $_POST['nickname'];
    $designation = $_POST['designation'];
    $dob = $_POST['dob'];
    $field = $_POST['field'];
    $gender = $_POST['gender'];
    $old_image = $_POST['old_image'];
    $image = $_FILES['file'];
    $filename = $image['name'];
    $filepath = $image['tmp_name'];
    $fileerror = $image['error'];

    if ($filepath != '') {
        if ($fileerror == 0) {
            $dest_file = 'uploads/' . $filename;
            move_uploaded_file($filepath, $dest_file);

            $query = "UPDATE `crud_php` SET `id`=$id,`username`='$username',`nickname`='$nickname',
            `image`='$dest_file',`designation`='$designation',`dob`='$dob',`field`='$field',`gender`='$gender' WHERE id=$id";

            $sql = mysqli_query($con, $query);
        }
    } else {
        $query = "UPDATE `crud_php` SET `id`=$id,`username`='$username',`nickname`='$nickname',
        `image`='$old_image',`designation`='$designation',`dob`='$dob',`field`='$field',`gender`='$gender' WHERE id=$id";
        $sql = mysqli_query($con, $query);
    }
    if ($sql) {
        echo 'Image Updated';
        header('location:index.php');
    } else {
        echo 'Image Not Updated';
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update</title>
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 50px;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr {
            justify-content: space-around;
        }

        tr:nth-child(even) {
            background-color: #FFFFFF;
            color: black;
        }

        tr:nth-child(odd) {
            background-color: #100F0F;
            color: #fff;
        }
    </style>
</head>

<body>
    <form method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-header">
                <h1> Update Cadet</h1>
            </div>
            <?php
            include 'conn.php';
            $query = "select * from crud_php where id=$id";
            $sql = mysqli_query($con, $query);
            while ($row = mysqli_fetch_array($sql)) {
            ?>
                <table>
                    <tr>
                        <th><label>Username</label></th>
                        <td><input type="text" name="username" value="<?php echo $row['username']; ?>"></td>
                    </tr>

                    <tr>
                        <th><label>Nickname</label></th>
                        <td><input type="text" name="nickname" value="<?php echo $row['nickname']; ?>"></td>
                    </tr>

                    <tr>
                        <th><label for="profile">Upload a profile photo : </label>
                        <td>
                            <input type="file" name="file"></th>
                            <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>" />
                        </td>
                    </tr>

                    <tr>
                        <th><label>Designation</label></th>
                        <td><input type="text" name="designation" value="<?php echo $row['designation']; ?>"></td>
                    </tr>

                    <tr>
                        <th><label>Dob</label></th>
                        <td><input type="date" name="dob" value="<?php echo $row['dob']; ?>"></td>
                    </tr>
                    <tr>
                        <th><label>Field</label></th>
                        <td> <select id="field" name="field">
                                <option value="Computer Science">CSE</option>
                                <option value="Electronics">ECE</option>
                                <option value="Mechanical">ME</option>
                                <option value="Autmobile">Automobile</option>
                            </select></td>
                    </tr>
                    <tr>
                        <th><label>Gender</label></th>
                        <td><input type="radio" id="male" name="gender" value="male">
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="other">
                            <label for="other">Other</label>
                    </tr>
                    </td>
                <?php } ?>
                <tr style="height:20px">
                    <td colspan="2" style="text-align:center"><input type="submit" name="submit" value="Submit" align="right" style="padding:10px; color:white; background-color:blue;"></td>
                </tr>
                </table>
    </form>

    <script>
        var male = document.getElementById("male");
        var female = document.getElementById("female");
        var other = document.getElementById("other");
        <?php
        include 'conn.php';
        $query = "select * from crud_php where id=$id";
        $sql = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($sql)) {
            $gender = $row['gender'];
            if ($gender == 'male') {
        ?>
                male.checked = true;
            <?php } else if ($gender == 'female') { ?>
                female.checked = true;
            <?php } else { ?>
                other.checked = true;
        <?php }
        }

        ?>
    </script>
</body>

</html>