@extends('layouts.main')

@section('title')
Register
@endsection

@section('components')

  <h1>@yield('title')</h1>

  <hr>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}

    <div class="{{ $errors->has('name') ? ' error' : '' }}">
      <label for="name">Name</label>
      <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
      @if ($errors->has('name'))
        <span>{{ $errors->first('name') }}</span>
      @endif
    </div>

    <div class="{{ $errors->has('email') ? ' error' : '' }}">
      <label for="email">E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required>
      @if ($errors->has('email'))
        <span>{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div class="{{ $errors->has('password') ? ' error' : '' }}">
      <label for="password">Password</label>
      <input id="password" type="password" name="password" required>
      @if ($errors->has('password'))
        <span>{{ $errors->first('password') }}</span>
      @endif
    </div>

    <div>
      <label for="password-confirm">Confirm Password</label>
      <input id="password-confirm" type="password" name="password_confirmation" required>
    </div>

    <div>
      <button>
        Register
      </button>
    </div>
  </form>
@endsection
