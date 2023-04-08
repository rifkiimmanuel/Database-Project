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
// check if form submitted
if (isset($_POST['Submit'])) {
    $category_id = $_POST['category_id'];
    $name_category = $_POST['name_category'];


    // include database connection file
    include_once("config.php");

    // insert customer data into table
    $result = mysqli_query($conn, "INSERT INTO food_category (category_id, name_category)
    VALUES('$category_id','$name_category')"); //dibuat null karena category id nya yang otomatis increment 

    // Show message when customer added
    echo "Customer added successfully. <a href='index.php'>View Customers</a><br><br>";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sekarang</title>
</head>

<body>
    <form action="addfoodcat.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>ID</td>
                <td><input type="text" name="category_id"></td>
            </tr> 
            <tr>
             <td>Category</td>
<td>
  <select name="name_category">
    <option value="Indonesian food">Indonesian food</option>
    <option value="American Food">American Food</option>
    <option value="western">Western Food</option>
    <option value="Indian food">Indian food</option>
  </select>
</td>
     <tr>
        <td></td>
        <td><input type="submit" name="Submit" value="Add Food"></td>
      </tr>
        </table>
    </form>
</body>
</html>
