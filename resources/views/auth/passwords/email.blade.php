@extends('layouts.main')

@section('title')
Reset Password
@endsection

@section('components')

  <h1>@yield('title')</h1>

  <hr>

  @if (session('status'))
    <div>
      {{ session('status') }}
    </div>
  @endif

  <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
    {{ csrf_field() }}

    <div class="{{ $errors->has('email') ? ' error' : '' }}">
      <label for="email">E-Mail Address</label>
      <input id="email" type="email" name="email" value="{{ old('email') }}" required>

      @if ($errors->has('email'))
        <span>{{ $errors->first('email') }}</span>
      @endif
    </div>

    <div>
      <button>
          Send Password Reset Link
      </button>
    </div>
  </form>
@endsection
