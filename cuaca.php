<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Weather Report</title>
</head>
<body>
    
<?php
    session_start();
    $arr=array(
        "Albury",
        "Badgerys Creek",
        "Cobar",
        "Coffs Harbour",
        "Moree",
        "Newcastle",
        "Norah Head",
        "Norfolk Island",
        "Penrith",
        "Richmond",
        "Sydney",
        "Sydney Airport",
        "Wagga Wagga",
        "Williamtown",
        "Wollongong",
        "Canberra",
        "Tuggeranong",
        "Mount Ginini",
        "Ballarat",
        "Bendigo",
        "Sale",
        "Melbourne Airport",
        "Melbourne",
        "Mildura",
        "Nhil",
        "Portland",
        "Watsonia",
        "Dartmoor",
        "Brisbane",
        "Cairns",
        "Gold Coast",
        "Townsville",
        "Adelaide",
        "Mount Gambier",
        "Nuriootpa",
        "Woomera",
        "Albany",
        "Witchcliffe",
        "Pearce RAAF",
        "Perth Airport",
        "Perth",
        "Salmon Gums",
        "Walpole",
        "Hobart",
        "Launceston",
        "Alice Springs",
        "Darwin",
        "Katherine",
        "Uluru"
    );

    $ada=false;    
    if(isset($_GET["city"])){
        $city=$_GET["city"];
        foreach($arr as $c){
            if($c==$city){
                $ada=true;
                break;
            }
        }
        if($ada==false){
            echo "<script>
            window.location.href='whoops.php'
            </script>";
        }
        else{
            $namaCity=$city;
        }
    }
    
