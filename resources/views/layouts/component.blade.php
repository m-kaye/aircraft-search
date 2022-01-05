<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Aircraft Search</title>
</head>

<body>
    <div id="header">
        <a href="/AircraftSearch/" class="atitle">Aircraft Search</a>
    </div>
    @yield('block')


    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            /* overflow: hidden; */
        }

        #header {
            background-color: #382994;
            padding: 10px;
            width: 100vw;
        }

        .atitle:link,
        .atitle:visited,
        .atitle:hover,
        .atitle:active {
            text-decoration: none;
            color: white;
            font-size: 24pt;
        }
        .contact:link,
        .contact:visited,
        .contact:hover,
        .contact:active {
            text-decoration: none;
            color: white;
            font-size: 16pt;
            position:absolute;
            right:0px;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @yield("script")

</body>

</html>