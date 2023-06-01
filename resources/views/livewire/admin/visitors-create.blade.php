<div>
    <div class="col-sm-3">
        <div class="card mb-n1">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.visitors.store','id' => 'visitantes']) !!}

                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del visitante']) !!}

                    @error('nombre')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('provincia', 'Provincia') !!}
                    {!! Form::text('provincia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la provincia del visitante']) !!}
                
                    @error('provincia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>

                <div class="form-group">
                    {!! Form::label('ciudad', 'Ciudad') !!}
                    {!! Form::text('ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la ciudad del visitante']) !!}

                    @error('ciudad')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! Form::label('barrio', 'Barrio') !!}
                    {!! Form::text('barrio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del visitante']) !!}
                
                    @error('barrio')
                        <span class="text-danger">{{$message}} <br></span>
                    @enderror
                    
                    {{-- {!! Form::checkbox($name, $value, $checked, [$options]) !!}
                         {!! Form::text    ($name, $value,           [$options]) !!} 
                         {!! Form::radio   ($name, $value, $checked, [$options]) !!} --}}
                    {!! Form::label('salvo', 'Salvo: ') !!}
                    {!! Form::radio('salvo', 0,true) !!}
                    {!! Form::label('no', 'No') !!}
                    {!! Form::radio('salvo', 1,null) !!}
                    {!! Form::label('si', 'Si') !!}

                    {!! Form::label('bautizado', 'Bautizado: ',['class' => 'ml-4 mt-4']) !!}
                    {!! Form::radio('bautizado', 0,true) !!}
                    {!! Form::label('no', 'No') !!}
                    {!! Form::radio('bautizado', 1,null) !!}
                    {!! Form::label('si', 'Si') !!}
                    
                </div>

                <div class="form-group mt-n2">
                    {!! Form::label('lesson_id', 'Lección') !!}
                    {!! Form::select('lesson_id', $lessons, null,['class' => 'form-control', 'id' => 'leccion']) !!}

                    @error('leccion')
                        <span class="text-danger">{{$message}} <br></span>
                    @enderror

                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del visitante' , 'readonly']) !!}
                
                    @error('slug')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                
                </div>
                
                <div class="form-group">
                    {!! Form::hidden('creado_por', auth()->id()) !!}
                </div>

                <div class="form-group">
                    {!! Form::hidden('actualizado_por', auth()->id()) !!}
                </div>

                {!! Form::submit('Ingresar visitante', ['class' => 'btn btn-success']) !!}
                
            {!! Form::close() !!}
            </div>
        </div>
    </div>

    

</div>
