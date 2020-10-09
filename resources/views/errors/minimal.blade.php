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
                font-family: sans-serif;
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
            
            .no-margin {
                margin-top: 0;
            }

            .message strong {
                font-size: 2.3rem;
                text-align: center;
                display: block;
                color: #e65100;
            }

            .infobox {
                font-size: .87rem;
                text-align: center;
                color: white;
            }
            
            .button {
                margin-top: 3px;
                padding: 12px 24px;
                background-color: #e65100;
                color: #fff;
                display: inline-block;
                cursor: pointer;
                text-decoration: none;
                border-radius: 3px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="code">
                <div class="message" style="padding: 2rem;">
                    <strong> @yield('code')! </strong>
                    <div class="infobox no-margin">
                        <p class="no-margin">
                            @yield('message')
                        </p>
                        <a href="{{ url('/') }}" class="button">
                            Go to Homepage
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </body>
</html>