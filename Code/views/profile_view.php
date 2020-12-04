<!DOCTYPE html>
<html>
    <head>
        <title>Used Laptop Portal</title>
        <link rel="stylesheet" href="style/basic.css">
        <script type="text/javascript" src="scripts/validation.js"></script>
    </head>
    <body>
        
            <header>
            <nav>
                <ul>
                    <li><a href="home">HOME</a></li>
                    <li><a href="seller">SELLER</a></li>
                    <li><a class="active" href="profile">PROFILE</a></li>
                    <li><a href="about">ABOUT</a></li>
                    <li class="rightfloat"><a href="logout"> Logout : <?=$_SESSION['uname']?></a></li>
                </ul>
            </nav>
                <h1>Used Laptop Portal</h1>
            </header>

            <div id="content">
                <div class="dataform">
                    <form action="" name="profile_update" method="POST">
                        <table>
                            <tr>
                                <td>Name </td>
                                <td><?=$profile['NAME']?></td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td><?=$profile['EMAIL']?></td>
                            </tr>
                            <tr>
                                <td>Mobile No </td>
                                <td><input type="number" id="mob" name="mob" value="<?=$profile['MOB']?>" step="1" min="1000000000" max="9999999999" placeholder="Mobile No"></td></td>
                            </tr>
                            <tr>
                                <td>Address Line1 </td>
                                <td><input type="text" id="add1" name="add1" value="<?=$profile['ADD1']?>" maxlength="50" size="50" placeholder="Building No/House Name"></td>
                            </tr>
                            <tr>
                                <td>Address Line2 </td>
                                <td><input type="text" id="add2" name="add2" value="<?=$profile['ADD2']?>" maxlength="50"size="50" placeholder="Street/Locality"></td>
                            </tr>
                            <tr>
                                <td>Address Line3 </td>
                                <td><input type="text" id="add3" name="add3" value="<?=$profile['ADD3']?>" maxlength="50" size="50" placeholder="District"></td>
                            </tr>
                            <tr>
                                <td>PIN </td>
                                <td><input type="number" min="100000" max="999999" id="pin" name="pin" value="<?=$profile['PIN']?>" placeholder="PIN Code"></td>
                            </tr>
                            <tr>
                                <td>State </td>
                                <td><?=$profile['STATE']?></td>
                            </tr>
                            <tr>
                                <td>Password </td>
                                <td><input type="password" id="pwd" name="pwd" size="50" placeholder="Type New Password to Update"></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <input class="bluebutton" type="reset" value="Reset" >
                                    <input class="bluebutton" type="submit" value="Update" onmouseover="validate_profile()">
                                </td>
                            </tr>
                        </table>
                        <?php if(!empty($updt_err)){ ?>
                            <p class="error"><?=$updt_err?></p>
                        <?php } ?>
                    </form>

                </div>

                <h3>Your Orders: </h3>
                <div class="box">
                    <?php if($orders==null) { 
                        echo "<p> No Orders yet!</p>";
                    } else {
                        while($row = mysqli_fetch_assoc($orders)){
                    ?>
                    <div class="ad">
                        <div class="adimg">
                            <img src="<?=$img_dir.$row['ID'].".jpg"?>" width="300px">
                        </div>
                        <div class="adtext">
                            <b><?=$row['DISP_NAME']?></b><br>
                            <?=$row['BRAND']?><br>
                            <?=$row['PROC']?><br>
                            <?=$row['RAM']." RAM<br>".$row['HDD']." Storage "?><br>
                            <?=$row['GFX']?><br>
                            <?=$row['DISP']." Display"?>
                            <br>Rs.<?=$row['PRICE']?> <br>
                            <br> Sold by <?=$row['SELLER_ID']?>
                        </div>
                    </div>
                    <?php
                        }
                    } ?>
                </div>
            </div>
    </body>
</html>