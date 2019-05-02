<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style_reg.css" media="all"/>

</head>
<body>
    <div class="reg_but"><p><a href="/main/" ><img id="button" src="/resurses/home.png" alt="На главную"></a></p></div>
<div id="reg_h1"><h1>Пройдите форму регистрации</h1></div>
    <div class="regist">
 <div id="error">

          <?php if ($this->result): ?>
              <span class="com" >Вы зарегистрированы!</span>
              <?php else: ?>
                     <?php if (isset($this->errors) && is_array($this->errors))?>
                      <ul>
                     <?php if (is_array($this->errors) || is_object($this->errors))
                     foreach ($this->errors as $error): ?>
                         <span class="com" ><li><?php echo $error; ?></li></span>
                     <?php endforeach; ?>
                      </ul>
                 <?php endif; ?>
 </div>
    <form method="post">
        <input type="text" name="text" placeholder="Введите имя" required="required" value="<?php echo $name; ?>"/>
        <input type="password" name="password" placeholder="Введите пароль" required="required" value="<?php echo $password; ?>"/>
        <input type="password" name="password2" placeholder="Введите пароль ещё раз" required="required" value="<?php echo $password2; ?>"/>
        <input type="email" name="email" placeholder="Введите email" required="required" value="<?php echo $email; ?>"/>
        <input type="submit" name="submit" class="btn1" value="Регистрация" />
        </form>
</div>
</body>
</html>
