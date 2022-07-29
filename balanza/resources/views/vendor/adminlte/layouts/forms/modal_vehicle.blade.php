<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Vehiculo</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <!--role="form"-->
            <form>
              <div class="box-body">
                <div class="alert alert-danger hide"></div>
                <div class="alert alert-success hide"></div>
                <div class="form-group">
                  <label for="number_plate_vehicle">Placa</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-barcode"></i>
                    </div>
                    <input type="text" class="form-control" id="number_plate_vehicle" placeholder="Placa del vehiculo" value="{{$vehicle->number_plate}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="brand_vehicle">Marca</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-adn"></i>
                    </div>
                    <input type="text" class="form-control" id="brand_vehicle" placeholder="Marca del Vehiculo" value="{{$vehicle->brand}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="model_vehicle">Modelo</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-car"></i>
                    </div>
                    <input type="text" class="form-control" id="model_vehicle" placeholder="Modelo del vehiculo" value="{{$vehicle->model}}">
                  </div>
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="button" value="vehicle/{{$vehicle->id}}" class="btn btn-primary" id="update_vehicle">Guardar</button>
              </div>
            </form>
          </div>