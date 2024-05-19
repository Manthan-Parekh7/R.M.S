<?php
if (isset($_GET['eid'])) {
    $email = base64_decode(urldecode($_GET['eid']));
    $session_name = "user_" . md5($email); // Create the unique session name
    session_name($session_name); // Set the session name
    session_start(); // Start the session
} else {
    header("Location: login1.php?message=Please Login First!!");
    exit();
}
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="shortcut icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmUUSo7THCDrJG629AyXKTeQr1Cl-CpU6jgQ4WD63gmZYyrvU6SrKx17XxiIH7D8z7M_w&usqp=CAU">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <style>
            body {
                /* background: url(https://img.freepik.com/premium-vector/night-scene-empty-road-with-forest-mountain_104785-806.jpg)no-repeat center center/cover; */
                background-color: rgb(232, 229, 229);
                min-height: 100vh;
            }

            .navbar a {
                font-size: 25px;
                color: black;
                text-decoration: none;
            }

            .about,
            .logout {
                list-style: none;
                padding: 0px 15px;
            }

            .icon {
                margin-right: auto;
            }

            .navbar {
                display: flex;
                box-sizing: border-box;
                background-color: white;
                box-shadow: 1px 1px 10px black;
                backdrop-filter: blur(20px);
                height: 70px;
                margin: -7px -7px 0px -7px;
                padding-right: 20px;
                padding-top: 5px;
                width: 100%;
                justify-content: end;
                align-items: center;
                position: fixed;
            }

            .navbar a:hover {
                cursor: pointer;
                color: rgb(13, 81, 253);
            }

            .navbar i {
                font-size: 30px;
                display: flex;
            }

            .heading {
                color: black;
                font-size: 60px;
                display: grid;
                grid-template-columns: 1fr;
                text-align: center;
                font-weight: bolder;
                font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            }

            p {
                margin-top: 100px;
            }

            .restaurant {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                text-align: center;
                grid-column-gap: 100px;
                grid-row-gap: 10px;
                margin: -20px 50px 50px 50px;
            }

            .box {
                height: 50px;
                background-color: gray;
                color: white;
                margin-bottom: 80px;
                display: grid;
                grid-template-columns: 3fr 1fr;
                align-items: center;
            }

            .boxs {
                height: 350px;
                background-color: black;
                color: white;
            }

            .box .name {
                font-size: 20px;
                color: black;
                font-weight: bolder;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            button a {
                text-decoration: none;
                font-size: 20px;
                padding: 20px;
                color: black;
                font-weight: bolder;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }

            button {
                border: 3px solid black;
                box-shadow: 3px 3px 10px black;
                height: 50px;
            }
        </style>
    </head>

    <body>
        <div class="container1">
            <ul class="navbar">
                <div class="icon">
                    <a href="home.html"><img src="logo.jpg" height="50" width="50"></a>
                </div>
                <div class="about">
                    <a href="about.html">About Us</a>
                </div>
                <div class="logout">
                    <a href="logout.php?eid=<?php echo $_GET['eid']; ?>">Log Out</a>
                </div>
            </ul>
        </div>

        <div class="heading">
            <p>Restaurants</p>
        </div>
        <div class="restaurant">
            <div class="boxs" id="box1"></div>
            <div class="boxs" id="box2"></div>
            <div class="boxs" id="box3"></div>
            <div class="box" id="box4">
                <div class="name">Restaurant 1</div><button type="submit" class="button"><a href="r1.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
            <div class="box" id="box5">
                <div class="name">Restaurant 2</div><button type="submit" class="button"><a href="r2.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
            <div class="box" id="box6">
                <div class="name">Restaurant 3</div><button type="submit" class="button"><a href="r3.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
            <div class="boxs" id="box7"></div>
            <div class="boxs" id="box8"></div>
            <div class="boxs" id="box9"></div>
            <div class="box" id="box10">
                <div class="name">Restaurant 4</div><button type="submit" class="button"><a href="r4.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
            <div class="box" id="box11">
                <div class="name">Restaurant 5</div><button type="submit" class="button"><a href="r5.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
            <div class="box" id="box12">
                <div class="name">Restaurant 6</div><button type="submit" class="button"><a href="r6.php?email=<?php echo $_GET["eid"] ?>">GO</a></button>
            </div>
        </div>
    </body>

    </html>