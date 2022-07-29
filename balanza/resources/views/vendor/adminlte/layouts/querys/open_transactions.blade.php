<div class="box">
            <div class="box-header">
              <h3 class="box-title">Operaciones abiertas</h3>
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
                    <select class="form-control" id="type_input">
                      <option value="nro">Nro boleto</option>
                      <option value="rif">rif</option>
                    </select>
                  <div class="input-group">
                    <input type="text" id="input_value" placeholder="Buscar..." class="form-control">
                      <span class="input-group-btn">
                      <button type="button" name="search" id="search_open_transaction" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                  </div>
                </div>
              
              </div>
              <!--in this site begin the respose-->
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Nro Boleto</th>
                <th class="sorting">Peso Inicial</th>
                <th class="sorting">Rif Beneficiario</th>
                <th class="sorting">Nombre Beneficiario</th>
                <th class="sorting">Opciones</th>

                </tr>
                </thead>
                @foreach($transactions as $transaction)
                <tbody>
                  <tr>
                    <td id="id_transaccion">{{$transaction->id}}</td>
                    <td>{{$transaction->input_weight}} kg</td>
                    <td>J - {{$transaction->beneficiary_rif}}</td>
                    <td>{{$transaction->name}}</td>
                    <td><a href="transaction/{{$transaction->id}}/edit" class="btn btn-info" id="edit_transaction">Cerrar</a></td>
                  </tr>
                </tbody>
                @endforeach
                <div class="datos"></div>
                <tfoot>
                <tr>
                <th class="sorting_asc">Nro Boleto</th>
                <th class="sorting">Peso Inicial</th>
                <th class="sorting">Rif Beneficiario</th>
                <th class="sorting">Nombre Beneficiario</th>
                <th class="sorting">Opciones</th>
                </tr>
                </tfoot>
              </table>
              </div>
                <div>
                  {{$transactions->links()}}
                </div>
              <!--in this site finish the response-->
              </div><!--row-->
              <div class="row">
              <div class="col-sm-5">
              
              </div>
              </div>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>