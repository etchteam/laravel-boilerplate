<!doctype html>
<html class="no-js" lang="{{ Config::get('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Styleguide</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/styleguide.css">
    <link rel="stylesheet" href="{{ elixir('styles/main.css') }}">
  </head>
  <body>

    <div class="styleguide">
      <nav class="styleguide__nav">
        <ul class="styleguide__nav-list">
          <li class="styleguide__nav-header">
            Styleguide
          </li>
          @foreach ($nav as $idx => $item)
            <li class="styleguide__nav-item">
              <a href="#{{ $idx }}" class="styleguide__nav-link">{{ $item }}</a>
            </li>
          @endforeach
        </ul>
      </nav>

      <main class="styleguide__content">
        @foreach ($components as $idx => $component)
          <div id="{{ $idx }}" class="styleguide__component">
            @include($component['name'], ['data' => $component['data']])

            <div class="styleguide__docs">
              <h2 class="styleguide__docs-header">Docs</h2>
              {!! $component['docs'] !!}
              <h3 class="styleguide__docs-subheader">Data Structure</h2>
              <pre><code>{{ $component['structure'] }}</code></pre>
            </div>
          </div>
        @endforeach
      </main>
    </div>

    <script src="{{ elixir('scripts/main.js') }}"></script>
    <script src="scripts/styleguide.js"></script>
  </body>
</html>
