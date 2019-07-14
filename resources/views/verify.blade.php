
@extends('metronic3::master')

@section('metronic3_css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('vendor/metronic3/pages/css/login.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->
    @yield('css')
@stop

@section('body_class', 'login')

@section('body')
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ url(config('metronic3.dashboard_url', 'home')) }}">
            <img src="{{asset(config('metronic3.logo', '../assets/layouts/layout/img/logo.png'))}}" alt="logo"
                 class="logo-default"/>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->

        <h3 class="form-title font-green">{{ __('Verify Your Email Address') }}</h3>
        @if (session('resent'))
            <div class="alert alert-success">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif
        {{ __('Before proceeding, please check your email for a verification link.') }}
        {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> {{date("Y")}} &copy; {{ config('metronic3.title', 'Metronic')  }}
        {{ config('metronic3.version', 'V0001')}}
        <a target="_blank" href="{{ config('metronic3.developer', '#')}}">{{ config('metronic3.title', 'Metronic')  }}</a>
    </div>



@stop

@section('metronic3_js')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('vendor/metronic3/global/plugins/jquery-validation/js/jquery.validate.min.js')}}"
            type="text/javascript"></script>
    <script src="{{ asset('vendor/metronic3/global/plugins/jquery-validation/js/localization/messages_pt_BR.min.js')}}"
            type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('vendor/metronic3/pages/scripts/forget-password.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @yield('js')
@stop
