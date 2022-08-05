
@extends('layout.main')

@section('content')

<div class="wrapper">
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="/">
                <div class="simple-text logo">
                    <img src="{{ asset('assets/img/logo.png') }}">
                </div>
            </a>   
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li >
                    <a href="/">
                        <i class="fa fa-user" style='font-size:24px'></i>
                        <p>
                            {{ __('Usuários') }}
                        </p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
        @include('usuario.' . $options['viewName'])

        </div>

@endsection
