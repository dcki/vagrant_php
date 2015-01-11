<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <img src="/public/images/cat.png">
      <form action="/" method="post">
         <label for="name_input">What is your name?</label>
         <input type="text" name="name" id="name_input">
         <input type="submit" value="Submit">
      </form>
      <?php if (!empty($name)) { ?>
         <p>Hello <?= $name ?></p>
      <?php } ?>
   </body>
</html>
