<!DOCTYPE html>
<html>
<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  var videoFileName;
  function loadVid(videoFileName) {
    $('.container').append('<video width="100%" height="auto" controls><source src="' + videoFileName + '" type="video/mp4"></video>');
  };
  </script>
  <?php
    function writeVidList() {
      $fileArray = array();
      $videoDir = opendir('video');
      while (($file = readdir($videoDir)) !== false) {
        if ($file != '.' && $file != '..') {
          
          $removeExt = explode('.mp4',$file);
          $removeSpaces = explode(' ',$file);
          $extRemoved = implode('',$removeExt);
          
          array_push($fileArray,$file);
        }
      }
      sort($fileArray);
      for ($x = 0; $x <= count($fileArray); $x++) {
        echo '<li onclick="loadVid(' . $fileArray . ')">' . $fileArray[$x] . "</li>\n\t";
      }
    }
  ?>
</head>
<body>
  <div class="container"></div>
  <ul>
    <?php writeVidList() ?></ul>
</body>
</html>