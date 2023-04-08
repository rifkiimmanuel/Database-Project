<?php  

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel ="stylesheet" href="style.css">
 <title>Reservation Restaurant App </title>
</head>


    <body> 
    <nav>
    <label class = "logo">Reservation</label>

    <ul> 
    <li>
        <a class+ "active" href= "indexowner.php">Home</a>
    </li>
    <li>
    <a href= "indexcustomer.php">Check Customer</a>
    </li>
    <li>
        <a href= "indexreservation.php"> check Reservation</a>
    </li> 
    <li>
    <a href= "indexfoodcat.php">Category Menu</a>
    </li>
    <li>
        <a href= "indexfoodowner.php">Menu</a>
    </li> 
    <li>
        <a href= "indexpayment.php">Payment</a>
    </li>
    <li>
        <a href= "indexorderdetail.php">Order</a>
    </li>
    </ul>
    </nav>
    

    </body>
</html>




<?php




// create database connection using config file
include_once("config.php");

// check if form is submitted
if (isset($_POST['update'])) {
    $category_id = $_POST['category_id'];
    $name_category = $_POST['name_category'];
    

    // update food data in database
    $result = mysqli_query($conn, "UPDATE food_category SET name_category='$name_category' WHERE category_id=$category_id");

    // redirect to homepage
    header("Location: indexfoodcat.php");
}

// get food ID from URL
$category_id = $_GET['ID'];

// fetch food data from database
$result = mysqli_query($conn, "SELECT * FROM food_category WHERE category_id=$category_id");

while ($food_category = mysqli_fetch_array($result)) {
    $name_category = $food_category['name_category'];
}
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Category</title>
</head>
<body>

    <form name="update_food" method="post" action="editfoodcat.php">
        <table border="0">
        <tr>
                <td>Category Id </td>
                <td><input type="text" name="category_id" value="<?php echo $category_id;?>"></td>
            <tr>
            <tr>
                <td>Name Category</td>
                <td><input type="text" name="name_category" value="<?php echo $name_category;?>"></td>
            </tr>
                <td><input type="hidden" name="category_id" value="<?php echo $category_id;?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
