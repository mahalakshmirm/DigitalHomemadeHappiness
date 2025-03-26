<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/CustomerPaymentCSS.css">
</head>
<div class="navbar">
        <ul>
            <li><a href="../html/dashboard.html"><b>Home</b></a></li>
        </ul>
    </div>
<body>
    <div class="container">
        <form action="pro.php" method="POST">
            <div class="row">
                <div class="col">
                    <h3 class="title">Billing Address</h3>
                    <div class="inputBox">
                        <span>Full Name :</span>
                        <input type="text" name="full_name" placeholder="john deo" required>
                    </div>
                    <div class="inputBox">
                        <span>Email :</span>
                        <input type="email" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="inputBox">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="room - street - locality" required>
                    </div>
                    <div class="inputBox">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Mumbai" required>
                    </div>
                    <div class="inputBox">
                        <span>Quantity :</span>
                        <input type="number" name="quantity" id="quantity" placeholder="12" required>
                    </div>
                    <div class="inputBox">
                        <span>Rate :</span>
                        <input type="text" name="rate" id="rate" placeholder="Rs." required>
                    </div>
                    <div class="inputBox">
                        <span>Total Price :</span>
                        <input type="text" id="total" readonly>
                    </div>
                </div>
                <div class="col">
                    <h3 class="title">Payment</h3>

                    <div class="inputBox">
                        <span>Server Name :</span>
                        <input type="text" name="server" placeholder="Mr. John Deo" required>
                    </div>
                    <div class="inputBox">
                        <span>Name As Per In A/C :</span>
                        <input type="text" name="name_on_ac" placeholder="Mr. John Deo" required>
                    </div>
                    <div class="inputBox">
                        <span>Mobile Number :</span>
                        <input type="number" name="mobile" placeholder="9876543210" required>
                    </div>
                    <div class="inputBox">
                        <span>Payment Method :</span>
                        <select name="payment_method">
                            <option>Cash on Delivery</option>
                            <option>UPI</option>
                            <option>Card</option>
                            <option>Net Banking</option>
                        </select>
                    </div>
                </div>
            </div>
            <input type="submit" value="Proceed To Checkout" class="submit-btn">
        </form>
    </div>

    <script>
        const quantity = document.getElementById("quantity");
        const rate = document.getElementById("rate");
        const total = document.getElementById("total");

        function calculateTotal() {
            const q = parseFloat(quantity.value) || 0;
            const r = parseFloat(rate.value) || 0;
            total.value = "Rs. " + (q * r).toFixed(2);
        }

        quantity.addEventListener("input", calculateTotal);
        rate.addEventListener("input", calculateTotal);
    </script>
</body>
</html>