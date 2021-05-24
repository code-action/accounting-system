<!-- Classic Modal -->
<div class="modal fade" id="materiaPrima" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog divBudgetScroll">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{__('Agregar Materia Prima')}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <div class="modal-body">         

            <label class="col-sm-2 col-form-label">{{ __('Buscar') }}</label>
            <div class="col-sm-10">
                <div class="form-group">
                    <input class="form-control"  name="code" id="modal-filtrar" type="text" placeholder="{{ __('Buscar') }}"  aria-required="true" autocomplete="off"/>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <table id="tabla-filtro" class="table table-striped table-no-bordered table-hover datatable-rose" style="width: 100%">
                        <thead class="text-primary">
                            <th>
                                {{ __('Material') }}
                            </th>
                            <th class="text-right">
                                {{ __('Acciones')}}
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