<div class="modal fade" id="eliminar_cotizacion" role="dialog">
    <div class="modal-dialog" role="document" id="">
        <div class="modal-content">
            {{--@if(@count($cotizaciones) > 0) action="{{route('cotizacion.destroy', $cotizacion)}}"
                @else action="{{route('cotizacion.index')}}" @endif--}}
            <form id="form_eliminar_cotizacion"  method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                   {{-- <h3 class="modal-title">{{ __('¿Desea eliminar la cotización de') }} <b id="cot_fecha"></b>
                        {{ __('del cliente') }} <b id="cot_cli_nombre"></b>?</h3>--}}
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="modal-title text-center">{{ __('¿Eliminar la cotización del') }} <b id="cot_fecha"></b>
                        {{ __('del cliente') }} <b id="cot_cli_nombre"></b>?</h3>
                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button class="btn btn-danger" type="submit">{{ __('Eiminar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
