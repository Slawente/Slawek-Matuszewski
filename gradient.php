<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
        }
        #lin{
            color: white;
            width: 500px;
            height: 500px;
            background-image: linear-gradient(to right, black, purple)
        }
        #kol{
            color: white;
            width: 500px;
            height: 500px;
            background-image: radial-gradient(circle, pink, purple, black);
        }
        #con{
            color: white;
            width: 500px;
            height: 500px;
            background-image: conic-gradient(red, yellow, green, blue, red);
        }
        input{
            width: 200px;
            height: 33px;
        }
        button{
            width: 200px;
            height: 33px;
        }
    </style>
</head>
<body>
    <div id="lin">liniowy</div>
    <div id="kol">kolowy</div>
    <div id="con">conic</div>
    <form method="POST">
        <input type="text" list="przegladarki" name="przegladarkiWartosc">
        <datalist id="przegladarki">
            <option value="safari"></option>
            <option value="brave"></option>
            <option value="firefox"></option>
        </datalist>
        <button name="btn1">Button</button>
    </form>
    <?php
    if (isset($_POST["btn1"])){
        $niepowiem = $_POST['przegladarkiWartosc'];
        if ($niepowiem == 'safari'){
            echo "<dt>Safari</dt>";
            echo "<dd>Safari to taka przeglądarka w której się przegląda</dd>";
        }
                if ($niepowiem == 'brave'){
            echo "<dt>Brave</dt>";
            echo "<dd>Brave to taka przeglądarka w której się przegląda</dd>";
        }
                if ($niepowiem == 'firefox'){
            echo "<dt>FireFox</dt>";
            echo "<dd>FireFox to taka przeglądarka w której się przegląda</dd>";
        }
    }
    ?>
</body>
</html>