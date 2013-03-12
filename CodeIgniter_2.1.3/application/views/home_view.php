
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <body>
   <h2>Welcome <?php echo $username; ?>!</h2><br>
   <a href='home/makeEsl'>Generate an ESL<a><br><br>

   ESLs:<br>
   <?php foreach ($esls as $esl):
            echo $esl['esl']."<br>";
         endforeach; ?>
   
   <br><a href="home/logout">Logout</a>
 </body>
</html>


