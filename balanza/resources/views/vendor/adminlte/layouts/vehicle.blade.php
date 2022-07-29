<div class="box">
            <div class="box-header">
              <h3 class="box-title">Vehiculos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-4">
              <div class="dataTables_length" id="example1_length">
              </div>
              </div>
              <div class="col-sm-8">
                <div id="example1_filter" class="dataTables_filter">
                  <!--<label>Buscar:
                    <select class="form-control" id="type_input_driver">
                      <option>Rif</option>
                      <option>Nombre</option>
                    </select>
                    <input type="text" class="form-control" id="search_driver" placeholder="Buscar Chofer">
                  </label>-->
                </div>
              </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Rif</th>
                <th class="sorting">Nombre</th>
                <th class="sorting">Telefono</th>
                </tr>
                </thead>
                @foreach($vehicles as $vehicle)
                <tbody>
                  <tr>
                    <td>{{$vehicle->number_plate}}</td>
                    <td>{{$vehicle->brand}}</td>
                    <td>{{$vehicle->model}}</td>
                  </tr>
                </tbody>
                @endforeach
                <div class="datos"></div>
                <tfoot>
                <tr>
                <th>Rif</th>
                <th>Nombre</th>
                <th>Telefono</th>
                </tr>
                </tfoot>
              </table>
              </div>
              </div>
              <div class="row">
              <div class="col-sm-5">
              
                <div>
                  {{$vehicles->links()}}
                </div>
              </div>
              </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>