<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Beneficiario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <!--role="form"-->
            <form>
              <div class="box-body">
                <div class="alert alert-danger hide"></div>
                <div class="alert alert-success hide"></div>
                <div class="row">

                  <div class="col-md-1">
                  <label for="rif_beneficiary">Tipo</label>
                    <select class="form-control" id="type_id">
                      <option value="{{$beneficiary->type_id}}" selected="selected">{{$beneficiary->type_id}}</option>
                      <option value="{{$false_type_id}}">{{$false_type_id}}</option>
                    </select>
                  </div>

                  <div class="col-md-11">
                    <div class="form-group">
                    <label for="rif_beneficiary">Rif</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                      </div>
                      <input type="text" class="form-control" id="rif_beneficiary" value="{{$beneficiary->rif}}" placeholder="Rif del beneficiario">
                    </div>
                  </div>
                  </div>
                  
                </div>

                <div class="form-group">
                  <label for="name_beneficiary">Nombre</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building-o"></i>
                    </div>
                    <input type="text" class="form-control" id="name_beneficiary" placeholder="Nombre del beneficiario" value="{{$beneficiary->name}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone_beneficiary">Telefono</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" id="phone_beneficiary" placeholder="Telefono del beneficiario" value="{{$beneficiary->phone}}">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="update_beneficiary">Guardar</button>
              </div>
            </form>
          </div>