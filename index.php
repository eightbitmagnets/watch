<!DOCTYPE html>
<html>

<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    function writeVidList() {
      var vidList = [
             <?php
              function makeVidList() {
                $fileArray = array();
                $videoDir = opendir('video');
                while (($file = readdir($videoDir)) !== false) {
                  if ($file != '.' && $file != '..') {
                    array_push($fileArray,$file);
                  }
                }
                sort($fileArray);
                $x = 0;
                foreach ($fileArray as $value) {
                  echo $fileArray[$x] . ', ';
                  $x ++;
                }
              }
            ?>];
      
      var sortedArray = <?php $fileArray ?>;
      
      $('ul').append('<li onclick="loadVid()"></li>');
      console.log(sortedArray);
    };
    
    function loadVid(arg) {
      var vidURL = encodeURIComponent(arg);
      $('.container').append('<video width="100%" height="auto" controls><source src="' + vidURL + '" type="video/mp4"></video>');
    };
  </script>
</head>

<body>
  <div class="container"></div>
  <ul>
    <?php makeVidList() ?>
    <script>writeVidList();</script>
  </ul>
</body>

</html>