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
                <div class="col-md-2">
                    <input class="form-control" type="text" wire:model="search" placeholder="Búsqueda por nombre">
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6 ml-1">
                            <input class="form-control" type="text" wire:model="search2" placeholder="Búsq. por provincia">
                        </div>
                        <div class="col-md-5 ml-1">
                            <input class="form-control" type="text" wire:model="search3" placeholder="Búsq. ciudad">
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-6 ml-n4">
                            <input class="form-control" type="text" wire:model="search4" placeholder="Búsqueda por barrio">
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-success mb-2" href="{{route('admin.visitors.create')}}">Ingresar un visitante</a>
                        </div> 
                    </div>
                </div>
              
            </div>
            
                
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('nombre')">
                            Nombre
                            @if ($sort=="nombre")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('provincia')">
                            Provincia
                            @if ($sort=="provincia")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('ciudad')">
                            Ciudad
                            @if ($sort=="ciudad")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('barrio')">
                            Barrio
                            @if ($sort=="barrio")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('salvo')">
                            Salvo
                            @if ($sort=="salvo")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('bautizado')">
                            Bautizado
                            @if ($sort=="bautizado")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('discipulado')">
                            Discipulado
                            @if ($sort=="discipulado")
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
                @if ($visitors->count())
                <tbody>
                    
                    @foreach ($visitors as $visitor)
                        <tr>
                            <td>{{$visitor->nombre}}</td>
                            <td>{{$visitor->provincia}}</td>
                            <td>{{$visitor->ciudad}}</td>
                            <td>{{$visitor->barrio}}</td>
                            <td>
                                @if ($visitor->salvo=="0")
                                    {{ "No" }}
                                @else
                                    {{ "Si" }}
                                @endif   
                            </td>
                            <td>
                                @if ($visitor->bautizado=="0")
                                    {{ "No" }}
                                @else
                                    {{ "Si" }}
                                @endif 
                            </td>
                            <td>{{$visitor->leccion}}</td>
                            <td width="150px">
                                <form action="{{route('admin.visitors.destroy', $visitor)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a class= "btn btn-primary btn-sm" href="{{route('admin.visitors.edit', $visitor)}}">Editar</a>
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
                {!! $visitors->links() !!}
            </div>
            
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</div>

