@extends('layouts.app')

@section('content')
<div class="container">

    <div class="clearfix">
        <div class="pull-left">
            <div class="lead">Page</div>
        </div>
        <div class="pull-right">
            <a href="{{ route('page.create') }}" class="btn btn-success">Add new</a>
        </div>
    </div>

    <hr>

    <table class="table table-bordered table-hover table-striped">
        <tbody>
            @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>
                    <a href="/page/{{ $page->id }}">{{ $page->title }}</a>
                </td>
                <td>
                    <time class="timeago" datetime="{{ $page->updated_at->toIso8601String() }}"
                      title="{{ $page->updated_at->toDayDateTimeString() }}">
                      {{ $page->updated_at->diffForHumans() }}
                    </time>
                </td>
                <td>
                    <div class="input-group-btn">
                        <a href="{{ route('page.edit', $page->id) }}" class="btn btn-primary">Edit</a>
                        <form method="post" action="{{ route('page.destroy', ['id' => $page->id]) }}">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this video?');"> Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
