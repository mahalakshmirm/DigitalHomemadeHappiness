<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "cook";
    $port = 3307; 
    $name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $category = $_POST["category"];
    $message = $_POST["message"];
    $conn = new mysqli($servername, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO contact_messages (full_name, email, phone, category, message)
            VALUES ('$name', '$email', '$phone', '$category', '$message')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Thank you! Your message has been submitted successfully.";
    } else {
        $error_message = "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Us - Homemade Food Hub</title>
  <style>
    body {
        background: rgba(0, 0, 0, 0.7) url("picture/ContactBack.jpg") center fixed;
    background-size: cover;
    background-blend-mode: darken;
      font-family: Arial, sans-serif;
      
      margin: 0;
      padding: 0;
    }
    .navbar ul li a:hover{
    box-shadow: 0 3px 50px orangered inset,0 3px 50px #ff4500 inset,
    0 3px 50px orangered inset,0 3px 50px orangered inset;
}
.navbar ul li{
    display: inline-block;
    padding: 1px;
    text-transform: uppercase;
    margin-left:1200px;
    
}

.navbar ul li a{
    text-decoration: none;
    color: #fff;
    padding: 4px;
    transition: 2s;
}
    .container {
      max-width: 700px;
      margin: 50px auto;
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #ff7043;
    }
    form label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    form input, form select, form textarea {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }
    form textarea {
      height: 120px;
    }
    form button {
      background-color: #ff7043;
      color: white;
      padding: 12px 20px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
    }
    form button:hover {
      background-color: #e65c2e;
    }
    .message {
      margin-top: 20px;
      padding: 10px;
      border-radius: 6px;
      text-align: center;
    }
    .success { background-color: #d4edda; color: #155724; }
    .error { background-color: #f8d7da; color: #721c24; }
  </style>
</head>
<div class="navbar">
      <ul>
          <li><a href="../html/dashboard.html">HOME</a></li>
          
      </ul>
  </div>
<body>
<body>

  <div class="container">
    <h2>Contact Us</h2>

    <?php if (!empty($success_message)) echo "<div class='message success'>$success_message</div>"; ?>
    <?php if (!empty($error_message)) echo "<div class='message error'>$error_message</div>"; ?>

    <form method="post" action="">
      <label for="full_name">Full Name</label>
      <input type="text" id="full_name" name="full_name" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone">

      <label for="category">Query Category</label>
      <select id="category" name="category">
        <option value="Customer Inquiry">Customer Inquiry</option>
        <option value="Chef Registration">Chef Registration</option>
        <option value="Feedback">Feedback</option>
        <option value="Technical Support">Technical Support</option>
        <option value="Other">Other</option>
      </select>

      <label for="message">Your Message</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </div>

</body>
</html>
