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
                <div class="col-sm-1">
                    <input class="form-control" type="text" wire:model="search" placeholder="Búsq. fecha">
                </div>
                <div class="col-sm-2">
                    <input class="form-control" type="text" wire:model="search2" placeholder="Búsqueda por nombre">
                </div>
                <div class="col-sm-2">
                    <a class="btn btn-success mb-2" href="{{route('admin.offerings.create')}}">Ingresar una nueva ofrenda</a>
                </div>               
            </div>
            
                
            <table id="example" class="table table-striped">
                <thead>
                    <tr>
                        <th class="cursor-pointer" wire:click="order('fecha')">
                            Fecha
                            @if ($sort=="fecha")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('name')">
                            Nombre
                            @if ($sort=="name")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('diezmo')">
                            Diezmo
                            @if ($sort=="diezmo")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('ofrenda')">
                            Ofrenda
                            @if ($sort=="ofrenda")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                                
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('mision')">
                            Misiones
                            @if ($sort=="mision")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('protemplo')">
                            Protemplo
                            @if ($sort=="protemplo")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('servicio')">
                            Servicio
                            @if ($sort=="servicio")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer" wire:click="order('buena_dadiva')">
                            Buena Dádiva
                            @if ($sort=="buena_dadiva")
                                @if ($direction=='asc')
                                    <i class="fa fa-sort-alpha-down mt-1"></i>
                                @else
                                    <i class="fa fa-sort-alpha-up mt-1"></i>
                                @endif
                            @else
                                <i class="fa fa-sort mt-1"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer">
                            Otras ofrendas
                        </th>
                        <th class="cursor-pointer">
                            Monto
                        </th>
                        <th class="cursor-pointer" wire:click="order('total')">
                            Total
                            @if ($sort=="total")
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
                            <td>Terreno</td>
                            <td>1.00</td>
                            <td>{{$offering->total}}</td>
                            <td width="150px">
                                <form action="{{route('admin.offerings.destroy', $offering)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a class= "btn btn-primary btn-sm" href="{{route('admin.offerings.edit', $offering)}}">Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                {{-- <form action="">
                                    <div>
                                        <button type="button" class="open-exampleModal btn btn-primary btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" data-id="{{ $offering-> id }}">Editar</button>
                                        <div class="modal fade bd-example-modal-lg-e" id="modal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h3 class="modal-title" id="exampleModalLabel">Ingresar una ofrenda</h3>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @livewire('admin.offering-edit')
                                                    </div>
                                                    <div class="modal-footer">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="resetear()">Eliminar</button>
                                    </div>   
                                </form> --}}
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
                {!! $offerings->links() !!}
            </div>
            
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</div>
