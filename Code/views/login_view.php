<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="style/login.css">
        <script type="text/javascript" src="scripts/validation.js"></script>
    </head>
    <body class="white">
        <div id="loginblock">
            <h2>Login</h2>
            <form action="" method="POST" name="login_form">
                <table>
                    <tr>
                        <td><label for="uname">Email Id</label></td>
                        <td><input type="text" id="uname" name="uname" placeholder="Email Id"></td>
                    </tr>

                    <tr>
                        <td><label for="pwd">Password</label></td>
                        <td><input type="password" id="pwd" name="pwd" placeholder="Password"></td>
                    </tr>

                    <tr>
                        <td class="centered" colspan="2">
                            <input class="bluebutton" type="submit" id="lgnbtn" name="lgnbtn" value="Login" onmouseenter="validate_login()">
                            <a href="signup"><input class="bluebutton" type="button" id="sgnuplnk" name="sgnuplnk" value="New user? Signup"></a>
                        </td>
                    </tr>

                </table>
            </form>
            <?php
            if(!empty($err_msg)){ ?>
                <p class="error">
                    <?=$err_msg?>
                </p>
            <?php
            }
            ?>
        </div>
    </body>
</html>