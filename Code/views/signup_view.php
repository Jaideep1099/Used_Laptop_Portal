<!DOCTYPE html>
<html>
    <head>
        <title>Signup</title>
        <link rel="stylesheet" href="style/login.css">
        <script type="text/javascript" src="scripts/validation.js"></script>
    </head>
    <body class="white">
        <div id="loginblock">
            <a href="login">Back to Login</a>
            <h2>Signup</h2>
            <form action="" method="POST" name="signup_form">
                <table>
                    <tr>
                        <td><label for="nm">Name</label></td>
                        <td><input type="text" id="nm" name="nm" maxlength="50" size="40" placeholder="Full Name"></td>
                    </tr>

                    <tr>
                        <td><label for="mob">Mobile No</label></td>
                        <td><input type="number" step="1" min="1000000000" max="9999999999" id="mob" name="mob" placeholder="Mobile No"></td>
                    </tr>

                    <tr>
                        <td><label for="add1">Address Line1</label></td>
                        <td><input type="text" id="add1" name="add1" maxlength="50" size="40" placeholder="Building No/House Name"></td>
                    </tr>

                    <tr>
                        <td><label for="add2">Address Line2</label></td>
                        <td><input type="text" id="add2" name="add2" maxlength="50" size="40" placeholder="Street/Locality"></td>
                    </tr>

                    <tr>
                        <td><label for="add3">Address Line3</label></td>
                        <td><input type="text" id="add3" name="add3" maxlength="50" size="40" placeholder="District"></td>
                    </tr>

                    <tr>
                        <td><label for="state">State</label></td>
                        <td>
                            <select id="state" name="state" >
                                <option value="Kerala">Kerala</option>
                                <option value="TamilNadu">TamilNadu</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="AndhraPradesh">AndhraPradesh</option>
                                <option value="Telengana">Telengana</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Goa">Goa</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td><label for="pin">PIN</label></td>
                        <td><input type="number" min="100000" max="999999" id="pin" name="pin" placeholder="PIN Code"></td>
                    </tr>

                    <tr>
                        <td><label for="uname">Email id</label></td>
                        <td><input type="email" id="uname" name="uname" maxlength="50" size="40" placeholder="Email id"></td>
                    </tr>

                    <tr>
                        <td><label for="pwd">Password</label></td>
                        <td><input type="password" id="pwd" name="pwd" size="40" placeholder="Password"></td>
                    </tr>

                    <tr>
                        <td class="centered" colspan="2">
                            <input class="bluebutton" type="reset" id="rstbtn" name="rstbtn" value="Clear">
                            <input class="bluebutton" type="submit" id="sgnupbtn" name="sgnupbtn" value="Signup" onmouseover="validate_signup()">
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