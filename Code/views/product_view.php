<!DOCTYPE html>
<html>
    <head>
        <title>Used Laptop Portal</title>
        <link rel="stylesheet" href="./../style/basic.css">
    </head>
    <body>
        <div id="main">
            <header>
            <nav>
                <ul>
                    <li><a class="active" href="./../home">HOME</a></li>
                    <li><a href="./../seller">SELLER</a></li>
                    <li><a href="./../profile">PROFILE</a></li>
                    <li><a href="./../about">ABOUT</a></li>
                    <li class="rightfloat"><a href="./../logout"> Logout : <?=$_SESSION['uname']?></a></li>
                </ul>
            </nav>
                <h1>Used Laptop Portal</h1>
            </header>

            <div id="content">
                <div class="ad">
                    <div class="adimg">
                        <img src="<?="./../".$img_dir.$data.".jpg"?>" width="400px">
                    </div>
                    <div class="adtext">
                    <?php 
                        echo "<b>".$prod['DISP_NAME']."</b><br><br>";
                        echo $prod['BRAND']."<br>";
                        echo "Processor : ".$prod['PROC']."<br>";
                        echo $prod['RAM']." RAM<br>";
                        echo $prod['HDD']." Storage<br>";
                        echo $prod['GFX']." Graphics<br>";
                        echo $prod['DISP']." Display<br>";
                        echo "<b>Rs.".$prod['PRICE']."</b><br>";
                        echo "<br>Sold by ".$prod['SELLER_ID']."<br>";
                    ?>
                    <br>
                    <a href="./../purchase/<?=$prod['ID']?>"><input class="bluebutton" type="button" value="Buy"></a>
                    </div>
                </div>
                <div class="box">
                    <form action="" method="POST" name="query_form">
                        <table>
                            <tr>
                                <td><textarea name="qstn" rows="3" cols="80" maxlength="255" placeholder="Type your query here"></textarea></td>
                                <td><input class="bluebutton" type="submit" value="Add Question"></td>
                            </tr>
                        </table>    
                    </form>
                </div>
                <div class="box">
                    <h3>Queries</h3>
                    <?php if(mysqli_num_rows($qstns)<1) { ?>
                        <p class="qans">No Queries Yet!</p>
                    <?php } else
                        while($qa = mysqli_fetch_assoc($qstns)) { 
                    ?>
                        <div class="box">
                            <p class="qtext"> <?=$qa['QSTN']?> </p>
                            <p class="qans"> <?php if($qa['ANS']=="NA") echo "Not Answered"; else echo $qa['ANS'];?> </p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </body>
</html>