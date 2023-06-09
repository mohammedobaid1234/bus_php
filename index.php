<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start</title>
    <style>
        body{
            background-color: #3a727f;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn{
            width: 400px;
            height: 400px;
            margin-top: 10%;
            background-color: rgb(255, 255, 255);
            border-radius: 15px;
            position: relative;
        }

        img{
            width: 150px;
            margin-left: 30%;
        }

        a{
            display: block;
            margin: 10px;
            text-decoration: none;
            margin-left: 30%;
            margin-top: 5%;
        }

        button {
            display: flex;
            align-items: center;
            justify-content: center;
            outline: none;
            cursor: pointer;
            width: 150px;
            height: 50px;
            background-image: linear-gradient(to top, #D8D9DB 0%, #fff 80%, #FDFDFD 100%);
            border-radius: 30px;
            border: 1px solid #3a727f;
            transition: all 0.2s ease;
            font-family: "Source Sans Pro", sans-serif;
            font-size: 14px;
            font-weight: 600;
            color: #606060;
            text-shadow: 0 1px #fff;
        }

        button:hover {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 3px 3px #CECFD1;
        }

        button:active {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
        }

        button:focus {
            box-shadow: 0 4px 3px 1px #FCFCFC, 0 6px 8px #D6D7D9, 0 -4px 4px #CECFD1, 0 -6px 4px #FEFEFE, inset 0 0 5px 3px #999, inset 0 0 30px #aaa;
        }



    </style>
</head>
<body>
<div class="btn">
    <img src="assets/imgs/logo.png" alt="">
    <a href="./student/index.php"><button>STUDENT</button></a>
    <a href="./driver/index.php"><button>DRIVER</button></a>
    <a href="./admin/index.php"><button>ADMIN</button></a>
</div>
</body>
</html>