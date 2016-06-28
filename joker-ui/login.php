<html>
<head>
    <?php
    require_once "components/common.php";
    require_once "components/lib.php";
    require_once "components/css.php";
    require_once "components/menu.php";
    echo "<title>SmartCube | Login</title>";
    ?>
    <link href="assets/admin/pages/css/login3.css" rel="stylesheet" type="text/css"/>
</head>
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo" style="margin-bottom:0;">
    <img src="img/logo.png" alt="logo" class="logo-default" style="height:30px;"/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="post">
        <h3 class="form-title">Login to your account</h3>

        <div class="alert alert-danger display-hide">
            <button class="close" data-close="alert"></button>
            <span>Please review the errors below. </span>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
            </div>
        </div>
        <div class="form-actions">
            <label class="checkbox"><input type="checkbox" name="remember" value="1"/> Remember me </label>
            <button class="btn green-haze pull-right" onclick="login();">Login</button>
        </div>
        <div class="create-account">
            <p>Don't have an account yet? <a href="javascript:" id="register-btn">Create an account </a></p>
            <p>First time visitor? <a id="trust_link" href="" target="_blank">Trust</a> or <a href="data/smartcube.cert" target="_blank">download certificate</a></p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" method="post">
        <h3>Forget Password ?</h3>

        <p>Enter your e-mail address below to reset your password.</p>

        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-envelope"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn">
                <i class="m-icon-swapleft"></i> Back
            </button>
            <button type="submit" class="btn green-haze pull-right">
                Submit <i class="m-icon-swapright m-icon-white"></i>
            </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->
    <form class="register-form" method="post">
        <h3>Sign up</h3>

        <p>Enter your account details below:</p>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Username</label>

            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>

            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Password" name="password"/>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>

            <div class="controls">
                <div class="input-icon">
                    <i class="fa fa-check"></i>
                    <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Re-type Your Password" name="rpassword"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label><input type="checkbox" name="tnc"/> I agree to the <a href="javascript:">Terms and Conditions</a></label>

            <div id="register_tnc_error"></div>
        </div>
        <div class="form-actions">
            <button id="register-back-btn" type="button" class="btn">Back</button>
            <button id="register-submit-btn" class="btn green-haze pull-right" onclick="register();">Sign Up</button>
        </div>
    </form>
    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">2015-2016 &copy; <a href="http://www.ust.hk/" target="_blank">HKUST</a> & <a href="http://www.hkjc.com/" target="_blank">HKJC</a></div>
<!-- END COPYRIGHT -->
<?php require_once "components/js.php"; ?>
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/login.js" type="text/javascript"></script>
</body>
</html>