<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
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
			}
			nav > a{
				margin: 5px;
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
			<button id="inscription" type="button">S'INSCRIRE</button>
			<i class="fas fa-search"></i>
		</div>
	</div>
    <nav>
    	<a><div>Hôtels</div></a>
    	<a><div>Location vacances</div></a>
    	<a><div>Vols</div></a>
    	<a><div>Restaurants</div></a>
    	<a><div>Activités</div></a>
    	<a><i class="fas fa-bars"></i></a>
    </nav>
</header>

    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>
                        <a href="<?php echo e(route('register')); ?>">Register</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </body>
</html>
