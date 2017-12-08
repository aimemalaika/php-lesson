<?php
  include 'php/accountset.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Account setting</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">

<style type="text/css">
html,
body {
    height: 100%;
}
html {
    display: table;
    margin: auto;
}
body {
    display: table-cell;
    vertical-align: middle;
}
.margin {
  margin: 0 !important;
}
</style>

</head>

<body class="blue">
  <?php
          if (isset($erreur)) { ?>
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
              <script type="text/javascript">
                 swal({
                    title: "Oooops !",
                    text: "<?=$erreur?>",
                    icon: "error",
                    button: "Please try again",
                  });
              </script>
      <?php    }
      ?>

  <div id="login-page" class="row">
    <div class="col s12 z-depth-6 card-panel">
      <form method="POST" class="login-form">
        <div class="row">
          <div class="input-field col s12 center">
            <h3 class="center login-form-text">Set your account informations</h3>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input name="setname" id="username" type="text" class="validate">
            <label for="username" class="center-align">Full name</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input name="setemail" id="email" type="email" class="validate">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="settel" id="email" type="tel" class="validate">
            <label for="email" class="center-align">Tel number +000 0000 000 000</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="setpass" id="password" type="password" class="validate">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input name="setpass2" id="password-again" type="password">
            <label for="password-again">Re-type password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button name="submit" class="btn waves-effect waves-light col s12">Submit informations Now</button>
          </div>
          <div class="input-field col s12">
          </div>
        </div>
      </form>
    </div>
  </div>

 <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>

</body>

</html>
