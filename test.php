<?php
    $var1 = 5;
    $command = escapeshellcmd("python coba.py $var1");
    $output = shell_exec($command);
    echo "$output";
    echo "aa";
?>