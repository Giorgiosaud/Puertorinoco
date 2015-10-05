@extends('templates.main')

@section('content')
    <div class="row">
        @include('assets.errors')
        <h1 class="col s12 center">Login</h1>
        <hr>
        <form class="col s12" role="form" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="row">
                <div class="input-field col s6 offset-s3">
                    <input id="login" type="text" class="validate" name="login" value="{{ old('login') }}">
                    <label for="login">Direccion de correo o Alias</label>
                </div>
                <div class="input-field col s12 m6 offset-m3">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="col s12 m6 offset-m3">
                <p>
                    <input type="checkbox" id="remember" name="remember"/>
                    <label for="remember">Recordarmelo</label>
                </p>

                <div class="form-group">
                    <div class="col m6 offset-m4">
                        <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                            Login
                        </button>

                        <a href="/password/email">Forgot Your Password?</a>
                    </div>
                </div>
            </div>
        </form>
    </div>








    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
