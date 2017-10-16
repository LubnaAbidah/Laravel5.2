@extends('layouts.app')

@section('content')
  <div class="view overlay hm-black-light z-depth-1-half">
    <div class="full-bg-img flex-center">
        <div class="container"> 
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <center>
                <img src="../bootstrap/img/logo2.png">
            </center>
                <br>
            <div class="panel panel-default animated fadeInDown">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
                            <label for="email" class="col-md-4 control-label"><i class="fa fa-envelope prefix"></i></label>

                            <div class="col-md-6">
                                
                                <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">                         
                            <label for="password" class="col-md-4 control-label"> <i class="fa fa-lock prefix"></i></label>

                            <div class="col-md-6">
                                 
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <HR>
                        <div class="form-group">
                          <center>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-danger" href="{{ url('/password/reset') }}"><i class="fa fa-random"></i> Forgot Your Password? </a>
                               
                           <center>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
    </div>
</div>
</div>
@endsection
