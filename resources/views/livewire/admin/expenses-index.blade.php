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
        {{-- <p>{{$offer}}</p>

        <p>{{$offerings}}</p> --}}
       
        <div class="card-body">
            <div class="row">
                <div class="col-sm-2">
                    <input class="form-control" type="text" wire:model="search" placeholder="Búsqueda por categoria">
                </div>
                <div class="col-sm-5 ml-5">
                    <input class="form-control" type="text" wire:model="search2" placeholder="Búsqueda por descripción">
                </div>
                <div class="col-sm-2 ml-5">
                    <a class="btn btn-success mb-2" href="{{route('admin.expenses.create')}}">Ingresar un gasto</a>
                </div>               
            </div>
            
                
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('categoria')">
                            Categoria
                            @if ($sort=="categoria")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('descripcion')">
                            Descripción
                            @if ($sort=="descripcion")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('monto')">
                            Monto
                            @if ($sort=="monto")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                @if ($expenses->count())
                <tbody>
                    
                    @foreach ($expenses as $expense)
                        <tr>
                            <td>{{$expense->categoria}}</td>
                            <td>{{$expense->descripcion}}</td>
                            <td>{{$expense->monto}}</td>
                            <td width="150px">
                                <form action="{{route('admin.expenses.destroy', $expense)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a class= "btn btn-primary btn-sm" href="{{route('admin.expenses.edit', $expense)}}">Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
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
                {!! $expenses->links() !!}
            </div>
            
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</div>
