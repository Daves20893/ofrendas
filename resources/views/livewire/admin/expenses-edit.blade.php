<div>
    <div class="col-sm-4">
        <div class="card mb-n1">
            <div class="card-body">
                {!! Form::model($expense, ['route' => ['admin.expenses.update',$expense], 'method' => 'put']) !!}
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                {!! Form::label('categoria', 'Categoria') !!}
                                {!! Form::select('categoria', $cat, null, ['class' => 'form-control']) !!}
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
                    {!! Form::submit('Actualizar gasto', ['class' => 'btn btn-primary']) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready( function() {
            var gasto = <?php echo json_encode($expense) ?>;
            console.log(gasto.category_id);
            document.getElementById("categoria").value=gasto.category_id;

            /* var editar_ofrenda = <?php echo json_encode($expense) ?>;
            var n = editar_ofrenda.length;
            for(var i = 0; i < n ; i++){
                if(editar_ofrenda[i].id == editar_ofrendas.brother_id){
                    brother=editar_ofrenda[i];
                    console.log(brother.name);
                }   
            }
            //console.log(ofrenda);
            document.getElementById("nombre").value=brother.name;
            document.getElementById("cedula").value=brother.identificador; */
        });
    </script>

</div>
