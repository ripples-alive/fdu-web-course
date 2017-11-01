<head>
    <title>FCKEditor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>Level 7</h1>

<?php
// if (!isset($_SERVER['PHP_AUTH_USER'])) {
//    header('WWW-Authenticate: Basic realm="My Realm"');
//    header('HTTP/1.0 401 Unauthorized');
//    echo 'Text to send if user hits Cancel button';
//    exit;
//  } else {
   $flag = "*CTF{FCKEDITOR_UPLOADING}";
  //  if ($_SERVER['PHP_AUTH_USER']=="level7" && $_SERVER['PHP_AUTH_PW']=="SHELLLLLLLLL") {
     if ($_FILES["file"]["name"] != '') {
        if ($_FILES["file"]["error"] > 0) {
          echo "Error: " . $_FILES["file"]["error"] . "<br />";
        }else {
          echo "Upload: " . $_FILES["file"]["name"] . "<br />";
          echo "Type: " . $_FILES["file"]["type"] . "<br />";
          echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
          echo "Stored in: " . $_FILES["file"]["tmp_name"]. "<br>";

          if ($_FILES["file"]["type"] == "image/jpeg") {
            if (file_exists("upload/" . $_FILES["file"]["name"])) {
              echo $_FILES["file"]["name"] . " already exists. ";
            }
            else{
              move_uploaded_file($_FILES["file"]["tmp_name"],
              "upload/" . $_FILES["file"]["name"]);
              echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            }
          } else {
            echo "Invalid file<br>";
          }
        }
      } else {
        ?>
        <div class="">
          JPEG wanted
        </div>
        <form action="index.php" method="post"
        enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file" />
        <br />
        <input type="submit" name="submit" value="Submit" />
        </form>
        <?php
      }
 //   } else {
 //     header('WWW-Authenticate: Basic realm="My Realm"');
 //     header('HTTP/1.0 401 Unauthorized');
 //     echo 'Wrong Credentials';
 //   }
 // }
?>
