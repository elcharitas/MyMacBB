<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #111;
                font-family: sans-serif, cursive;
                font-weight: 100;
                height: 85vh;
                margin: 0;
            }

            .full-height {
                height: 85vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .message b {
                font-size: 2rem;
                text-align: center;
                display: block;
                color: #e65100;
            }

            .message {
                font-size: 1.2rem;
                text-align: center;
                color: white;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                <div class="message" style="padding: 2rem;">
                    <b> @yield('code')!</b>
                    <span> @yield('message') </span>
                </div>
            </div>
            
        </div>
    </body>
</html>
