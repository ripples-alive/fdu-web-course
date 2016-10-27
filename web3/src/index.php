<head>
    <title>Cascading Style Sheets</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<h1>XSS</h1>

<?php
     if (isset($_POST["advice"])) {
      function filter($string) {
        $string = str_ireplace("<script", '', $string);
        $string = str_ireplace("</script>", '', $string);
        $string = str_ireplace("<img", '', $string);
        $string = str_ireplace("</img>", '', $string);
        $string = str_ireplace("<input",'', $string);
        $string = str_ireplace("</input>",'', $string);
        return $string;
      }
      // echo $_POST["advice"]."<br>";
      $advice = $_POST["advice"];
      while (filter($advice) != $advice) {
        $advice = filter($advice);
      }
      // echo htmlspecialchars($advice)."<br>";

      file_put_contents("advices", $advice."\n");
      //  echo htmlspecialchars($_POST["advice"]);

      echo "advice: \"".htmlspecialchars($advice)."\" posted.<br>";
       echo "Submit success, waiting for administrator to read";
       ?>
       <form name="advice" method="post">
        <input type="text" name="advice" placeholder="advice here">
        <input type="submit">
       </form>
       <?php
     } else {
       ?>
       <em>Any advice for administrator?</em>
       <form name="advice" method="post">
        <input type="text" name="advice" placeholder="advice here">
        <input type="submit">
       </form>
       <?php
     }
?>
