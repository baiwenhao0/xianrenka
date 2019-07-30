@extends('layouts.web_header')
@section('title', $user->name)

@section('content')
    <div class="row">
        <div class="offset-md-2 col-md-8">
            <section class="user_info">
                @include('layouts._user_info', ['user' => $user])
            </section>
            @if (Auth::check())
                @include('web.users._follow_form')
            @endif
            <section class="stats mt-2">
                @include('web.statuses._stats', ['user' => $user])
            </section>
            <hr>
            <section class="status">
                @if ($statuses->count() > 0)
                    <ul class="list-unstyled">
                        @foreach ($statuses as $status)
                            @include('web.statuses._status')
                        @endforeach
                    </ul>
                    <div class="mt-5">
                        {!! $statuses->render() !!}
                    </div>
                @else
                    <p>没有数据！</p>
                @endif
            </section>
        </div>
    </div>
@stop