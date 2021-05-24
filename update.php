<?php

    include_once('function.php');

    $updatedata = new DB_con();

    if (isset($_POST['update'])){
            $userid = $_GET['id'];
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $address = $_POST['address'];

            $sql = $updatedata->update($fname, $lname, $email, $phonenumber, $address, $userid);
            if ($sql) {
                echo "<script>alert('Updated Successfuly!');</script>";
            echo "<script>window.location.href='index.php'</script>";
        }else {
            echo "<script>alert('Something went wrong!');</script>";
            echo "<script>window.location.href='update.php'</script>";
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <div class="container">
    <h1 class="mt-5">Update Page</h1>
    <hr>

    <?php

            $userid = $_GET['id'];
            $updateuser = new DB_con();
            $sql = $updateuser->fetchonerecord($userid);
            while($row = mysqli_fetch_array($sql)) {
    ?>

     <form action="" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" 
                value="<?php echo$row['firstname']; ?>" required >
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname"
                value="<?php echo$row['lastname']; ?>" required >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email"
                value="<?php echo$row['email']; ?>" required >
            </div>
            <div class="mb-3">
                <label for="phonenumber" class="form-label">Phone Number</label>
                <input type="phonenumber" class="form-control" name="phonenumber" 
                value="<?php echo$row['phonenumber']; ?>" required >
            </div>          
            <div class="mb-3">
                <label for="address">Address</label>
                <textarea name="address"  cols="30" rows="10" class="form-control" required><?php echo $row['address']; ?> </textarea>
            </div>
            <?php  } ?>
            <button type="submit" name="update" class="btn btn-success">Update</button>
            
        </form>
      <br>
    </div>
    </div>



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>   
</body>
</html>