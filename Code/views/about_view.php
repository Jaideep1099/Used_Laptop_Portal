<!DOCTYPE html>
<html>
    <head>
        <title>Used Laptop Portal</title>
        <link rel="stylesheet" href="style/basic.css">
    </head>
    <body>
        <div id="main">
            <header>
                <nav>
                    <ul>
                        <li><a href="home">HOME</a></li>
                        <li><a href="seller">SELLER</a></li>
                        <li><a href="profile">PROFILE</a></li>
                        <li><a class="active" href="about">ABOUT</a></li>
                        <li class="rightfloat"><a href="logout"> Logout : <?=$_SESSION['uname']?></a></li>
                    </ul>
                </nav>
                <h1>Used Laptop Portal</h1>
            </header>
            <div id="content">
                <h2>About</h2>
                <p class="about">
                    A space for selling and buying used Laptops<br>
                    We encourage the reuse of products and thereby reduce E-waste<br>
                    Contact us: developer@mail.com
                </p>
            </div>
        </div>
    </body>
</html>