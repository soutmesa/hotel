@extends ('layouts.page_login')

@section ('content')
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('../../index2.html')}}"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to manage your application</p>

      {{Form::open(['url'=>'login'])}}
      {{ csrf_field() }}
        <div class=" has-feedback form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          {{Form::email('email',old('email'),['class'=>'form-control', 'placeholder'=>'Email'])}}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          @if ($errors->has('email'))
            <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
            </span>
          @endif
        </div>
        <div class="has-feedback form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          {{Form::password('password',['class'=>'form-control', 'placeholder'=>'Password'])}}
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          @if ($errors->has('password'))
            <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
          @endif
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                {{Form::checkbox("remember", old('remember') ? 'checked' : '')}} Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
            {{Form::submit('Sign In', ['class'=>'btn btn-primary btn-block btn-flat'])}}
          </div>
          <!-- /.col -->
        </div>
      {{Form::close()}}

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
          Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
          Google+</a>
      </div>
      <!-- /.social-auth-links -->

      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

@endsection