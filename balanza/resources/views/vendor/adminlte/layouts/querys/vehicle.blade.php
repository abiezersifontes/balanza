<div class="box">
            <div class="box-header">
              <h3 class="box-title">Vehiculos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-7">
              <div class="dataTables_length" id="example1_length">
              </div>
              </div>
              <div class="col-sm-5">
                <div id="example1_filter" class="dataTables_filter">
                    <select class="form-control" id="type_input_vehicle">
                      <option>Placa</option>
                    </select>
                  <div class="input-group">
                    <input type="text" id="vehicle_number" placeholder="Buscar..." class="form-control">
                      <span class="input-group-btn">
                      <button type="button" name="search" id="search_vehicle" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>
                </div>
              </div>
              </div>
              <div class="row search_resp">

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
              </div><!-- .row -->
              <div class="row">
              <div class="col-sm-5">
              
              </div>
              </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>