<!-- Classic Modal -->
<div class="modal fade addScroll" id="materiaLote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Agregar Materia Prima')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">         
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Lote') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input class="form-control" id="auxf_lote" type="text" placeholder="{{ __('Lote') }}"  aria-required="true" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Fecha de fabricación') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input class="form-control" id="auxf_fabricacion" type="date" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Fecha de vencimiento') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input class="form-control" id="auxf_vencimiento" type="date" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Cantidad') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input class="form-control" id="auxf_cantidad" type="number" placeholder="{{ __('Cantidad') }}"  aria-required="true" autocomplete="off" value=""/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-sm-3 col-form-label">{{ __('Costo') }}</label>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <input class="form-control" id="auxf_costo" type="number" placeholder="{{ __('Costo') }}"  aria-required="true" autocomplete="off"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id='guardarLote' type="button" class="btn btn-success btn-link">@lang('Guardar')</button>
                <button id='closeModalLote' type="button" class="btn btn-danger btn-link" data-dismiss="modal">@lang('Cerrar')</button>
            </div>
        </div>
    </div>
</div>