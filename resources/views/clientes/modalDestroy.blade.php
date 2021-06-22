{{--<div class="modal fade" id="eliminar_cliente" role="dialog">
    <div class="modal-dialog" role="document" id="">
        <div class="modal-content">
            <form id="form_eliminar_cliente" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h3 class="modal-title">{{ __('¿Desea eliminar el cliente') }} <b id="cli_nombre"></b>?</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
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
</div>--}}


<div class="modal fade " id="eliminar_cliente" role="dialog">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_eliminar_cliente" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h3 class="modal-title"><b>{{ __('¿Desea eliminar al cliente?') }}</b> <b id="cli_nombre"></b></h3>
                    <button class="close cerrarModal" type="button" aria-label="Close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Nombre') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_nombre-eliminar" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Nombre del Contacto') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_contacto-eliminar" disabled>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Email') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_email-eliminar" disabled>
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Teléfono') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_telefono-eliminar" disabled>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_direccion-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Dirección') }}
                                        </label>
                                        <textarea rows="3" type="text" class="form-control" id="input-cli_direccion-eliminar" disabled></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_categoria-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Categoría') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_categoria-eliminar" disabled>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_dui-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('DUI') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_dui-eliminar" disabled>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nit-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('NIT') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_nit-eliminar" disabled>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('NIT') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('cli_nit') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_nit') ? ' is-invalid' : '' }}"
                                                   name="cli_nit" id="input-cli_nit" type="text"
                                                   placeholder="{{ __('Número de Identificación Tributaria') }}"
                                                   value="{{old('cli_nit', $cliente->cli_nit)}}"
                                                   aria-required="true" disabled/>
                                            @include('alerts.feedback', ['field' => 'cli_nit'])
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nrc-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('NRC') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_nrc-eliminar" disabled>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('NRC') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('cli_nrc') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_nrc') ? ' is-invalid' : '' }}"
                                                   name="cli_nrc" id="input-cli_nit" type="text"
                                                   placeholder="{{ __('Número de Registro de Contribuyente') }}"
                                                   value="{{old('cli_nrc', $cliente->cli_nrc)}}"
                                                   aria-required="true" disabled/>
                                            @include('alerts.feedback', ['field' => 'cli_nrc'])
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
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
