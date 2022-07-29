<div class="box">
            <div class="box-header">
              <h3 class="box-title">Beneficiarios</h3>
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
                    <select class="form-control" id="type_input_beneficiary">
                      <option value="rif">Rif</option>
                      <option value="name">Nombre</option>
                    </select>
                  <div class="input-group">
                    <input type="text" id="input_value" placeholder="Buscar..." class="form-control">
                      <span class="input-group-btn">
                      <button type="button" name="search" id="search_beneficiary" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>
                </div>
              
              </div>

              <!--the response begin here-->              
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Rif</th>
                <th class="sorting">Nombre</th>
                <th class="sorting">Telefono</th>
                </tr>
                </thead>
                @foreach($beneficiarys as $beneficiary)
                <tbody>
                  <tr>
                    <td>{{$beneficiary->type_id}} - {{$beneficiary->rif}}</td>
                    <td>{{$beneficiary->name}}</td>
                    <td>{{$beneficiary->phone}}</td>
                    <td>
                      <a href="beneficiary/{{$beneficiary->rif}}/edit" class="btn btn-warning" id="edit_beneficiary">Editar</a>
                      <button value="{{$beneficiary->rif}}" class="btn btn-danger" id="delete_beneficiary">Borrar</button>
                    </td>
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
                <div>
                  {{$beneficiarys->links()}}
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