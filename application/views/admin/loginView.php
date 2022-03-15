<body class=" login_page  pace-done">
   <div class="pace  pace-inactive">
      <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
         <div class="pace-progress-inner"></div>
      </div>
      <div class="pace-activity"></div>
   </div>
   <div class="container-fluid">
      <div class="login-wrapper row">
         <div id="login" class="login loginpage col-sm-4 col-sm-offset-4" style="margin-top: 128.5px;">
            <h1>Bracci Admin</h1>
            <form name="loginform" id="loginform" action="<?php echo base_url('admin/login/autenticar'); ?>" method="post">
               <p>
                  <label for="user_login">Username<br>
                     <input type="text" name="email" id="user_login" class="input form-control" value="" placeholder="E-mail" size="20">
                  </label>                
               </p>
               <p>
                  <label for="user_pass">Password<br>
                     <input type="password" name="senha" id="user_pass" class="input form-control" value="" placeholder="Senha" size="20">
                  </label>                 
               </p>
               <p class="forgetmenot">
                  <label class="icheck-label form-label" for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever" class="icheck-minimal-aero" checked=""> Remember me</label>
               </p>
               <p class="submit">
                  <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-accent btn-block" value="Sign In">
               </p>
            </form>
            <p id="nav">
               <a class="float-left" href="#" title="Password Lost and Found">Esqueceu a senha?</a>
               <a class="float-right" href="ui-register.html" title="Sign Up">Sign Up</a>
            </p>
         </div>
      </div>
   </div>

</body>