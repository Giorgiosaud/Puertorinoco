<div class="fluid-container">
    {!!
	Table::withContents($valores_de_tabla)->hover()
!!}
	<div class="text-center col-xs-12">
	{!!
	Button::success('Crear Variable')->large()->asLinkTo(URL::route('variables.create'))->prependIcon(Icon::pencil())
	!!}</div>
</div>