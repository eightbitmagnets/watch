<!DOCTYPE html>
<html>
<head>
  <title>Watch</title>
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
          $addHtmlSpaces = implode('&nbsp;',$removeSpaces);
          echo '<li onclick="loadVid(' . $addHtmlSpaces . ')">' . $extRemoved . '</li>';
        }
      }
    }
  
    /*function loadVid($fileName) {
        echo '<video width="100%" height"auto" controls><source src="video/' . $fileName . '" type="video/mp4"></video>';
    }*/
  ?>
</head>
<body style="background-color:black;">
  
  <ul style="color:pink;">
    <?php writeVidList() ?>
  </ul> 
    
  <div class="container" style="margin:0 auto;width:80%;height:auto;">
    
  </div>
</body>
</html>