<div>
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div> 
    @endif
    
    @error('slug')
    <div class="alert alert-danger">
        <span class="text-danger">{{$message}}</span>
    </div>
    @enderror

    <div class="card">
       
        <div class="card-body">
            <div class="row">
                {!! Form::open(['route' => 'admin.reports.individual.pdf', 'method' => 'post']) !!}
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3">
                            {{-- <label for="">Fecha Inicio</label>
                            <input class="form-control" type="date" wire:model="search" placeholder="Fecha Inicio"> --}}
                            {!! Form::label('fechainicio', 'Fecha Inicio') !!}
                            {!! Form::date('fechainicio', null, ['class' => 'form-control', 'wire:model' => 'search']) !!}
                        </div>
                        <div class="col-sm-3">
                            {{-- <label for="">Fecha Fin</label>
                            <input class="form-control" type="date" wire:model="search2" placeholder="Fecha Fin"> --}}
                            {!! Form::label('fechafin', 'Fecha Fin') !!}
                            {!! Form::date('fechafin', null, ['class' => 'form-control', 'wire:model' => 'search2']) !!}
                        </div>
                        <div class="col-sm-3"> {{-- wire:ignore --}}
                            <div class="form-group">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::select('nombre', $b_s, null,['class' => 'form-control', 'id' => 'brother_id', 'wire:model' => 'selector']) !!}
                            </div>    
                        </div>
                        <div class="col-sm-2 mt-2">
                            {{-- <a class="btn btn-success" href="{{route('admin.offerings.create')}}">Descargar PDF</a> --}}
                            
                            <br>
                            @if ($offerings->count())
                            {!! Form::submit('Descargar PDF', ['class' => 'btn btn-primary']) !!}
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>               
            </div>
            
                
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th>Diezmo</th>
                        <th>Ofrenda</th>
                        <th>Misiones</th>
                        <th>Protemplo</th>
                        <th>Servicio</th>
                        <th>Buena Dádiva</th>
                        <th>Total</th>
                    </tr>
                </thead>
                @if ($offerings->count())
                <tbody>
                    
                    @foreach ($offerings as $offering)
                        <tr>
                            <td>{{$offering->fecha}}</td>
                            <td>{{$offering->name}}</td>
                            <td>{{$offering->diezmo}}</td>
                            <td>{{$offering->ofrenda}}</td>
                            <td>{{$offering->mision}}</td>
                            <td>{{$offering->protemplo}}</td>
                            <td>{{$offering->servicio}}</td>
                            <td>{{$offering->buena_dadiva}}</td>
                            <td>{{$offering->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <tbody>
            </tbody>
            </table>
                        <div class="mt-2 flex justify-center">
                            No existe ningún registro que mostrar
                        </div>    
            @endif
            <div class="d-flex justify-content-end">
                {!! $offerings->links() !!}
            </div>
            
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</div>

