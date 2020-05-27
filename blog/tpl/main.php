<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>My Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px;
      }
    </style>
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="/">My blog</a>
          <div class="nav-collapse">
            <ul class="nav">
        <?if (!$this->user) {?>
              <li><a href="/?signup">Регистрация</a></li>
              <li><a href="/?loginUser">Войти</a></li>
        <?}?>
        <? if ($this->user) {?>
              <li><a href="/?add">Добавить пост</a></li>

              <li><a href="/?logout">Выйти</a></li>
        <? } ?>

        <? if ($this->user[email] == "admin") {?>
              <li><a href="/?users">Пользователи</a></li>
        <? } ?>
        
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">


      <? $this->out($this->tpl,true); ?>
     

    </div> 
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    </body>
</html>