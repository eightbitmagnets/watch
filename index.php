<!DOCT YPE html>
<html>

<head>
  <title>Watch</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <?php
    $fileArray = array();
    $dirArray = array();
    // Search video directory for all mp4 files
    foreach(glob('video/*.mp4') as $file) {
      $file = ltrim($file,'video/');
      array_push($fileArray, $file);
    }
    // Search video directory for other directories
    foreach(glob('video/*',GLOB_ONLYDIR) as $dirs) {
      $dirs = ltrim($dirs, 'video/');
      array_push($dirArray, $dirs);
    }
    // Sort alphabetically and encode for use by JS
    sort($fileArray);
    sort($dirArray);
    $jsonFileArray = json_encode($fileArray);
    $jsonDirArray = json_encode($dirArray);
  ?>
  <script>
    // Bring PHP arrays into JS
    var vidList = [<?php echo trim($jsonFileArray, '[]'); ?>],
        dirList = [<?php echo trim($jsonDirArray, '[]'); ?>];
    console.log(vidList);
    console.log(dirList);
    
    $(document).ready(function() {
      $('li').click(function() {
        var thisID = $(this).attr('id'),
            thisIDsplit = thisID.split('.'),
            thisIDname = thisIDsplit[0],
            thisIDext = thisIDsplit[1];
        if (thisIDext == 'mp4') {
          console.log(thisID);
          console.log(thisIDname);
          console.log(thisIDext);
          $('.container').empty();
          $('.container').append('<video controls><source src="video/' + thisID + '" type="video/mp4"></video>');
        } else {
          $('.container').empty();
          $('li').append('<ol id="' + thisID + '"></ol>');
          $('ol').append('<li>TEST</li>');
        };
      });
    });
    
    function writeVidList() {
      for (i = 0; i < dirList.length; i++) {
        var vidURL = 'video/' + dirList[i];
        console.log(vidURL);
        $('ul').append('<li id="' + encodeURIComponent(dirList[i]) + '">' + dirList[i] + '</li>');
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