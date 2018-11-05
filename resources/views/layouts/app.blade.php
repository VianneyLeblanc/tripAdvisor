<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TripAdvisor</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <div id="flag">
    <a href="."><img src="https://static.tacdn.com/img2/langs/fr/branding/rebrand/TA_logo_primary.svg" width="50%"></a>
        <div id="dashboard">
            <i class="fas fa-suitcase"></i>
            <i class="far fa-comment-alt"></i>
            <i class="fas fa-user-alt"></i>
        </div>
            
        </div>
    </div>
    
    <nav class="links navbar-laravel">
        <a id="hotels" href="."><div id="hotels">Hôtels</div></a>
        <a id="loc" href="."><div id="loc">Location vacances</div></a>
        <a id="vols" href="."><div id="vols">Vols</div></a>
        <a id="restaurants" href="."><div id="restaurants">Restaurants</div></a>
        <a id="activites" href="."><div id="activites">Activités</div></a>
        <a id="menu" href="."><i class="fas fa-bars"></i></a>
    </nav>
    <div style="display: inline-block;">
        <a href="./login">Login</a>
        <a href="./register">Register</a>
    </div>
    <form method="post" action="{{ url('/location/searchResult') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" >
    <div style="display: flex;">
        <div>
            <label for="ville">Ville recherchée</label>
            <input type="text" name="ville">
        </div>
        <div class="inputDate" style="display: inline-block; margin-left: 3px;">
            <input placeholder="Arriver" type="text" name="dateArrivee0" onclick="showCalendarArrive('_0')" value="" readonly>
            <i class="fas fa-calendar-alt internal" onclick="showCalendarArrive('_0')"></i>
            <div id="calendarSelector1_0" class="hidden" style="margin-top: 15px;">
            <span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector1_0')" data-nb="0">&#160 &lt &#160</span>
            <span class="button" id="next" value=">" onclick="nextMonth('calendarSelector1_0')" data-nb="1">&#160 &gt &#160</span>
            <?php echo \App\Calendar::calendrier(6,0); ?>
            </div>
        </div>
        <div class="inputDate" style="display: inline-block;">
            <input placeholder="Départ" type="text" name="dateDepart0" onclick="showCalendarDepart('_0')" value="" readonly>
            <i class="fas fa-calendar-alt internal" onclick="showCalendarDepart('_0')"></i>
            <div id="calendarSelector2_0" class="hidden">
            <span id="previous" class="button" value="<" onclick="previousMonth('calendarSelector2_0')" data-nb="0">&#160 &lt &#160</span>
            <span class="button" id="next" value=">" onclick="nextMonth('calendarSelector2_0')" data-nb="1">&#160 &gt &#160</span>
            <?php echo \App\Calendar::calendrier(6,0); ?>
            </div>
        </div>
    <button type="submit" class="" value="rechercher" ><i class="fas fa-search"></i></button>
  </div>
</form>
</header>
    <div class="container">@yield('content')</div>
</body>
</html>
