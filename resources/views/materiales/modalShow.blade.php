<div class="modal fade " id="abrir_modal_mostrar" role="dialog">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_mostrar_cliente" method="post">
                <div class="modal-header">
                    <h3 class="modal-title"><b>{{ __('Detalles de Materia Prima') }}</b> <b id="cli_nombre"></b></h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body ">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <label for="input-cli_nombre-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Nombre') }}
                                </label>
                                <input type="text" class="form-control" id="input-mat_nombre-mostrar" disabled>
                            </div>
                            <div class="col-md-2 col-sm-6">
                                <label for="input-cli_nombre-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Cant. Total') }}
                                </label>
                                <input type="text" class="form-control" id="input-total-mostrar" disabled>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <label for="input-cli_nombre-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Fecha Ingreso') }}
                                </label>
                                <input type="text" class="form-control" id="input-fechai-mostrar" disabled>
                            </div>

                        </div>
                        <br>
                        <div id="contenedor" class="col-md-112 col-sm-12 offset-md-1 offset-lg-1">
                            {{--cantidad, preciou y proveedores que se envian--}}
                            {{--Visible--}}
                            <div id="add_mat_prov" class="row d-none" style="margin-bottom: 20px;">
                                <div class="col-md-2 col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="i-mat_cantidad-visible">{{ __('Cantidad') }}</label>
                                                <input type="email" class="form-control" id="i-mat_cantidad-visible"
                                                       type="number" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="i-mat_precio_u-visible">{{ __('Precio U.') }}</label>
                                                <input class="form-control"
                                                       name="mat_precio_u[]" id="i-mat_precio_u-visible" type="number" step="0.01"
                                                       placeholder="" disabled value="" aria-required="true"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div style="margin-top: 16px;" id="cotenedor_select" class="form-group prov_nombre
                                                            {{ $errors->has('prov_nombre') ? ' has-danger' : '' }}">
                                                <select class="js-example-basic-single js-states has-error
                                                                form-control" name="" id="i-prov_nombre"
                                                        data-style="select-with-transition" title=""
                                                        data-size="100" style="width: 100%" disabled>
                                                    <option selected disabled value="0">
                                                        {{__('Seleccione un proveedor')}}
                                                    </option>
                                                    @foreach ($proveedores as $proveedor)
                                                        <option id="proveedor_{{$proveedor->id}}"
                                                                value="{{$proveedor->id}}">
                                                            {{ $proveedor->prov_nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cerrar') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

