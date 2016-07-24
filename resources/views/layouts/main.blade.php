<!doctype html>
<html class="no-js" lang="{{ Config::get('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{ elixir('styles/main.css') }}">
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        @yield('components')

        <script src="{{ elixir('scripts/main.js') }}"></script>

        @if (Config::get('app.analytics.google_analytics_key'))
          <script>
              window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
              ga('create','{{ Config::get('app.analytics.google_analytics_key') }}','auto');ga('send','pageview')
          </script>
          <script src="https://www.google-analytics.com/analytics.js" async defer></script>
        @endif
    </body>
</html>
