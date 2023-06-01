<div>
    <div class="row">
        <div class="col-sm-6">
            <div class="w-sfull">
                <div class="card mb-n1">
                    <div class="card-body">
                        {!! Form::model($offering, ['route' => ['admin.offerings.update',$offering], 'method' => 'put']) !!}
                            <div class="row">
                                {{-- <p>{{$offering}}</p> --}}
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('fecha', 'Fecha') !!}
                                        {!! Form::date('fecha', null, ['class' => 'form-control', 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                    {!! Form::label('nombre', 'Nombre') !!}
                                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'nombre del hermano' , 'readonly']) !!}
                                    {{-- <p>{{$ofrenda_editar->diezmo}}</p> --}}
                                    </div>    
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        {!! Form::label('cedula', 'Cédula') !!}
                                        {!! Form::text('cedula', null, ['class' => 'form-control',  'placeholder' => 'Aqui se muestra la cédula', 'readonly']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">                          
                                {{-- <div class="col-sm-8">
                                    <div class="form-group">
z
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
                                        {!! Form::label('total', 'Total') !!}
                                        {!! Form::text('total', null, ['class' => 'form-control', 'oninput' => 'calcular()',  'placeholder' => 'Total', 'readonly']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        {!! Form::label('slug', 'Slug') !!}
                                        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'slug de la ofrenda' , 'readonly']) !!}
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                {!! Form::text('slug_nombre', $bro->slug, ['class' => 'form-control', 'readonly'])!!}
                            </div> --}}
                            

                            <div class="form-group">
                                {!! Form::hidden('actualizado_por', auth()->id()) !!}
                            </div>

                            {!! Form::submit('Actualizar ofrenda', ['class' => 'btn btn-primary']) !!}


                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug2.js')}}"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{asset('vendor/jQuery-suma/Suma.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{asset('vendor/jQuery-suma/Decimales.js')}}"></script>

    <script>
        $(document).ready( function() {
            var editar_ofrendas = <?php echo json_encode($offering) ?>;
            //console.log(editar_ofrendas.slug);
            document.getElementById("fecha").value=editar_ofrendas.fecha;

            var editar_ofrenda = <?php echo json_encode($brothers) ?>;
            var n = editar_ofrenda.length;
            for(var i = 0; i < n ; i++){
                if(editar_ofrenda[i].id == editar_ofrendas.brother_id){
                    brother=editar_ofrenda[i];
                    console.log(brother.name);
                }   
            }
            //console.log(ofrenda);
            document.getElementById("nombre").value=brother.name;
            document.getElementById("cedula").value=brother.identificador;
            //$('.brother').change();
            //document.getElementById("cedula").value=editar_ofrendas.identificador;
            //document.getElementById("slug").value=editar_ofrendas.slug;
            
        }); 
        
    </script>
</div>
