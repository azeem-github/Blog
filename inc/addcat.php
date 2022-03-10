<?php 
require '../includes/config.php';

if(isset($_POST['upload'])){
    $category = $_POST['category'];

    if ($category != '') 
    {
        $sql= "SELECT * FROM category WHERE category='$category'";
        $search = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($search);

        if($rows > 0)
        {
            echo "<script>alert('Category Already Exists in Database');</script>";
            echo "<script>window.open('../addcategory.php','_self')</script>";
        } 
        else 
        {

    $sql3 = "INSERT INTO category(category)VALUES('$category')";
    $add = mysqli_query($conn, $sql3);

    if($add){
            $_SESSION['success'] == "Added Successfully";
            echo "<script>alert('Category Has Been Added')</script>";
            echo "<script>window.open('../viewcategory.php','_self')</script>";

        
    }
    else{
        $_SESSION['success'] = "added " ;
        header("Location : addcategory.php");
    }
   }
}

}
?>