<div>
    <div class="col-sm-4">
        <div class="card mb-n1">
            <div class="card-body">
                {!! Form::open(['route' => 'admin.expenses.store']) !!}
                {{-- {!! Form::open(['route' => ['admin.expenses.update',$expense_id], 'method' => 'put']) !!} --}}
                    <div class="row">
                        <div class="col-sm-8">
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
                    </div>

                    <div class="row">
                        <div class="col-sm-14"> {{-- wire:ignore --}}
                            <div class="form-group">
                            {!! Form::label('descripcion', 'Descripción') !!}
                            {!! Form::textArea('descripcion', null,['class' => 'form-control']) !!}
                            </div>    
                    </div>
                    </div>    
                    
                    <div class="form-group">
                        {!! Form::hidden('creado_por', auth()->id()) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::hidden('actualizado_por', auth()->id()) !!}
                    </div>

                    {{-- {!! Form::submit('Actualizar ofrenda', ['class' => 'btn btn-primary', 'id' => 'Ingresar_Ofrenda']) !!} --}}
                    {!! Form::submit('Ingresar gasto', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug2.js')}}"></script> --}}
    <script src="{{asset('vendor/jQuery-suma/Suma.js')}}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script src="{{asset('vendor/jQuery-suma/Decimales.js')}}"></script>

</div>
