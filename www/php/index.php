<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <img src="/images/cat.png">
      <?php if (!empty($_POST['name'])) { ?>
         <p>Hello <?= $_POST['name'] ?></p>
      <?php } else { ?>
         <form action="index.php" method="post">
            <label for="name_input">What is your name?</label>
            <input type="text" name="name" id="name_input">
            <input type="submit" value="Submit">
         </form>
      <?php } ?>
   </body>
</html>
