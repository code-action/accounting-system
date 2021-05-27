<div class="modal fade" id="eliminar_cliente" role="dialog">
    <div class="modal-dialog" role="document" id="">
        <div class="modal-content">
            <form id="form_eliminar_cliente" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('¿Desea eliminar el cliente') }} <b id="cli_nombre"></b>?</h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

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
