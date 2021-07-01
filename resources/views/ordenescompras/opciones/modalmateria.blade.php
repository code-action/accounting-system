<!-- Classic Modal -->
<div class="modal fade addScroll" id="materiaPrima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top: 0.2rem !important">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Agregar Materia Prima')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">         
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Buscar') }}</label>
                    <div class="col-sm-10">
                        <div class="form-group">
                            <input class="form-control"  name="code" id="modal-filtrar" type="text" placeholder="{{ __('Código o nombre') }}"  aria-required="true" autocomplete="off"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group bmd-form-group col-md-6">
                        <label for="aux_cantidad" class="bmd-label-floating">Cantidad</label>
                        <input class="form-control" name="aux_cantidad" id="aux_cantidad" type="number" min="1" step="1" onKeyPress= 'return positiveNumber( this, event,this.value);'/>
                    </div>

                    <div class="form-group bmd-form-group col-md-6">
                        <label for="aux_costo" class="bmd-label-floating">Costo</label>
                        <input class="form-control" name="aux_costo" id="aux_costo" type="number" min="0.01" step="0.01" onKeyPress= 'return positiveNumberH( this, event,this.value);'/>
                    </div>
                </div>
                <div class="row addScroll divFiltro">
                    <div class="table-responsive">
                        <table id="tabla-filtro" class="table table-striped table-no-bordered table-hover datatable-rose" style="width: 100%">
                            <thead class="text-primary">
                                <th>
                                    {{ __('Código') }}
                                </th>
                                <th>
                                    {{ __('Materia Prima') }}
                                </th>
                                <th class="text-right">
                                    {{ __('Agregar')}}
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id='closeModalSection' type="button" class="btn btn-danger btn-link" data-dismiss="modal">@lang('Cerrar')</button>
            </div>
        </div>
    </div>
</div>