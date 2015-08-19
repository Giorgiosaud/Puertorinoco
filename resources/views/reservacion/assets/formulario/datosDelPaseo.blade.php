<div class="row">
        <div class="col s12" id="datosDelPaseo">
            <div class="row">
                <div class="input-field col s12">
                    <input  type="date" id="fechaPaseo" name="fechaPaseo" class="datepicker">
                    {!! Form::label('fecha',Lang::get('formulario.FechaDelPaseo')) !!}
                </div>
            </div>
            {!! Form::hidden('fecha',null,['ng-model'=>'formulario.fecha']) !!}
            <div class="row" id="LoadingEmbarcacionesYPaseos">
            @include('assets.preloader')
            </div>
            <div class="row" id="Embarcaciones">

                <h5>
                    {!!Lang::get('formulario.SeleccionDeEmbarcacionDisponible')!!}
                </h5>
                <?php $width = floor(12 / $embarcaciones->count())?>
                @foreach ($embarcaciones as $embarcacion)
                    <div class="col s{!! $width !!}">
                        <div class="embarcaciones waves-effect waves-light blue lighten-1
                         btn-large col s12 disabled"
                             data-idEmbarcacion="{!! $embarcacion->id !!}">{!! Lang::get('formulario.'.$embarcacion->nombre) !!}</div>
                    </div>
                @endforeach
            </div>
            {!! Form::hidden('embarcacion_id',null,['id'=>'embarcacion_id','ng-model'=>'formulario.embarcacion_id']) !!}
            <div class="row" id="Paseos">

                <h5>
                    {!!Lang::get('formulario.SeleccionDePaseoDisponible')!!}
                </h5>
                <?php $width = floor(12 / $paseos->count())?>
                @foreach ($paseos as $paseo)
                    <div class="col s{!! $width !!}">
                        <div class="disabled paseos waves-effect waves-light blue lighten-1
                         btn-large col s12"
                             data-idPaseo="{!! $paseo->id !!}">{!! $paseo->horaDeSalida !!}</div>
                    </div>
                @endforeach
            </div>
            {!! Form::hidden('paseo_id',null,['id'=>'paseo_id','ng-model'=>'formulario.     paseo_id']) !!}
        </div>
    </div>
</div>