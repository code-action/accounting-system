<div class="modal fade " id="abrir_modal_mostrar" role="dialog">
    <div class="modal-dialog modal-lg" role="document" id="">
        <div class="modal-content">
            <form id="form_mostrar_cliente" method="post">
                @csrf
                @method('delete')
                <div class="modal-header">
                    <h3 class="modal-title"><b>{{ __('Datos del Cliente') }}</b> <b id="cli_nombre"></b></h3>
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
                                        <input type="text" class="form-control" id="input-cli_nombre-mostrar" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Nombre del Contacto') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_contacto-mostrar" disabled>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Nombre Contacto') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="cli_contacto" id="input-cli_contacto-mostrar" type="text"
                                                   placeholder="{{ __('Nombre Contacto') }}" value=""
                                                   aria-required="true" disabled/>
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Email') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_email-mostrar" disabled>
                                    </div>
                                </div>
                                {{--<div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control"
                                                   name="cli_email" id="input-cli_email" type="text"
                                                   placeholder="{{ __('Email') }}" value=""
                                                   aria-required="true" disabled/>
                                        </div>
                                    </div>
                                </div>--}}




                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nombre-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Teléfono') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_telefono-mostrar" disabled>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                     <label class="col-sm-2 col-form-label">{{ __('Teléfono') }}</label>
                                     <div class="col-sm-10">
                                         <div class="form-group">
                                             <input class="form-control"
                                                    name="cli_telefono" id="input-cli_telefono" type="text"
                                                    placeholder="{{ __('Teléfono') }}" value=""
                                                    aria-required="true" disabled/>
                                         </div>
                                     </div>
                                 </div>--}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_direccion-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Dirección') }}
                                        </label>
                                        <textarea rows="3" type="text" class="form-control" id="input-cli_direccion-mostrar" disabled></textarea>
                                    </div>
                                </div>

                                {{--<div class="row ">
                                    <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('Dirección') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('cli_direccion') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_direccion') ? ' is-invalid' : '' }}"
                                                   name="cli_direccion" id="input-cli_direccion" type="text"
                                                   placeholder="{{ __('Dirección') }}" value="{{old('cli_direccion', $cliente->cli_direccion)}}"
                                                   aria-required="true" disabled/>
                                            @include('alerts.feedback', ['field' => 'cli_direccion'])
                                        </div>
                                    </div>
                                </div>--}}
                            </div>
                            <div class="col-md-6">

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_categoria-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('Categoría') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_categoria-mostrar" disabled>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <label class="col-sm-2 col-md-3 col-lg-2 col-form-label">{{ __('Categoría') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <select class="js-example-basic-single js-states has-error
                                                            form-control" name="cli_categoria" id="input-cli_categoria"
                                                    data-style="select-with-transition" title=""
                                                    data-size="100" style="width: 100%" disabled>
                                                <option value="" disabled selected
                                                        style="background-color:lightgray">
                                                    {{__('Seleccione una categoría de contribuyente')}}
                                                </option>
                                                <option value="1" {{ $cliente->cli_categoria == 1 ? 'selected':''}}>
                                                    Gran contribuyente
                                                </option>
                                                <option value="2" {{ $cliente->cli_categoria == 2 ? 'selected': ''}}>
                                                    Mediano contribuyente
                                                </option>
                                                <option value="3" {{ $cliente->cli_categoria == 2 ? 'selected': ''}}>
                                                    Otros contribuyentes
                                                </option>
                                            </select>
                                            @include('alerts.feedback', ['field' => 'cli_categoria'])
                                        </div>
                                    </div>
                                </div>--}}

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_dui-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('DUI') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_dui-mostrar" disabled>
                                    </div>
                                </div>

                                {{--<div class="row">
                                    <label class="col-sm-3 col-md-3 col-lg-2 col-form-label">{{ __('DUI') }}</label>
                                    <div class="col-sm-10">
                                        <div class="form-group{{ $errors->has('cli_dui') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('cli_contacto') ? ' is-invalid' : '' }}"
                                                   name="cli_dui" id="input-cli_dui" type="text"
                                                   placeholder="{{ __('Documento Único de Identidad (Opcional)') }}"
                                                   value="{{old('cli_dui', $cliente->cli_dui)}}"
                                                   aria-required="true" disabled/>
                                            @include('alerts.feedback', ['field' => 'cli_dui'])
                                        </div>
                                    </div>
                                </div>--}}


                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="input-cli_nit-mostrar" class="form-label"
                                               style="padding-top: 20px;margin-bottom: 0px;border-bottom-width: 0;">
                                            {{ __('NIT') }}
                                        </label>
                                        <input type="text" class="form-control" id="input-cli_nit-mostrar" disabled>
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
                                        <input type="text" class="form-control" id="input-cli_nrc-mostrar" disabled>
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
                        <button class="btn btn-light" type="button" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        {{--<button class="btn btn-danger" type="submit">{{ __('Eiminar') }}</button>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
