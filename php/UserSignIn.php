<div class="form-container sign-in">
<form action="#" method="post">
<h1>Sign In</h1>
<div class="input-box">
            <span class="ico">
            <ion-icon name="person"></ion-icon>
            </span>
            <input type="text" name="name" required>
            <label>Name</label>
            </div>
            <div class="input-box">
                <span class="ico">
                    <ion-icon name="call"></ion-icon>
                </span>
                <input type="text" name="phone" required>
                <label>Phone Number</label>
            </div>
            <?php
                 $message="";
                 $info="";
                 if(count($_POST)>0) 
                 {
                    $servername = "localhost";
                    $username = "root";
                    $password = ""; 
                    $database = "cook";
                    $port = 3307; 
                     $conn = new mysqli($servername, $username, $password, $database, $port);
                    $query=mysqli_query($conn,"select*from customer where name='".$_POST["name"]."'and phone='".$_POST["phone"]."'");
                    $count=mysqli_num_rows($query);
                    if($count==0)
                    {
                         $message="Invalid! Please enter the valid details";
                    }
                    else
                    {
                         header("location:Catalog.php");
                     }
                } 
                if($message!=="")
                {
                    echo $message;
                }
             ?>
     <button> SIGN IN</button>
</form>
</div>




