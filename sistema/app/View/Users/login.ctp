<html>
  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="ThemeBucket">
      <link rel="shortcut icon" href="images/favicon.html">

      <title>Gestão Igreja Nova Criação</title>

      <!--Core CSS -->
      <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap-reset.css" rel="stylesheet">
      <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet"/>
      <link href="css/style-responsive.css" rel="stylesheet" />

      <!-- Just for debugging purposes. Don't actually copy this line! -->
      <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>;
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>;
      <![endif]-->
  </head>

  <body class="login-body">
      <?php 
        $flash = $this->Session->flash();
        if (!empty($flash)) {
          echo '<div class="alert alert-info col-md-4 pull-right">'.$flash.'</div>';
        }
      ?>
      <div class="logo-nc">
        <?php echo $this->Html->image('logo-nova-criacao.png', ['alt' => 'Logo Nova Criação', 'class' => 'logo-nc-style']); ?>
      </div>
      <?php echo $this->Form->create('User', array('class' => 'form-signin', 'role' => 'form')); ?>
        <h2 class="form-signin-heading">Sistema de Gestão - Nova Criação</h2>
        <div class="login-wrap">
            <div class="user-login-info">
                <?php 
                  echo $this->Form->input('username', array('placeholder' => 'E-mail', 'autofocus', 'label' => false, 'class' => 'form-control'));
                  echo $this->Form->input('password', array('placeholder' => 'Senha', 'autofocus', 'label' => false, 'class' => 'form-control'));
                ?>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Lembre-me
                <span class="pull-right">
                    <a style="color:rgb(0, 124, 161); fon" data-toggle="modal" href="#myModal"> Esqueci minha senha</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>
            <div class="registration">
                Desenvolvido por
                <a class="" target="_blank" href="https://github.com/jorgeluizmcf/NFChurchWeb">
                    UNIFOR
                </a>
            </div>

        </div>
          <!-- Modal -->
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Esqueceu sua senha?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Entre com seu email para receber uma mensagem para redefinir a senha.</p>
                          <input type="text" name="email" placeholder="E-mail" autocomplete="off" class="form-control placeholder-no-fix">

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                          <button class="btn btn-success" type="button">Me envie a mensagem</button>
                          </html>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal -->

      <?php echo $this->Form->end(); ?>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="/js/lib/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>

  </body>
</html>