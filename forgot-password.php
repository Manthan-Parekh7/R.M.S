<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>You can reset your password by sending email address</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: "Poppins", sans-serif;
            background: url(https://img.freepik.com/premium-vector/night-scene-empty-road-with-forest-mountain_104785-806.jpg)no-repeat center center/cover;
            color: whitesmoke;
        }
        .container{
            width: 70vw;
            color: whitesmoke;
            border: 2px solid gray;
            backdrop-filter: blur(20px);
            background: transparent;
            box-shadow: 0 0 10px black;
            border-radius: 25px;
            padding:30px 40px; 
        }

        h3 {
            text-align: center;
            font-size: 50px;
        }

        input {
            /* width: auto; */
            height: 30px;
            font-family: "Poppins", sans-serif;
            background: transparent;
            border: 2px solid gray;
            border-radius: 30px;
            font-size: 20px;
            color: white;
            padding: 20px;
        }

        input::placeholder {
            color: gray;

        }
        input:focus{
            width: 450px;
            transition: all 2s ease-in-out;
        }
        label{
            font-size: 30px
        }
        button {
            display: block;
            margin: 30px;
            width: 100%;
            height: 40px;
            font-size: 30px;
            background-color: gray;
            border: 1px solid black;
            border-radius: 50px;
            box-shadow: 0px 0px 10px black;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background-color: whitesmoke;
        }
    </style>
</head>
<body>
    <form action="send-password-reset.php" method="post" autocomplete="off">
        <div class="container">
            <h3>Forgot Your Password?</h3>
            <label for="email">Enter Your Registered Email Id : </label>
            <input type="email" name="email" id="email" placeholder="Enter Your Email Here : " autocomplete="off" required>
            <button type="submit">Send</button>
        </div>

    </form>
</body>

</html>