<div class="modal fade addScroll" id="ver_facturacion" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_ver_cotizacion" >

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
</div>


