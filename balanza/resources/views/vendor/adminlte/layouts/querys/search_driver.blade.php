              <!--the response begin here-->
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Cedula</th>
                <th class="sorting">Nombre</th>
                <th class="sorting">Telefono</th>
                </tr>
                </thead>
                @foreach($driverss as $driver)
                <tbody>
                  <tr>
                    <td>{{$driver->rif}}</td>
                    <td>{{$driver->name}}</td>
                    <td>{{$driver->phone}}</td>
                    <td>
                    <a href="driver/{{$driver->rif}}/edit" class="btn btn-warning" id="edit_driver">Editar</a>
                    <button value="{{$driver->rif}}" class="btn btn-danger" id="delete_driver">Borrar</button>
                    </td>
                  </tr>
                </tbody>
                @endforeach
                <div class="datos"></div>
                <tfoot>
                <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Telefono</th>
                </tr>
                </tfoot>
              </table>
              </div>
                <div>
                  {{$driverss->links()}}
                </div>
              <!--finish the response-->
