<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Homepage</title>
</head>
<?php
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

   $city1=$arr[rand(0,48)];

   $city2=$arr[rand(0,48)];
   //while ini buat supaya city 2 ga bakal sama kaya city 1
   while($city2==$city1){
    $city2=$arr[rand(0,48)];
   }

   $city3=$arr[rand(0,48)];
   while($city3==$city1&&$city3==$city2){
    $city3=$arr[rand(0,48)];
   }

   $city4=$arr[rand(0,48)];
   while($city4==$city3&&$city4==$city2&&$city4==$city1){
    $city4=$arr[rand(0,48)];
   }
?>
<body>


    <nav class="navbar">
        <ul>
            <li><img src="images/logo.png" alt=""></li>
            <form action="cuaca.php" method="get">
                <label for="city"></label>
                <li class=" w3-display-topmiddle srchbar" > <input type="text" name="city" id="city"
                        placeholder="Enter a Country, State, or City"> 
                        <button style="background-color:Transparent; width:1rem; " >
                            <i style="margin-left:1rem;" class="fa fa-search srchicon"></i>
                        </button> 
                </li>
            </form>
            <li class="linkhome"><a href="index.php">HOMEPAGE</a></li>
        </ul>
    </nav>

    <div id="content" class="w3-center">
        <h1>WEATHER TODAY</h1>
        <div class="kotakluar w3-center">
            <div class="cardContainer" style="display:flex;">
                <!-- COL 1 -->
                
                <div class="w3-card-2 w3-center kotak" 
                    style="width: 17%; cursor: pointer;">

                    <form action="cuaca.php" method="get">
                    <h3 class="font"><?php echo($city1) ?></h3>

                    <?php
<<<<<<< Updated upstream
                        // $cuaca = "Hujan";
                        $ket = 'Cuaca';
                        $cuaca = passthru("python data_aus.py $ket $city1");
=======
                        $keterangan = "Suhu";
                        $cuaca = passthru("python data_aus.py $kota $keterangan");
                        var_dump($cuaca);
