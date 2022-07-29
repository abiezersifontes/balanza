<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <!--<link type="text/css" rel="stylesheet" href="css/app.css">-->
        <style>
            .text-center{
                text-align: center;
            }
            .table_1{
                border:solid 0.2px;
                border-color:black;
                text-align:center;
                width:100%;
                border-spacing: 0.1px;
                padding: 0.1px;
                
            }
            .logo{
                padding-top: 10px;
                float:left;
                width:100px;
                height:40;
            }
        </style>
    </head>
    <body>
        <img class="logo" src="img/cabelum.jpg" alt="logo_cabelum">
    <h3 class="text-center">CONDUCTORES DE ALUMINIO DEL CARONI, C.A (CABELUM)</h3>
    <p class="text-center">Av. Perimetral, Nueva Zona Industrial, Edificio Cabelum. Ciudad Bolívar Edo. Bolívar</p>
    
    <h3 class="text-center">Boleto: N°{{$transaction->id}}</h3>
    
    @if($transaction->type=="purchase")
        <p class="text-center"><strong>TIPO DE OPERACION: </strong>COMPRA</p>
        <p><strong>Proveedor:</strong> {{$transaction->beneficiary_name}} / {{$transaction->type_id}}-{{$transaction->beneficiary_rif}}</p>
    @else
        <p class="text-center"><strong>TIPO DE OPERACION: </strong>VENTA</p>
        <p><strong>Cliente:</strong> {{$transaction->beneficiary_name}} / {{$transaction->type_id}}-{{$transaction->beneficiary_rif}}</p>
    @endif
    
        
        <table class="table_1">
            <!--<thead>
                <tr>
                    <th class="table_1">id</th>
                    <th class="table_1">Peso de Entrada</th>
                    <th class="table_1">Peso de Salida</th>
                </tr>
            </thead>-->
            <tbody>
                <tr>
                    <td class="table_1"><strong>Placa: </strong></td>
                    <td class="table_1">{{$transaction->number_plate_vehicle}}</td>
                    <td class="table_1"><strong>Conductor: </strong></td>
                    <td class="table_1">{{$transaction->name_driver}}</td>
                    <td class="table_1"><strong>Cedula: </strong></td>
                    <td class="table_1">V-{{$transaction->driver_rif}}</td>
                </tr>
                <tr>
                    <td class="table_1"><strong>Material: </strong></td>
                    <td colspan="5" class="table_1">{{$transaction->name_product}}</td>
                    
                </tr>
            </tbody>
        </table>
        <br>
        <table  class="table_1">
        <tbody>
                <tr>
                    <td  class="table_1"><strong>Fecha y Hora de entrada: </strong></td>
                    <td  class="table_1">{{$transaction->date_input}}</td>
                    <td  class="table_1"><strong>Peso de entrada: </strong></td>
                    <td  class="table_1">{{$transaction->input_weight}} Kg</td>
                </tr>
                <tr>
                    <td  class="table_1"><strong>Fecha y hora de salida: </strong></td>
                    <td  class="table_1">{{$transaction->date_output}}</td>
                    <td  class="table_1"><strong>Peso de salida: </strong></td>
                    <td  class="table_1">{{$transaction->output_weight}} Kg</td>
                </tr>
                <tr>
                    <td  class="table_1" colspan="3"><strong>Neto: </strong></td>
                    <td  class="table_1">{{$neto}} Kg</td>
                </tr>
            </tbody>
        </table>
        <br>

        <table  class="table_1">
            <tbody>
                <tr>
                    <td  class="table_1">
                        <strong>Despachado por: </strong>
                        <br>
                        <br>
                        <br>
                        {{$transaction->name_user}}
                    </td>
                    <td  class="table_1">
                        <strong>Recibido por: </strong>
                        <br>
                        <br>
                        <br>
                        {{$transaction->name_driver}}
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>