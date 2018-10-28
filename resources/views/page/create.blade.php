@extends('layouts.app')

@section('content')
  <div class="container">

    <form method="POST" action="{{ route('page.store') }}">

      <div class="clearfix">
        <div class="pull-left">
          <div class="lead">
            <strong>Add new page</strong>
          </div>
        </div>
        <div class="pull-right">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="{{ route('page.index') }}" class="btn btn-default">Back to list</a>
        </div>
      </div>
      <hr>

      @include('page.form')
    </form>

  </div>
@endsection
