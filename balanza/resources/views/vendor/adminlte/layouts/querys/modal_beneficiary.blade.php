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
                    <td>{{$beneficiary->rif}}</td>
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