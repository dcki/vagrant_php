<!doctype html>
<html>
   <head>
      <meta charset="utf-8">
   </head>
   <body>
      <h1><a href="/">Homepage</a></h1>
      <p><a href="/test">Tests</a></p>
      <p>愛</p>
      <p>(Click the cat. &lt;input type=&quot;image&quot;&gt;. Could be used for a server side color picker, for example.)</p>
      <form action="/" method="post">
         <label for="name_input">What is your name?</label>
         <input type="text" name="name" id="name_input">
         <input type="image" src="/public/images/cat.png" name="image_input" />
         <input type="submit" value="Submit">
      </form>
      <?php if (!empty($name)) { ?>
         <p>Hello <?= $name ?></p>
      <?php } ?>
      <?php if (!empty($Image)) { ?>
         <p>You clicked at (<?= $Image->x ?>,<?= $Image->y ?>)</p>
      <?php } ?>
   </body>
</html>
