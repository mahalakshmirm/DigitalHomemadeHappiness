<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Detail</title>
    <link rel="stylesheet" href="../css/ViewFoodCSS.css">
</head>
<style>
    body
    {
    background-image:url("picture/ViewFoodBack.jpg");
    backdrop-filter:blur(5px);
    background-repeat: no-repeat;
    background-attachment: fixed;   
    background-size: cover;
    display: flex; 
    align-items: center;
    justify-content: center; 
    flex-direction: column; 
    height:100vh;
    } 
</style>
<body>   
    <div class="container">
        <center><h1>Food Detail</h1></center>
        <div class="product-detail">
             <?php 
                 include 'DisplayFood.php';
             ?>      
        </div>
    </div>   
</body>
</html>