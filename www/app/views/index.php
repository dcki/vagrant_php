<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <img src="/public/images/cat.png">
      <?php if (!empty($post['name'])) { ?>
         <p>Hello <?= $post['name'] ?></p>
      <?php } else { ?>
         <form action="/" method="post">
            <label for="name_input">What is your name?</label>
            <input type="text" name="name" id="name_input">
            <input type="submit" value="Submit">
         </form>
      <?php } ?>
   </body>
</html>
