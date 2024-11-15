<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>How to Make a Popup</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <!-- <script defer src="app.js"></script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 100%;
            height: 100vh;
            background: linear-gradient(to right, #485563, #29323c);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn {
            padding: 10px 60px;
            background: #fff;
            border: 0;
            outline: none;
            cursor: pointer;
            font-size: 22px;
            font-weight: 500;
            border-radius: 10px;
            transition: transform 0.2s;
        }

        .btn:active {
            transform: scale(0.95);
        }

        .popup {
            width: 400px;
            background: #fff;
            -webkit-border-radius: 6px;
            -moz-border-radius: 6px;
            border-radius: 6px;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.1);
            text-align: center;
            padding: 0 30px 60px;
            color: #333;
            visibility: hidden;
        }

        .open-popup {
            visibility: visible;
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .popup h2 {
            font-size: 38px;
            font-weight: 500;
            margin: 30px 0 10px;
        }

        .popup button {
            width: 100%;
            margin-top: 50px;
            padding: 10px 0;
            background-color: #e02189;
            color: #fff;
            border: 0;
            outline: none;
            font-size: 18px;
            border-radius: 4px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container">
        <button type="submit" class="btn" onclick="openPopup()">Submit</button>
        <div class="popup" id="popup">
            <img src="img/tick.png" alt="">
            <h2>Thank You!</h2>
            <p>Your Details has been Succesfully Submitted. Thanks!</p>
            <button type="button" onclick="closePopup()">OK</button>
        </div>

    </div>

    <script>
        let popup = document.getElementById('popup')

        function openPopup() {
            popup.classList.add('open-popup')
        }

        function closePopup() {
            popup.classList.remove('open-popup')
        }
    </script>

</body>

</html>