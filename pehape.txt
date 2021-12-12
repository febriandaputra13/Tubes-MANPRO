city not found
<h1>
<?php
    $command = escapeshellcmd("python test.py");
    $output = shell_exec($command);
    echo $output;
?>  
</h1>


<!-- https://trendoceans.com/how-to-run-a-python-script-from-php/ -->
<!-- https://stackoverflow.com/questions/19781768/executing-python-script-with-php-variables/19781913 -->
<?php
 $var1=1;
 $var2=2;
 $output=passthru("python test.py $var1 $var2");
 echo "$output";
?>
