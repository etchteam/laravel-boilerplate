@extends('layouts.main')

@section('title') Laravel Boilerplate @endsection

@section('components')
  @foreach ($components as $component)
    @include($component['name'], ['data' => $component['data']])
  @endforeach
@endsection
