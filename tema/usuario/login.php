   <?php
   require_once("models/header.php");

   ?>
   
    <link href="assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img width="auto" height="85px" src="imagenes/regetrack-logo-473x100-blanco-y-rojo.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form name='login' action='<?php $_SERVER['PHP_SELF'] ?>' method='post'>
                <h3 class="form-title font-green">Ingresar</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Ingrese su usuario y contraseña. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Usuario</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="yes" placeholder="Username" name="username" /> </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Acceder</button>
                    <label class="rememberme check">
                        <input type="checkbox" name="remember" value="1" />Recordar </label>
                    <!--a href="forgot-password.php" id="forget-password" class="forget-password">¿Olvido su contraseña?</a-->
                </div>               
            </form>
			
			</div>
