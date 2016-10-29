@extends('layouts.main')

@section('title')
Reset Password
@endsection

@section('components')

  <h1>@yield('title')</h1>

  <hr>

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="{{ $errors->has('email') ? ' error' : '' }}">
      <label for="email">E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ $email or old('email') }}" required autofocus>
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

    <div class="{{ $errors->has('password_confirmation') ? ' error' : '' }}">
      <label for="password-confirm">Confirm Password</label>
      <input id="password-confirm" type="password" name="password_confirmation" required>
      @if ($errors->has('password_confirmation'))
        <span>{{ $errors->first('password_confirmation') }}</span>
      @endif
    </div>

    <div>
      <button>
        Reset Password
      </button>
    </div>
  </form>
@endsection
