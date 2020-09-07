<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                font-family: sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .code {
                border: 1px solid;
                font-size: 2rem;
                padding: 1em 0 0;
                text-align: center;
                color: white;
                background-color: #e65100;
                border-radius: 10px;
                width: 250px;
                font-weight: bold;
            }

            .message {
                font-size: 35%;
                text-align: center;
                font-weight: normal;
                background-color: orange;
                margin-top: 2rem;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                
                E:@yield('code')!
                
                <br/>

                <div class="message" style="padding: 2rem;">
                    @yield('message')
                </div>
            </div>
            
        </div>
    </body>
</html>
