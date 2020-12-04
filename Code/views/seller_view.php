<!DOCTYPE html>
<html>
    <head>
        <title>Used Laptop Portal</title>
        <link rel="stylesheet" href="style/basic.css">
    </head>
    <body>
        
            <header>
            <nav>
                <ul>
                    <li><a href="home">HOME</a></li>
                    <li><a class="active" href="seller">SELLER</a></li>
                    <li><a href="profile">PROFILE</a></li>
                    <li><a href="about">ABOUT</a></li>
                    <li class="rightfloat"><a href="logout"> Logout : <?=$_SESSION['uname']?></a></li>
                </ul>
            </nav>
                <h1>Used Laptop Portal</h1>
            </header>

            <div id="content">
                <div class="dataform">
                    <form action="" name="ad_form" method="POST" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Display Name </td>
                                <td><input type="text" name="disp_name" size="80" maxlength="80" placeholder="This name will be displayed as the title of ad in homescreen"></td>
                            </tr>
                            <tr>
                                <td>Brand </td>
                                <td>
                                    <select name="brand">
                                        <?php while($brand = mysqli_fetch_assoc($brands)) { ?>
                                            <option value="<?=$brand['BRAND']?>" > <?=$brand['BRAND']?> </option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Processor </td>
                                <td><input type="text" name="proc" size="50" maxlength="50" placeholder="Eg: Intel i5 8250U"></td>
                            </tr>
                            <tr>
                                <td>RAM </td>
                                <td><input type="text" name="ram"  size="50" maxlength="50" placeholder="Eg: 4GB"></td>
                            </tr>
                            <tr>
                                <td>Storage </td>
                                <td><input type="text" name="hdd"  size="50" maxlength="50" placeholder="Eg: 500GB HDD/SSD"></td>
                            </tr>
                            <tr>
                                <td>Graphics </td>
                                <td><input type="text" name="gfx"  size="50" maxlength="50" placeholder="Eg: Intel UHD 620, Nvidia GTX 1050Ti"></td>
                            </tr>
                            <tr>
                                <td>Display Properties </td>
                                <td><input type="text" name="disp"  size="50" maxlength="50" placeholder="Eg: 15.6 inch FHD IPS"></td>
                            </tr>
                            <tr>
                                <td>Add Image </td>
                                <td><input type="file" name="image" accept=".jpg"></td>
                            </tr>
                            <tr>
                                <td>Price </td>
                                <td><input type="number" step="0.01" name="price" placeholder="Selling Price"></td>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <input class="bluebutton" type="reset" value="Clear" >
                                    <input class="bluebutton" type="submit" value="+ Create a new Ad" >
                                </td>
                            </tr>
                        </table>
                        <?php if(!empty($add_err)){ ?>
                            <p class="error"><?=$add_err?></p>
                        <?php } ?>
                    </form>

                </div>

                <h3>Ads by you: </h3>
                <?php if(!empty($dlt_err)) echo $dlt_err ?>
                <div class="box">
                    <?php if($ads==null) { 
                        echo "<p> No Ads yet!</p>";
                    } else {
                        while($row = mysqli_fetch_assoc($ads)){
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
                            <a href="selleritem/<?= $row['ID'] ?>"><input class="bluebutton" type="submit" value="View"></a>
                            <a href="delete/<?= $row['ID'] ?>"><input class="bluebutton" type="submit" value="Delete"></a>
                        </div>
                    </div>
                    <?php
                        }
                    } ?>
                </div>

                <h3>Your Sales: </h3>
                <div class="box">
                    <?php if($sold==null) { 
                        echo "<p> No Sales yet!</p>";
                    } else {
                        while($row = mysqli_fetch_assoc($sold)){
                    ?>
                    <div class="ad">
                        <div class="adimg">
                            <img src="<?=$img_dir.$row['ID'].".jpg"?>" width="200px">
                        </div>
                        <div class="adtext">
                            <?php
                                echo "<b>".$row['DISP_NAME']."</b><br>";
                                echo $row['BRAND']."<br>";
                                echo "<br>Rs.".$row['PRICE']."<br>";
                                echo "Bought by : ".$row['BUYER']
                            ?>
                        </div>
                    </div>
                    <?php
                        }
                    } ?>
                </div>
                
            </div>
        
    </body>
</html>