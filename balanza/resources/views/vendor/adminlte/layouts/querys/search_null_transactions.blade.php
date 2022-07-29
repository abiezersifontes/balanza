<!--in this site begin the respose-->
              <div class="col-sm-12">
              <table id="example1" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                <thead>
                <tr role="row">
                <th class="sorting_asc">Nro Boleto</th>
                <th class="sorting">Peso Inicial</th>
                <th class="sorting">Rif Beneficiario</th>
                <th class="sorting">Nombre Beneficiario</th>

                </tr>
                </thead>
                @foreach($transactions as $transaction)
                <tbody>
                  <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->input_weight}} kg</td>
                    <td>{{$transaction->beneficiary_rif}}</td>
                    <td>{{$transaction->name}}</td>
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
                </tr>
                </tfoot>
              </table>
              </div>
                <div>
                  {{$transactions->links()}}
                </div>
              <!--in this site finish the response-->
              