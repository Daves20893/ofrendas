<!doctype html>
<html lang="en">

<head>
    <title>Informe de ofrendas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
         table {
            font-size: 12px;
        }

        /*celda {
            float: right
        } */

        @page { margin: 50px 50px; }
        /* #header { position: fixed; left: 0px; top: -180px; right: 0px; height: 150px; background-color: orange; text-align: center; } */
        .imagen { width:100px; height:100px; margin-top:-25px;  float: right;}
        #detalle { margin-top: -10px; font-style:; font-size: 16px; font-family: Verdana, sans-serif}
        #footer { position: fixed; left: 0px; bottom: -18px; right: 0px; height: 18px; background-color: rgb(176, 185, 189); text-align: center; font-size: 10px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif}
        #footer .page:after { content: counter(page, upper-roman); }
    </style>
</head>

<body>
    <div>
        
        <h4 class="font-weight-bold text-center"><img class="imagen" src="{{URL::asset('Images/IBBF_logo4.png')}}">INFORME DE OFRENDAS</h4>
        <br>
        <div id="detalle">
            <p class="font-weight-bold small">Nombre: {{ $bro->name }}</p>
            <p class="font-weight-bold small">Desde el {{ $request->fechainicio }} hasta el {{ $request->fechafin }}</p>
        </div>
        {{-- <table class="table table-bordered mt-5"> --}}
            <table class="table table-striped table-sm mt-2">
                @php
                    $suma_diezmo=0;
                    $suma_ofrenda=0;
                    $suma_misiones=0;
                    $suma_protemplo=0;
                    $suma_servicio=0;
                    $suma_buenadadiva=0;
                    $suma_total=0;
                @endphp
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Diezmo</th>
                    <th class="text-center">Ofrenda</th>
                    <th class="text-center">Misiones</th>
                    <th class="text-center">Protemplo</th>
                    <th class="text-center">Servicio</th>
                    <th class="text-center">Buena Dádiva</th>
                    <th class="text-center">Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($offerings as $offering)
                        <tr>
                            <td class="text-center">{{$offering->fecha}}</td>
                            <td class="text-right">{{$offering->diezmo}}</td>
                            <td class="text-right">{{$offering->ofrenda}}</td>
                            <td class="text-right">{{$offering->mision}}</td>
                            <td class="text-right">{{$offering->protemplo}}</td>
                            <td class="text-right">{{$offering->servicio}}</td>
                            <td class="text-right">{{$offering->buena_dadiva}}</td>
                            <td class="text-right">{{$offering->total}}</td>
                            @php
                                //$suma+=$solicitud->amount;sumanos los valores, ahora solo fata mostrar dicho valor
                                $suma_diezmo+=$offering->diezmo;
                                $suma_ofrenda+=$offering->ofrenda;
                                $suma_misiones+=$offering->mision;
                                $suma_protemplo+=$offering->protemplo;
                                $suma_servicio+=$offering->servicio;
                                $suma_buenadadiva+=$offering->buena_dadiva;
                                $suma_total+=$offering->total;
                            @endphp 
                </tr>
                @empty

                @endforelse

                @php
                    $suma_diezmof=number_format($suma_diezmo, 2);
                    $suma_ofrendaf=number_format($suma_ofrenda, 2);
                    $suma_misionesf=number_format($suma_misiones, 2);
                    $suma_protemplof=number_format($suma_protemplo, 2);
                    $suma_serviciof=number_format($suma_servicio, 2);
                    $suma_buenadadivaf=number_format($suma_buenadadiva, 2);
                    $suma_totalf=number_format($suma_total, 2);
                @endphp

                <tr>
                    <td class="text-center font-weight-bold">Total</td>
                    <td class="text-right font-weight-bold">{{$suma_diezmof}}</td>
                    <td class="text-right font-weight-bold">{{$suma_ofrendaf}}</td>
                    <td class="text-right font-weight-bold">{{$suma_misionesf}}</td>
                    <td class="text-right font-weight-bold">{{$suma_protemplof}}</td>
                    <td class="text-right font-weight-bold">{{$suma_serviciof}}</td>
                    <td class="text-right font-weight-bold">{{$suma_buenadadivaf}}</td>
                    <td class="text-right font-weight-bold">{{$suma_totalf}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="footer">
        @php
            $DateAndTime = date('d-m-Y h:i:s a', time());
        @endphp
        <p class="page">Generado el {{$DateAndTime}} - Página </p>
      </div>
        
</body>
</html>