?>

    <nav class="navbar1" style="width:100%;">
        <ul>
            <li><img src="images/logo.png" alt=""></li>
            <form action="cuaca.php" method="get">
                <label for="city"></label>
                <li class=" w3-display-topmiddle srchbar" > <input type="text" name="city" id="city"
                        placeholder="Enter a Country, State, or City"> 
                            <i style="margin-left:0.3rem;" class="fa fa-search srchicon"></i> 
                </li>
            </form>
            <li class="linkhome"><a href="index.php">HOMEPAGE</a></li>
        </ul>
    </nav>
    

    <div id="content" class="w3-center">
        <h1>
            <?php
                if(!is_null($ada) && $ada==true){
                    $_SESSION["city"] = $namaCity;
                    echo "$namaCity";
                }else if(isset($_SESSION["city"])){
                    echo $_SESSION["city"];
                    $namaCity = $_SESSION["city"];
                }
            ?>
        </h1>
        <h3 style="color: black; font-weight: bold;">Weather Info</h3>

        <div class="" style="display:flex; ">
            <div class="" style="margin-left:1rem; width:50%">
                <h2 style="color: black; font-weight: bold;">Graph Info</h2>
                <!-- <img src="images/grafik.jpg" style="width: 80%; margin: 1.1rem" alt=""> -->
                <?php
                    $ket1 = 'Suhu'; $ket2 = 'WindSpeed'; $ket3 = 'Humidity'; $ket4 = 'Rainfall';
                    $kota = str_replace(" ","",$namaCity);
                    if(isset($_POST["from"]) && isset($_POST["to"])){
                        // ini klo udah masukkin rentang tanggalnya
                        $start = $_POST["from"]; $end = $_POST["to"];   //minta tolong dikoreksi ya tktnya salah
                        // var_dump($start);
                        passthru("python grafik.py $kota $start $end");
                    }else{
                        //klo ini diambil berdasarkan tanggal paling terakhir dari csvnya
                        $tanggal = shell_exec(escapeshellcmd("python data_aus.py $kota"));
                        passthru("python grafik.py $kota $tanggal");
                    }
                ?>
                <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                    <button style="background-color: #FCD447;" class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Temperature
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="background-color:#E3F4FE">
                    <div class="accordion-body">
                        <?php
                            echo '<img src="images/Temperatur.png" style="width: 80%; margin: 1.1rem" alt="">';
                        ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button style="background-color: #FCD447;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Windspeed
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="background-color:#E3F4FE">
                    <div class="accordion-body">
                        <?php
                        echo '<img src="images/Windspeed.png" style="width: 80%; margin: 1.1rem" alt="">';
                        ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button style="background-color: #FCD447;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Humidity
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="background-color:#E3F4FE">
                    <div class="accordion-body">
                    <?php
                        echo '<img src="images/Humidity.png" style="width: 80%; margin: 1.1rem" alt="">';
                    ?>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                    <button style="background-color: #FCD447;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Rainfall
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="background-color:#E3F4FE">
                    <div class="accordion-body">
                        <?php
                        echo '<img src="images/Rainfall.png" style="width: 80%; margin: 1.1rem" alt="">';
                        ?>
                    </div>
                    </div>
                </div>
                </div>
               
                <!-- <div class="accordion accordion-flush mx-auto" id="accordionPanelsStayOpenExample" style="width: 100%;">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne" style="background-color: #FCD447;">
                            Temperature
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="background-color: #f4ebe1;">
                            <div class="ms-5">
                                <?php
                                    //echo '<img src="images/Temperatur.png" style="width: 80%; margin: 1.1rem" alt="">';
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo" style="background-color: #FCD447;">
                            Windspeed
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="background-color: #f4ebe1;">
                            <div class="ms-5">
                            <?php
                                   //echo '<img src="images/Windspeed.png" style="width: 80%; margin: 1.1rem" alt="">';
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree" style="background-color: #FCD447;">
                            Humidity
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="background-color: #f4ebe1;">
                            <div class="ms-5">
                            <?php
                                    //echo '<img src="images/Humidity.png" style="width: 80%; margin: 1.1rem" alt="">';
                                ?>
                            </div>
                        </div>
                        </div>
                    </div> <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                        <button class="accordion-button collapsed fs-4" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour" style="background-color: #FCD447;">
                        Rainfall
                        </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="background-color: #f4ebe1;">
                            <div class="ms-5">
                            <?php
                                    //echo '<img src="images/Rainfall.png" style="width: 80%; margin: 1.1rem" alt="">';
                                ?>
                            </div>
                        </div>
                        </div>
                    </div>
                </div> -->
            </div>
                
            <div class="" style="margin-left:10rem;">
                <h2 style="color: black; font-weight: bold;">Range of Date</h2>
                <form id="form" action="cuaca.php" method="POST">
                    <label for="from">From:</label>
                    <input type="date" id="from" name="from">
                    
                    <label style="margin-left: 2rem;" for="to">To:</label>
                    <input type="date" id="to" name="to">
                    <!-- <input type="submit" value="Submit"> -->
                     <button type="button" onclick="submit()"></button>
                     <script>
                         function submit(){
                             console.log("asup");
                             var from=document.getElementById("from").value;
                             var to=document.getElementById("to").value;
                            if(from.getTime()>to.getTime()){
                                alert("From date must be less than to date");
                            }
                            else{
                                document.getElementById("form").submit;
                            }
                         }
                     </script>
                </form>
            </div>
        </div>

        <div>
            
            <h2 style="color: black; font-weight: bold;">Table Info</h2>

            <table id="tabel">

                <tr>
                  <th>Date</th>
                  <th>Temperature</th>
                  <th>Wind Speed</th>
                  <th>Humidity</th>
                  <th>Rainfall</th>
                </tr>

                <?php
                    $ket1 = 'Suhu'; $ket2 = 'WindSpeed'; $ket3 = 'Humidity'; $ket4 = 'Rainfall';
                    $kota = str_replace(" ","",$namaCity);
                    if(isset($_POST["from"]) && isset($_POST["to"])){
                        // ini klo udah masukkin rentang tanggalnya
                        $start = $_POST["from"]; $end = $_POST["to"];   //minta tolong dikoreksi ya tktnya salah
                        $tanggal = date_format(date_create($start), 'm/d/Y');
                        $end = date_format(date_create($end), 'm/d/Y');
                        $end = date('m/d/Y', strtotime('+1 days', strtotime($end)));
                        while($tanggal != $end){                  //looping tabel
                            //ini bwt nampilin atribut bwt tiap tanggal, gtw hrs pake passthru ato shell_exec :D
                            $suhu =  shell_exec(escapeshellcmd("python data_aus.py $ket1 $kota $tanggal"));
                            $wind = shell_exec(escapeshellcmd("python data_aus.py $ket2 $kota $tanggal"));
                            $humid = shell_exec(escapeshellcmd("python data_aus.py $ket3 $kota $tanggal"));
                            $rainfall = shell_exec(escapeshellcmd("python data_aus.py $ket4 $kota $tanggal"));
                            echo "
                            <tr>
                                <td>$tanggal</td>
                                <td>$suhu °C</td>
                                <td>$wind km/h</td>
                                <td>$humid %</td>
                                <td>$rainfall mm</td>
                            </tr>
                            ";
                            $tanggal = date('m/d/Y', strtotime('+1 days', strtotime($tanggal)));
                            // $temp = date_add(date_create($temp),date_interval_create_from_date_string("1 days"));       //tanggalnya nambah 1 hari (mulai dari start) tiap kali looping
                            // $tanggal = date_format(date_create($temp),"m/d/Y");                                 //kan kalo di csv format nya bulan/tgl/thn jadi harus di konv (defaultnya thn-bln-tgl)
                            
                        }

                    }else{
                        //klo ini diambil berdasarkan tanggal paling terakhir dari csvnya
                        $tanggal = shell_exec(escapeshellcmd("python data_aus.py $kota"));
                        $suhu = shell_exec(escapeshellcmd("python data_aus.py $ket1 $kota $tanggal"));
                        $wind = shell_exec(escapeshellcmd("python data_aus.py $ket2 $kota $tanggal"));
                        $humid = shell_exec(escapeshellcmd("python data_aus.py $ket3 $kota $tanggal"));
                        $rainfall = shell_exec(escapeshellcmd("python data_aus.py $ket4 $kota $tanggal"));
                        echo "
                        <tr>
                            <td>$tanggal</td>
                            <td>$suhu °C</td>
                            <td>$wind km/h</td>
                            <td>$humid %</td>
                            <td>$rainfall mm</td>
                        </tr>
                        ";
                }
                ?>
                <!-- <tr>
                  <td>23 Nov 2021</td>
                  <td>20 °C</td>
                  <td>23 km/h</td>
                  <td>69%</td>
                  <td>45.2 mm</td>
                </tr>
                <tr>
                  <td>24 Nov 2021</td>
                  <td>25 °C</td>
                  <td>25 km/h</td>
                  <td>50%</td>
                  <td>8.4 mm</td>
                </tr>
                <tr>
                  <td>25 Nov 2021</td>
                  <td>25 °C</td>
                  <td>25 km/h</td>
                  <td>90%</td>
                  <td>1.7 mm</td>
                </tr> -->
              </table>
        </div><br>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <footer>
        <div id="footerKiri">
            <div id="logoFooter">
                <img src="images/nasa.png" alt="logo">
            </div>
            <div id="#tulisanFooterKiri">
                <p>Address: 98 Shirley Street PIMPAMAM QLD 4209</p>
                <p>Instagram: @AusiWeathers</p>
                <p>Contact Us: +612 16969420</p>
            </div>
        </div>
        <div id="footerTengah">
            <img src="images/youtube.png" style="margin-top: 0.5rem; margin-bottom: 0.5rem;" alt="">
            <p style="margin-bottom: 1rem;">https://www.youtube.com/AusiWeathers</p>
            <p style="margin-bottom: 0;">© 2021 AusiWeathers, Inc. "AusiWeathers" design are registered trademarks of
                AusiWeathers, Inc. All </p>
            <p style="margin-bottom: 0;">Rights Reserved</p>
            <p class="w3-display-bottom" style="margin-bottom: 0;">Terms of Use | Privacy Policy | Cookie Policy | TAG
                Disclaimer</p>
        </div>
    </footer>
</body>
</html>