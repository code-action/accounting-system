<div class="modal fade " id="abrir_modal_mostrar" role="dialog">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_mostrar_cliente" method="post">
                <div class="modal-header">
                    <h3 class="modal-title"><b>{{ __('Detalles del Producto') }}</b> <b id="cli_nombre"></b></h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body ">
                        <div class="row" style="margin-bottom: 15px;">
                            <div class="col-md-6">
                                <label for="input-prod_codigo-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Código') }}
                                </label>
                                <input type="text" class="form-control" id="input-prod_codigo-mostrar" disabled>

                                <label for="input-mat_nombre-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Nombre del producto') }}
                                </label>
                                <input type="text" class="form-control" id="input-mat_nombre-mostrar" disabled>

                                <label for="input-mat_cantidad-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Cantidad') }}
                                </label>
                                <input type="text" class="form-control" id="input-mat_cantidad-mostrar" disabled>

                                <label for="input-prod_precio-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Precio') }}
                                </label>
                                <input type="text" class="form-control" id="input-prod_precio-mostrar" disabled>

                            </div>
                            <div class="col-md-6 col-sm-6">
                                <label for="input-categoria_id-mostrar" class="form-label"
                                       style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Categoría') }}
                                </label>

                                <div class="form-group" style="margin-top: 8px;">
                                    <select class="js-example-basic-single js-states form-control"
                                            id="input-categoria_id-mostrar" data-style="select-with-transition" title=""
                                            data-size="100" style="width: 100%" disabled>
                                        <option value="" disabled selected></option>
                                        @foreach($categorias as $c)
                                            <option value="{{$c->id}}">
                                                {{$c->cat_nombre}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="input-prod_descripcion-mostrar" class="form-label"
                                       style="padding-top: 10px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Presentación') }}
                                </label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" style="margin-top: 8px;">
                                                    <select class="js-example-basic-single js-states form-control"
                                                            id="input-prod_empaque-mostrar" data-style="select-with-transition"
                                                            data-size="100" style="width: 100%" disabled>
                                                        <option value="" disabled selected></option>
                                                        @foreach($empaques as $e)
                                                            <option value="{{$e->id}}"
                                                                    @if(old('prod_empaque') == $e->id) selected @endif>
                                                                {{$e->emp_nombre}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" style="margin-top: 0px;">
                                                    <input class="form-control" id="input-prod_contenido-mostrar" type="text"
                                                           value="" aria-required="true" disabled/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group" style="margin-top: 8px;">
                                                    <select class="js-example-basic-single js-states has-error select2
                                                                form-control"  id="input-prod_medida-mostrar"
                                                            data-style="select-with-transition" data-size="100"
                                                            style="width: 100%" disabled>
                                                        <option value="" disabled selected></option>
                                                        @foreach($medidas as $m)
                                                            <option value="{{$m->id}}"
                                                                    @if(old('prod_medida') == $m->id) selected @endif>
                                                                {{$m->med_nombre}} ({{$m->med_abreviatura}})
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <label for="input-prod_descripcion-mostrar" class="form-label"
                                       style="padding-top: 10px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Descripción') }}
                                </label>
                                <textarea class="form-control" rows="2" id="input-prod_descripcion-mostrar" disabled
                                          type="text" aria-required="true"></textarea>




                                <label for="input-prod_procedimiento-mostrar" class="form-label"
                                       style="padding-top: 10px;margin-bottom: 0px;border-bottom-width: 0;">
                                    {{ __('Procedimiento') }}
                                </label>
                                <textarea class="form-control" rows="2" id="input-prod_procedimiento-mostrar" disabled
                                          type="text" aria-required="true"></textarea>




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



{{--<div class="modal fade addScroll" id="abrir_modal_mostrar" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_ver_producto" >

                <div class="modal-header">
                    <h3 class="modal-title text-center"><b>{{ __('Detalles del producto') }}</b></h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal"
                            style="position: absolute; z-index: 5;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="card border mb-3" style="max-width: 100rem;">
                                <div class="card-header border bg-light">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 id="p_nombre"></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body text-dark">
                                    <div class="row justify-content-end cliente-datos">
                                        <div class="col-md-7">
                                            <div class="text-left">
                                                <h6>
                                                    <b>{{ __('Cantidad') }}: </b>
                                                    <text id="p_cantidad"></text>
                                                </h6>
                                                <h6><b>{{ __('Precio $') }}: </b>
                                                    <text id="p_precio"></text>
                                                </h6>
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <div class="text-right">
                                                <h6>
                                                    <b>{{ __('Categoria') }}: </b>
                                                    <text id="p_categoria"></text>
                                                </h6>
                                                <h6 class="text-right">
                                                    <b>{{ __('Descripción:') }}</b>
                                                    <text id="p_descripcion"></text>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <div class="table-responsive">
                                        <table id="materia_show" class="table table-striped table-no-bordered
                                                table-hover datatable-rose" style="width: 100%">
                                            <thead class="text-primary">
                                                <th style="width: 70%">
                                                    {{ __('Materia Prima') }}
                                                </th>
                                                <th>
                                                    {{ __('Cantidad') }}
                                                </th>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
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
</div>--}}





