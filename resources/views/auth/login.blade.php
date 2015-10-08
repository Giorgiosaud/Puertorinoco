<div class="row" >
    @include('assets.errors')
    <h1 class="col s12 center">Login</h1>
    <hr>
    {{-- <form class="col s12" role="form" method="POST" action="/PanelAdministrativo"> --}}
    <form ng-submit="submit()">
        <div class="row">
            <div class="input-field col s6 offset-s3">
                <input ng-model="formData.login" type="text"  name="login" required>
                <label for="login">Direccion de correo o Alias</label>
            </div>
            <div class="input-field col s12 m6 offset-m3">
                <input ng-model="formData.password" id="password" name="password" type="password" class="validate">
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