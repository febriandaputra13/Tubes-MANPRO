<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Weather Report</title>
</head>
<body>
    
    <!-- <div id="content" class="w3-center">
        <h1>
            TEST
        </h1>
       <?php



            // $res=passthru("python test.py");
            // echo "$res";
            $var1=11;
            $var2=222;
            $var3=69;
            $command=escapeshellcmd("python test.py $var1 $var2 $var3");
            $res=shell_exec($command);
            // echo($res[4]);
            // if($res[4]==' '){
            //     echo "space";
            // }
            $str="";
            $i=1;
            while($i<strlen($res)){
                while(($res[$i]!=','&&$res[$i]!=']'&&$res[$i]!=' ')&&$i<13){
                    $str=$str.$res[$i];
                     $i+=1;
                }
                if($str!=""){
                    $angka=(int)$str;
                    $str="";
                    echo "$angka\n";
                }
                $i+=1;
            }
            
       ?>

        
    </div> -->

   
</body>
</html>

<?php
    // $var1 = 5;
    // $command = escapeshellcmd("python coba.py $var1");
    // $output = shell_exec($command);
    // echo "$output";
    // echo "aa";
    // $tgl1 = "2013-1-3";// pendefinisian tanggal awal
    // $tgl2 = date('m/d/Y', strtotime('+1 days', strtotime($tgl1))); //operasi penjumlahan tanggal sebanyak 6 hari
    // echo $tgl2."<br>"; //print tanggal
    // $tgl2 = "5/12/2021";
    // $tgl2 = date('m/d/Y', strtotime('+1 days', strtotime($tgl2))); //operasi penjumlahan tanggal sebanyak 6 hari
    // echo substr($tgl2,1); //print tanggal

    $str = "96% Not Raining";
    $pattern = "/Not Raining/i";
    $res = preg_match("/Not Raining/i", $str); 
    echo $res;
    
?>

