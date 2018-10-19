<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TripAdvisor</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- FontAwsome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            #flag{
            	display: flex;
            	justify-content: space-between;
            }
            #dashboard{
			    text-align: right;
			    margin: auto;
			}
			nav{
				display: flex;
				margin: auto;
				justify-content: space-between;
			}
            li{
                list-style: none;
                display: inline-block;
            }
			nav > a{
				margin: 5px;
				text-align: right;
			}
			a{
				text-decoration: none;
				color: black;
				border-radius: 15px;
			}
			a:hover, i:hover{
				color: #4bc16b;
			}
			button{
				background-color: #4bc16b;
				border-radius: 5px;
			}
			#loc{
				color: #4bc16b;
			}
        </style>
    </head>

<header>
	<div id="flag">
	<img src="https://static.tacdn.com/img2/langs/fr/branding/rebrand/TA_logo_primary.svg" height="50%" width="50%">
		<div id="dashboard">
			<i class="fas fa-suitcase"></i>
			<i class="far fa-comment-alt"></i>
			<i class="fas fa-user-alt"></i>
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
            @endif
        </div>
			<i class="fas fa-search"></i>
		</div>
	</div>
    <nav>
    	<a id="hotels" href="/hotels"><div id="hotels">Hôtels</div></a>
    	<a id="loc" href="./location/search"><div id="loc">Location vacances</div></a>
    	<a id="vols" href="/vols"><div id="vols">Vols</div></a>
    	<a id="restaurants" href="/restaurants"><div id="restaurants">Restaurants</div></a>
    	<a id="activites" href="/activites"><div id="activites">Activités</div></a>
    	<a id="menu" href="/menu"><i class="fas fa-bars"></i></a>
    </nav>
</header>

    <body>
        
        <main class="py-4">
            @yield('content')
        </main>
    </body>
</html>
