{{--*/ $name = 'example' /*--}}

<section class="{{ $name }}">
  <header class="{{ $name }}__banner">
    <img class="{{ $name }}__banner-image" src="{{ elixir($data->image_url) }}" role="presentation" />
    <h1 class="{{ $name }}__banner-title">{{ $data->title }}</h1>
  </header>
  <div class="{{ $name }}__content">{{ $data->content }}</div>
</section>