>>>>>>> Stashed changes
                        if($cuaca == "Cerah"){
                            echo "<img src='images/cerah.png' style='width: 50%;' alt=''>";
                        }else{
                            echo "<img src='images/hujan.png' style='width: 50%;' alt=''>";
                        }
                    ?>
                    

                    <div class="suhu w3-center">
                        <img src="images/temperature.png" style="width: 7%;" alt="">
                        <span class="font"><?php 
                        $ket = 'Suhu';
                        $suhu = passthru("python data_aus.py $ket $city1");
                        echo "$suhu";?></span>
                    </div>

                    <h3 class="w3-center font"><?php echo "$cuaca";?></h3>
                    <input type="hidden" value="<?php echo($city1) ?>" name="city" style="display:'none'">
                    </form>

                </div>
                <!-- COL 2 -->
                <div class="w3-card-2 w3-center kotak" 
                    style="width: 17%; cursor: pointer;">

                    <form action="cuaca.php" method="get">
                    <h3 class="font"><?php echo($city2) ?></h3>
                    
                    <?php
                        $ket = 'Cuaca';
                        $cuaca = passthru("python data_aus.py $ket $city2");
                        if($cuaca == "Cerah"){
                            echo "<img src='images/cerah.png' style='width: 50%;' alt=''>";
                        }else{
                            echo "<img src='images/hujan.png' style='width: 50%;' alt=''>";
                        }
                    ?>

                    <div class="suhu w3-center">
                        <img src="images/temperature.png" style="width: 7%;" alt="">
                        <span class="font"><?php $ket = 'Suhu';
                        $suhu = passthru("python data_aus.py $ket $city2");
                        echo "$suhu";?></span>
                    </div>

                   <h3 class="w3-center font"><?php echo "$cuaca";?></h3>
                    <input type="hidden" value="<?php echo($city2) ?>" name="city" style="display:'none'">
                    </form>

                </div>
                <!-- COL 3 -->
                <div class="w3-card-2 w3-center kotak" 
                    style="width: 17%; cursor: pointer;">

                    <form action="cuaca.php" method="get">
                    <h3 class="font"><?php echo($city3) ?></h3>
                   
                    <?php
                        $ket = 'Cuaca';
                        $cuaca = passthru("python data_aus.py $ket $city3");
                        if($cuaca == "Cerah"){
                            echo "<img src='images/cerah.png' style='width: 50%;' alt=''>";
                        }else{
                            echo "<img src='images/hujan.png' style='width: 50%;' alt=''>";
                        }
                    ?>

                    <div class="suhu w3-center">
                        <img src="images/temperature.png" style="width: 7%;" alt="">
                        <span class="font"><?php $ket = 'Suhu';
                        $suhu = passthru("python data_aus.py $ket $city3");
                        echo "$suhu";?></span>
                    </div>

                     <h3 class="w3-center font"><?php echo "$cuaca";?></h3>
                    <input type="hidden" value="<?php echo($city3) ?>" name="city" style="display:'none'">
                    </form>

                </div>
                <!-- COL 4 -->
                <div class="w3-card-2 w3-center kotak" 
                    style="width: 17%; cursor: pointer;">

                    <form action="cuaca.php" method="get">
                    <h3 class="font"><?php echo($city4) ?></h3>
                   
                    <?php
                        $ket = 'Cuaca';
                        $cuaca = passthru("python data_aus.py $ket $city4");
                        if($cuaca == "Cerah"){
                            echo "<img src='images/cerah.png' style='width: 50%;' alt=''>";
                        }else{
                            echo "<img src='images/hujan.png' style='width: 50%;' alt=''>";
                        }
                    ?>

                    <div class="suhu w3-center">
                        <img src="images/temperature.png" style="width: 7%;" alt="">
                        <span class="font"><?php $ket = 'Suhu';
                        $suhu = passthru("python data_aus.py $ket $city4");
                        echo "$suhu";?></span>
                    </div>

                      <h3 class="w3-center font"><?php echo "$cuaca";?></h3>
                    <input type="hidden" value="<?php echo($city4) ?>" name="city" style="display:'none'">
                    </form>

                </div>
            </div>
        </div>

        <div class="ramalan">
            <h2 style="font-weight: bold;">WEATHER FORECAST</h2>

            <div class="forecast">
                <form action="weather_prediction.php" method="get">
                    <table>
                        <tr>
                            <td style="width: 50%;">
                                <label for="rainfall">Rainfall</label>
                            </td>
                            <td>
                                <input type="text" style="width: 80%;" name="rainfall" id="rainfall">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%;">
                                <label for="sunshine">Sunshine</label>
                            </td>
                            <td>
                                <input type="text" style="width: 80%;" name="sunshine" id="sunshine">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="humidity9am">Humidity 9 A.M.</label>
                            </td>
                            <td>
                                <input type="text" style="width: 80%;" name="humidity9am" id="humidity9am">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="humidity3pm">Humidity 3 P.M.</label>
                            </td>
                            <td>
                                <input type="text" style="width: 80%;" name="humidity3pm" id="humidity3pm">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="cloud3pm">Cloud 3 P.M.</label>
                            </td>
                            <td>
                                <input type="text" style="width: 80%;" name="cloud3pm" id="cloud3pm">
                            </td>
                        </tr>

                    </table>

                    <button class="w3-button w3-white w3-round-xxlarge btnforecast" type="submit">submit</button>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <div id="footerKiri">
            <div id="logoFooter">
                <img src="images/logo.png" alt="logo">
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

    <script>
        let container = document.querySelector('.cardContainer').children;
        console.log(container);
        for (i = 0; i < container.length; i++) {
            let card = container[i].firstElementChild;
            console.log(card);
            container[i].addEventListener("click", function () {
                card.submit();
            })
        }
    </script>

</body>

</html>