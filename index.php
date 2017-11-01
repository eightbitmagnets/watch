<!DOCT YPE html>
<html>

<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php
      $fileArray = array();
      $videoDir = opendir('video');
      while (($file = readdir($videoDir)) !== false) {
        if ($file != '.' && $file != '..') {
          array_push($fileArray,$file);
        }
      }
      sort($fileArray);
      $jsonFileArray = json_encode($fileArray);
  ?>
  <script>
    var vidList = [<?php echo trim($jsonFileArray, '[]'); ?>];
    console.log(vidList.length);
    
    $(document).ready(function() {
      $('li').click(function() {
        var thisID = $(this).attr('id');
        console.log(thisID);
        $('.container').empty();
        $('.container').append('<video width="100%" height="auto" controls><source src="video/' + thisID + '" type="video/mp4"></video>');
      });
    });
    
    function writeVidList() {
      for (i = 0; i < vidList.length; i++) {
        var vidURL = 'video/' + vidList[i];
        console.log(vidURL);
        $('ul').append('<li id="' + encodeURIComponent(vidList[i]) + '">' + vidList[i] + '</li>'); 
      };
    };
  </script>
</head>

<body>
  <div class="container"></div>
  <ul>
    <script>writeVidList();</script>
  </ul>
</body>

</html>