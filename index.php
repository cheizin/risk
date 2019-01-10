<?php
session_start();
require("includes/connect.php");
if(isset($_SESSION['name']) || isset($_SESSION['email']) || isset($_SESSION['department']))
{
  ?>
  <script>
  alert("You are logged in!");
  location.replace("home.php");
  </script>
  <?php
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN | PRMIS</title>

    <!-- Bootstrap core CSS -->
   <link href="bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="icon" href="dist/img/cma.PNG" sizes="16x16" type="image/png">
    <!-- Custom styles for this template -->
    <link href="dist/css/signin.css" rel="stylesheet">
    <link href="dist/css/loader.css" rel="stylesheet">
  </head>

  <body>
    <input type="hidden" id="days_remaining" value="<?php echo $days_remaining;?> days remaining to submit quarterly update for (<?php echo $quarterly_period;?>) ">
    <input type="hidden" id="months_remaining" value="<?php echo $months_remaining;?> remaining to submit quarterly update for (<?php echo $quarterly_period;?>) ">
 <nav class="navbar navbar-default navbar-cma">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">CMA</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" title="Project and Risk Management Information System">PRMIS<span class="sr-only">(current)</span></a></li>
        <li><a href="#" class="days_remaining"></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Useful Links <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://hrmis.cma.or.ke" target="_blank">HRMIS</a></li>
            <li><a href="https://www.cma.or.ke" target="_blank">CMA Website</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

    <div class="container">
      <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4 col-xs-12">
                <div class="panel panel-default">
                  <div class="panel-heading text-center"><strong>Please Sign In</strong></div>
                      <div class="panel-body">
                        <div id="loader" style="width:100% ;margin: 0 auto;"></div>
                        <div id="feedback_message" class="text-center"></div><br/>
                            <form class="form-signin" id="signin-form">
                                  <label for="email">Name
                                     <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
                                     title="Your Domain Name associated to your windows account, i.e MUser" id="name_help"></i></label>
                                  <input type="text" id="email" name="email" class="form-control" required placeholder="input your windows username">
                                  <div class="row">
                                    <br/>
                                  </div>
                                  <!--<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>-->
                                    <label for="password">Password
                                      <i class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="right"
                                      title="Your Domain Password associated to your windows account" id="password_help"></i></label>
                                    <div class="input-group add-on">
                                      <input type="password" name="password" id="password" class="form-control pwd"  required placeholder="input your windows password">
                                      <span class="input-group-btn">
                                        <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
                                      </span>
                                    </div>
                                    <span class="text-info" id="caps-lock">CAPS LOCK IS ON!</span>

                              <div class="row"><br/>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-block" id="sign-in-button">Sign In</button>
                                </div>
                              </div>
                            </form>
                      </div>
                      <div class="panel-footer">Contact system administrator if you can't login</div>
                  </div>
              </div>
              <div class="col-md-4"></div>
          <!--<div class="col-md-8 col-xs-12">
              <div class="jumbotron">
                  <h1>Projects</h1>
              </div>
          </div>-->
      </div>


    </div> <!-- /container -->
    <!-- jQuery 3 -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/typed.js"></script>
    <script src="functions/days_remaining.js"></script>
    <script src="functions/forms.js"></script>
    <script>
        //make password visible
          $(".reveal").mousedown(function() {
              $(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
          })
          .mouseup(function() {
            $(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
          })
          .mouseout(function() {
            $(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
          });

          //caps lock notifier
          var input = document.getElementById("password");
          var text = document.getElementById("caps-lock");
          input.addEventListener("keyup", function(event) {

          if (event.getModifierState("CapsLock")) {
              text.style.display = "block";
            } else {
              text.style.display = "none";
            }
          });

          $('#name_help').tooltip('enable');
        </script>
  </body>
</html>
