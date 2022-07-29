              <!--the response begin here-->
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Placa</th>
                <th class="sorting">Marca</th>
                <th class="sorting">Modelo</th>
                </tr>
                </thead>
                @foreach($vehicles as $vehicle)
                <tbody>
                  <tr>
                    <td>{{$vehicle->number_plate}}</td>
                    <td>{{$vehicle->brand}}</td>
                    <td>{{$vehicle->model}}</td>
                    <td>
                      <a href="vehicle/{{$vehicle->id}}/edit" class="btn btn-warning" id="edit_vehicle">Editar</a>
                      <button value="{{$vehicle->id}}" class="btn btn-danger" id="delete_vehicle">Borrar</button>
                    </td>
                  </tr>
                </tbody>
                @endforeach
                <div class="datos"></div>
                <tfoot>
                <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                </tr>
                </tfoot>
              </table>
              </div>
                <div>
                  {{$vehicles->links()}}
                </div>
                <!--finish the response-->