<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengerjaan Soal</title>
    <script>
        function konfirmasi() {
            window.location.href = '/cheat'
            // let text = "Press a button!\nEither OK or Cancel";
            // if (confirm(text) == true) {
            //     text = "You pressed OK!";
            //     window.location.href = "/"
            // } else {
            //     text = "You canceled!";
            //     window.location.href = "/"
            // }
        }

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                konfirmasi()
            }
        });

        window.addEventListener('beforeunload', function (event) {
            // For browsers that prevent window.close() on beforeunload
            event.preventDefault();
            event.returnValue = '';
        });

        window.onbeforeunload = function() {
            // For browsers that support onbeforeunload directly
            konfirmasi()
        };
    </script>
</head>
<body>
    <style>
        .container {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
        }

        /* Then style the iframe to fit in the container div with full height and width */
        .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        }
    </style>

    <iframe class="responsive-iframe" src="{!! $url !!}">
    </iframe>
</body>
</html>