<div>
    <div class="col-sm-6">
        <div class="card mb-n1">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.offerings.store','id' => 'ofrendas']) !!}
                {{-- {!! Form::open(['route' => ['admin.offerings.update',$ofrenda_id], 'method' => 'put']) !!} --}}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('fecha', 'Fecha') !!}
                                {!! Form::date('fecha', null, ['class' => 'form-control', 'onfocus' => 'slug_c();', 'wire:model' => 'slug_fecha']) !!}
                                <p id="error_fecha" class="font-weight-light small text-danger mb-n2"></p>
                            </div>
                        </div>
                        {{-- <div class="col-sm-8"> --}}
                            <div class="col-sm-4"> {{-- wire:ignore --}}
                                <div class="form-group">
                                {!! Form::label('Nombre', 'Nombre') !!}
                                {!! Form::select('brother_id', $b_s, null,['class' => 'form-control', 'id' => 'brother_id', 'wire:model' => 'selector']) !!}
                                </div>    
                            {{-- </div> --}}
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('cedula', 'Cédula') !!}
                                {!! Form::text('cedula', $bro->identificador, ['class' => 'form-control',  'placeholder' => 'Aqui se muestra la cédula', 'readonly']) !!}
                                <p id="error_cedula" class="font-weight-light small text-danger mb-n2"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">                          
                        {{-- <div class="col-sm-8">
                            <div class="form-group">

                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', $bro->name, ['class' => 'form-control', 'placeholder' => 'Aquí se muestra el nombre', 'readonly']) !!}

                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div> --}}
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('diezmo', 'Diezmo') !!}
                                {!! Form::text('diezmo', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese el diezmo', ".col-"=>'3']) !!}
                            
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('ofrenda', 'Ofrenda') !!}
                                {!! Form::text('ofrenda', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese la ofrenda']) !!}
                            
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('mision', 'Misiones') !!}
                                {!! Form::text('mision', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese la ofrenda a Misiones']) !!}
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('protemplo', 'Pro Templo') !!}
                                {!! Form::text('protemplo', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese la ofrenda Pro Templo']) !!}
                            
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('servicio', 'Servicio') !!}
                                {!! Form::text('servicio', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese la ofrenda Servicio']) !!}
                            
                            </div>        
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('buena_dadiva', 'Buena Dádiva') !!}
                                {!! Form::text('buena_dadiva', null, ['class' => 'form-control', 'onchange' => 'calcular()', 'placeholder' => 'Ingrese la ofrenda Buena Dádiva']) !!}
                            
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('category_id', 'Categoria') !!}
                                {!! Form::select('category_id', $cat, null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('monto', 'Monto') !!}
                                {!! Form::text('monto', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el monto', ".col-"=>'3']) !!}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('total', 'Total') !!}
                                {!! Form::text('total', null, ['class' => 'form-control', 'oninput' => 'calcular()',  'placeholder' => 'Total', 'readonly']) !!}
                                <p id="error_total" class="font-weight-light small text-danger mb-n2"></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {!! Form::label('slug', 'Slug') !!}
                                {!! Form::text('slug', $bro->slug."-".$slug_fecha, ['class' => 'form-control', 'placeholder' => 'slug de la ofrenda' , 'readonly']) !!}
                                <p id="error_slug" class="font-weight-light small text-danger mb-n2"></p>
                            </div>
                        </div>
                    

                    {{-- <div class="form-group">
                        {!! Form::text('slug_nombre', $bro->slug, ['class' => 'form-control', 'readonly'])!!}
                    </div> --}}
                    
                    <div class="form-group">
                        {!! Form::hidden('creado_por', auth()->id()) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::hidden('actualizado_por', auth()->id()) !!}
                    </div>

                    {{-- {!! Form::submit('Actualizar ofrenda', ['class' => 'btn btn-primary', 'id' => 'Ingresar_Ofrenda']) !!} --}}
                    <div class="col-sm-4 mt-2">
                        <br>
                        {!! Form::submit('Ingresar ofrenda', ['class' => 'btn btn-primary', 'wire:click' => 'search', 'id' => 'Ingresar_Ofrenda']) !!}
                    </div>
                    
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug2.js')}}"></script> --}}
    <script src="{{asset('vendor/jQuery-suma/Suma.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{asset('vendor/jQuery-suma/Decimales.js')}}"></script>

</div>
