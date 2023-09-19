<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
        *,
        *::after,
        *::before{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .html{
            font-size: 62.5%;
        }

        .navp{
            max-width: 1200px;
            width: 90%;
            margin: auto;
        }

        .navbar{
            box-shadow: 0px 5px 10px 0px #aaa;
            position: fixed;
            width: 100%;
            background: #fff;
            color: #000;
            opacity: 0.85;
            z-index: 100;
        }

        .navbar-container{
            display: flex;
            justify-content: space-between;
            height: 64px;
            align-items: center;
        }

        .navbar a{
            color: #444;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease-in-out;
        }

        .navbar a:hover{
            color: #117964;
        }

        @media (max-width: 768px){
            .navbar{
                opacity: 0.95;
            }

            .navbar-container input[type="checkbox"],
            .navbar-container .hamburger-lines{
                display: block;
            }

            .navbar-container{
                display: block;
                position: relative;
                height: 64px;
            }
        }

        @media (max-width: 500px){
            .navbar-container input[type="checkbox"]:checked ~ .logo{
                display: none;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container navp">
            <h1 class="logo">Navbar</h1>
        </div>
    </nav>
</body>
</html>