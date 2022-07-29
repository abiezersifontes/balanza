<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chofer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <!--role="form"-->
            <form>
              <div class="box-body">
                <div class="alert alert-danger hide"></div>
                <div class="alert alert-success hide"></div>
                <div class="form-group">
                  <label for="rif_driver">Cedula</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-id-card"></i>
                    </div>
                    <input type="text" class="form-control" id="rif_driver" placeholder="Cedula del chofer" value="{{$driver->rif}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name_driver">Nombre</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-child"></i>
                    </div>
                    <input type="text" class="form-control" id="name_driver" placeholder="Nombre del chofer" value="{{$driver->name}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="phone_driver">Telefono</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-phone"></i>
                    </div>
                    <input type="text" class="form-control" id="phone_driver" placeholder="Telefono del chofer" value="{{$driver->phone}}">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-primary" id="update_driver">Guardar</button>
              </div>
            </form>
          </div>