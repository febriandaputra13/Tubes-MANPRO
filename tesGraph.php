<?php
    // //exec('python tesGraph.py', $output);
    // header("Content-type: image/png");
    // $stuff = exec('python tesGraph.py', $output);
    // foreach($output as $key=>$value){
    //     if($key==1)
    //         print chr(0x0D); //Newline feed after PNG declaration
    //     if($key>0)
    //         print "\n";
    //     print $value;
    $rainfall = shell_exec(escapeshellcmd("python grafik.py"));
//}
?>	

