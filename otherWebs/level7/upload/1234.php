<?php
    echo "Hello";
    $output = shell_exec("ls");
    echo "<h>".$output."</h>";
?>
