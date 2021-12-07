<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    
<?php
    $arr=array(
        "Albury",
        "Badgerys Creek",
        "Cobar",
        "Coffs Harbour",
        "Moree",
        "Newcastle",
        "NorahHead",
        "Norfolk Island",
        "Penrith",
        "Richmond",
        "Sydney",
        "Sydney Airport",
        "WaggaWagga",
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
        "GoldCoast",
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
    if(isset($_GET["city"])){
        $city=$_GET["city"];
        $ada=false;
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

    <nav class="navbar">
        <ul>

            <li><img src="images/logo.png" alt=""></li>

            <form>
                <li class=" w3-display-topmiddle srchbar"> <input type="text"
                        placeholder="Enter a Country, State, or City"> <i class="fa fa-search srchicon"></i> </li>
            </form>
            <li class="linkhome"><a href="">HOMEPAGE</a></li>
        </ul>
    </nav>
    

    <div id="content" class="w3-center">
        <h1>
            <?php
                if($ada==true){
                    echo "$namaCity";
                }
            ?>
        </h1>
        <h3 style="color: black; font-weight: bold;">Weather Info</h3>

        <div class="" style="display:flex; ">
            <div class="" style="margin-left:1rem;">
                <h2 style="color: black; font-weight: bold;">Graph Info</h2>
                <img src="images/grafik.jpg" style="width: 80%; margin: 1.1rem" alt="">
            </div>

            <div class="" style="margin-left:10rem;">
                <h2 style="color: black; font-weight: bold;">Range of Date</h2>
                <form action="">
                    <label for="from">From:</label>
                    <input type="date" id="from" name="from">
                    
                    <label style="margin-left: 2rem;" for="to">To:</label>
                    <input type="date" id="from" name="to">
                    <input type="submit" value="Submit">
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
                <tr>
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
                </tr>
              </table>
        </div><br>

        
    </div>

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