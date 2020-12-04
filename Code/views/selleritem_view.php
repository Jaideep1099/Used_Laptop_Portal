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
                    <li><a href="./../home">HOME</a></li>
                    <li><a class="active" href="./../seller">SELLER</a></li>
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
                        <img src="<?="./../".$img_dir.$it_id.".jpg"?>" width="400px">
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
                        echo "<br><b>Rs.".$prod['PRICE']."</b><br>";
                    ?>
                    <br>
                    <a href="./../delete/<?=$prod['ID']?>"><input class="bluebutton" type="button" value="Delete"></a>
                    </div>
                </div>

                <div class="box">
                    <h3>Unanswered Queries</h3>
                    <?php if(mysqli_num_rows($qstns)<1) { ?>
                        <p class="qans">No Queries to answer!</p>
                    <?php } else{ 
                        while($qa = mysqli_fetch_assoc($qstns)) { ?>
                        <div class="box">
                            <form action="./../addans/<?=$qa['QID']?>" method="POST" name="query_form">
                                <p class="qtext"> <?=$qa['QSTN']?> </p>
                            
                                <table>
                                <tr>
                                    <td><textarea name="ans" rows="3" cols="80" maxlength="255" placeholder="Answer"></textarea></td>
                                    <td><input class="bluebutton" type="submit" value="Answer"></td>
                                </tr>
                            </table>
                            </form>
                        </div> 
                        <?php }  }?>
                </div>
            </div>
        </div>
    </body>
</html>