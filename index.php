<!DOCTYPE html>
<html>
<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
  function loadVid(videoFileName) {
    $('.container').append('<video width="100%" height="auto" controls><source src="video/' + videoFileName + '" type="video/mp4"></video>');
  };
  </script>
  <?php
    function writeVidList() {
      chdir('video');
      $d = dir(getcwd());
      while (($file = $d->read()) !== false) {
        if (strlen($file) > 2) {
          $removeExt = explode('.mp4',$file);
          $removeSpaces = explode(' ',$file);
          $extRemoved = implode('',$removeExt);
          $addHtmlSpaces = implode('%20;',$removeSpaces);
          echo '<li onclick="loadVid(' . $addHtmlSpaces . ')">' . $extRemoved . "</li>\n\t";
        }
      }
    }
  ?>
</head>
<body>
  <ul>
    <?php writeVidList() ?></ul>
  <div class="container"></div>
</body>
</html>