<head>
    <title>AdminForXss</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<script>
  console.log("pahntom");
</script>

<?php
  $advices = file_get_contents(advices);
  $advices_arr = explode("\n", $advices);
  foreach ($advices_arr as $advice) {
    echo "<div>$advice</div>";
  }
?>
