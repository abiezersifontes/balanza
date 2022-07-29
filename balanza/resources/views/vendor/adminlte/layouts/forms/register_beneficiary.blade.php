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
                  <label for="rif_beneficiary"><strong>Tipo</strong></label>
                    <select class="form-control" id="type_id">
                      <option value="J">J</option>
                      <option value="V">V</option>
                    </select>
                  </div>

                  <div class="col-md-11">
                    <div class="form-group">
                    <label for="rif_beneficiary"><strong>Rif</strong></label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-id-card"></i>
                      </div>
                      <input type="text" class="form-control" id="rif_beneficiary" placeholder="Rif del beneficiario">
                    </div>
                  </div>
                  </div>
                  
                </div>

                <div class="form-group">
                  <label for="name_beneficiary"><strong>Nombre</strong></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-building-o"></i>
                    </div>
                    <input type="text" class="form-control" id="name_beneficiary" placeholder="Nombre del beneficiario">
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone_beneficiary"><strong>Telefono</strong></label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" id="phone_beneficiary" placeholder="Telefono del beneficiario">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="save_beneficiary">Guardar</button>
              </div>
            </form>
          </div>