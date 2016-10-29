@extends('layouts.main')

@section('title')
Login
@endsection

@section('components')

  <h1>@yield('title')</h1>

  <hr>

  <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="{{ $errors->has('email') ? ' error' : '' }}">
      <label for="email">E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
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
      <label>
        <input type="checkbox" name="remember"> Remember Me
      </label>
    </div>

    <div>
      <button>
        Login
      </button>

      <a href="{{ url('/password/reset') }}">
        Forgot Your Password?
      </a>
    </div>
  </form>

@endsection
