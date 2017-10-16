<!DOCTYPE html>
<html>
    <head>
        <title>MagangApp Neuron</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                background-color: #800000;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
        <link rel="icon" type="image/png" href="../bootstrap/img/mne.png">
    </head>
    <body>
        <div class="container">
            <div class="content">
                <center>
                <img src="../bootstrap/img/404.png"></div>
                </center>
                <div class="title">404 NOT FOUND</div>
                <h3>Angry Panda has eaten the page you are looking for.</h3>
                {{ link_to('/', 'Back', ['class' => 'btn btn-warning btn-sm']) }}
            </div>
        </div>
    </body>
</html>
