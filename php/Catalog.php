<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Catalog</title>
    <link rel="stylesheet" href="../css/CatalogCSS.css">
    <style>
        .navbar {
            background-color: white;
            padding: 10px 20px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: flex-end; /* aligns to right */
        }

        .navbar ul li {
            margin-left: 20px;
            text-transform: uppercase;
        }

        .navbar ul li a {
            text-decoration: none;
            color:black;
            padding: 8px 12px;
            transition: 0.3s ease-in-out;
        }

        .navbar ul li a:hover {
            box-shadow: 0 3px 50px orangered inset,
                        0 3px 50px #ff4500 inset;
        }


        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
            <li><a href="../html/dashboard.html"><b>Home</b></a></li>
        </ul>
    </div>

    <div class="container">
        <h1 style="color: #ff4500;">Food Catalog</h1>
    </div>

    <div class="catalog">
        <?php include 'DisplayCatalog.php'; ?> <!-- Include PHP code to display catalog -->
    </div>
</body>
</html>
