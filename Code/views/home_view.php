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
                    <li><a class="active" href="home">HOME</a></li>
                    <li><a href="seller">SELLER</a></li>
                    <li><a href="profile">PROFILE</a></li>
                    <li><a href="about">ABOUT</a></li>
                    <li class="rightfloat"><a href="logout"> Logout : <?=$_SESSION['uname']?></a></li>
                </ul>
            </nav>
                <h1>Used Laptop Portal</h1>
            </header>

            <div id="content">
                <?php if($res==null) { ?>
                    <p class="empty"> Nothing to Show! </p>
                <?php } else {
                    while($row = mysqli_fetch_assoc($res)){
                ?>
                <div class="ad">
                    <div class="adimg">
                        <img src="<?=$img_dir.$row['ID'].".jpg"?>" width="250px">
                    </div>
                    
                    <div class="adtext">
                        <p class="adtexthead"><?=$row['DISP_NAME']?></p>
                        <?php
                            echo "{$row['RAM']} RAM , {$row['HDD']} Storage<br>";
                            echo "Rs.".$row['PRICE']."<br>";
                        ?>
                        <br>
                        <a href="product/<?= $row['ID'] ?>"><input class="bluebutton" type="submit" value="View"></a>
                    </div>
                    
                </div>
                <?php
                    }
                } ?>
            </div>
        </div>
    </body>
</html>