<div class="form-group" id="groupcondiciones">
	<div class="control-group">
		<div class="col-xs-8 col-xs-push-4">
			<div class="pull-left">Aceptar
				<button type="button" class="btn btn-link terminosCondiciones" data-toggle="modal"
				        data-target="#tyc">Terminos y condiciones
				</button>
			</div>

			<div class="checkboxCondiciones pull-left">
				{!! Form::checkbox('condiciones', true , false ,['id'=>'condiciones'])!!}
				<label for="condiciones"></label>
			</div>

		</div>
	</div>
	<div class="clearfix"></div>
	@if ($errors->has('condiciones')) <p class="help-block bg-danger text-center">{!! $errors->first('condiciones') !!}</p> @endif

</div>