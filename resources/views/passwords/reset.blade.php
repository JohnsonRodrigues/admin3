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
        <form class="reset-form" action="{{ url(config('metronic3.password_reset_url', 'password/reset')) }}"
              method="post">
            {!! csrf_field() !!}

            <input type="hidden" name="token" value="{{ $token }}">

            <h3 class="form-title font-green">{{ trans('metronic3::metronic3.password_reset_message') }}</h3>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <label class="control-label visible-ie8 visible-ie9">{{ trans('metronic3::metronic3.email') }}</label>
                <input class="form-control" type="text" autocomplete="off"
                       placeholder="{{ trans('metronic3::metronic3.email') }}" name="email"
                       value="{{ isset($email) ? $email : old('email') }}"/>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                <label class="control-label visible-ie8 visible-ie9">{{ trans('metronic3::metronic3.password') }}</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password"
                       placeholder="{{ trans('metronic3::metronic3.password') }}" name="password"/>
                @if ($errors->has('password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                <label class="control-label visible-ie8 visible-ie9">{{ trans('metronic3::metronic3.retype_password') }}</label>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off"
                       placeholder="{{ trans('metronic3::metronic3.retype_password') }}" name="password_confirmation"/>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit"
                        class="btn green btn-lg btn-block uppercase">{{ trans('metronic3::metronic3.reset_password') }}</button>
            </div>
            <div class="create-account">
                <p>
                    <a href="{{ url(config('metronic3.login_url', 'login')) }}" class=" text-center uppercase"
                    >{{ trans('metronic3::metronic3.i_already_have_a_membership') }}</a>
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright"> {{date("Y")}} &copy; {{ config('metronic3.title', 'Metronic')  }}
        {{ config('metronic3.version', 'V0001')}}
        <a target="_blank" href="{{ config('metronic3.developer', '#')}}">{{ config('metronic3.title', 'Metronic3')  }}</a>
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
    <script src="{{ asset('vendor/metronic3/pages/scripts/reset.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    @yield('js')
@stop
