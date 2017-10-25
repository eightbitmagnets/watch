<!DOCTYPE html>
<html>
<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  function loadVid(videoFileName) {
    $('.container').append('<video width="100%" height="auto" controls><source src="' + videoFileName + '" type="video/mp4"></video>');
  };
  </script>
  <?php
    function writeVidList() {
      $videoDir = opendir('video');
      while (($file = readdir($videoDir)) !== false) {
        if ($file != '.' && $file != '..') {
          $removeExt = explode('.mp4',$file);
          $removeSpaces = explode(' ',$file);
          $extRemoved = implode('',$removeExt);
          $addHtmlSpaces = implode('%20',$removeSpaces);
          echo '<li onclick="loadVid(' . $file . ')">' . $extRemoved . "</li>\n\t";
        }
      }
    }f
  ?>
</head>
<body>
  <div class="container"></div>
  <ul>
    <?php writeVidList() ?></ul>
</body>
</html>