<!DOCTYPE html>
<html>
<body>

<?php
 $series = array
   (
   array('title'=>'The Walking Dead', 'thumb'=>'thumbs/twd.jpg'),
   array('title'=>'Better Call Saul', 'thumb'=>'thumbs/bcs.jpg')
 );
  
  echo '<h1>' . $series[0]['title'] . '</h1>' . '<br>';
  echo '<img src="' . $series[0]['thumb'] . '" />' . '<br>';
  echo '<h1>' . $series[1]['title'] . '</h1>' . '<br>';
  echo '<img src="' . $series[1]['thumb'] . '" />' . '<br>';
?> 

</body>
</html>