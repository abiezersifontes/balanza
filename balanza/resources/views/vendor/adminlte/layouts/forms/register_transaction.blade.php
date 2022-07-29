<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Operacion</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="alert alert-danger hide"></div>
        <div class="alert alert-success hide"></div>
        
        <!--<label>Fecha y hora de entrada</label>
        
        <div class="row">
          
          <div class="col-md-6">
                <input type="text" class="form-control" id="date_input">
          </div>
          <div class="col-md-2">
                <select id="hour_input" class="form-control">
                  @for($i=1;$i<13;$i++)
                    @if($i > 9)
                        <option value="{{$i}}">{{$i}}</option>
                      @else
                        <option value="0{{$i}}">0{{$i}}</option>
                      @endif
                  @endfor
                </select>          
          </div>
            <div class="col-md-2">
                  <select id="minute_input" class="form-control">
                    @for($i=0;$i<61;$i++)
                      @if($i > 9)
                        <option value="{{$i}}">{{$i}}</option>
                      @else
                        <option value="0{{$i}}">0{{$i}}</option>
                      @endif
                    @endfor
                  </select>          
            </div>
          
            <div class="col-md-2">
                  <select id="period_input" class="form-control">
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                  </select>          
            </div>
            
          </div>

          <br>
          
          <label>Fecha y hora de Salida</label>
        
        <div class="row">
          
          <div class="col-md-6">
                <input type="text" class="form-control" id="date_output">
          </div>
          <div class="col-md-2">
                <select id="hour_output" class="form-control">
                  @for($i=1;$i<13;$i++)
                    @if($i > 9)
                        <option value="{{$i}}">{{$i}}</option>
                      @else
                        <option value="0{{$i}}">0{{$i}}</option>
                      @endif
                  @endfor
                </select>          
          </div>
            <div class="col-md-2">
                  <select id="minute_output" class="form-control">
                    @for($i=0;$i<61;$i++)
                      @if($i > 9)
                        <option value="{{$i}}">{{$i}}</option>
                      @else
                        <option value="0{{$i}}">0{{$i}}</option>
                      @endif
                    @endfor
                  </select>          
            </div>
          
            <div class="col-md-2">
                  <select id="period_output" class="form-control">
                    <option value="am">AM</option>
                    <option value="pm">PM</option>
                  </select>          
            </div>
              
          </div>

          <br>-->


          <div class="row">
              <div class="<col-sm-5></col-sm-5> col-md-4">
                <label><strong>Producto</strong></label>
                <select class="form-control" id="product">
                  <option value=""></option>
                  @foreach($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-2">
              <label><strong>Tipo</strong></label>
                <select class="form-control" id="type_transaction">
                  <option value="sale" >Venta</option>
                  <option value="purchase" >Compra</option>
                </select>
              </div>
              <div class="col-md-3">
                <label><strong>Peso de entrada (kg)</strong></label>
                <input type="text" placeholder="Peso inicial" class="form-control" id="input_weight">
              </div>

              <div class="col-md-3">
              <label><strong>Peso de salida (kg)</strong></label>
                <input class="form-control" placeholder="Peso final" disabled="disabled"></input>
              </div>
            </div>

            <br>
          
            <div class="row">
              <div class="col-md-6">
                <label><strong>Rif</strong></label>
                <select class="form-control" id="rif_beneficiary" style="width: 100%;">
                  <option value=""></option>
                  @foreach($beneficiarys as $beneficiary)
                    <option value="{{$beneficiary->rif}}">{{$beneficiary->rif}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label><strong>Beneficiario</strong></label>
                <input class="form-control" id="name_beneficiary" disabled="disabled"></input>
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-6">
                <label><strong>Cedula</strong></label>
                <select class="form-control" id="rif_driver" style="width: 100%;">
                <option value=""></option>
                  @foreach($drivers as $driver)
                    <option value="{{$driver->rif}}">{{$driver->rif}}</option>
                  @endforeach    
                </select>
              </div>
              <div class="col-md-6">
                <label><strong>Chofer</strong></label>
                <input class="form-control" id="name_driver" disabled="disabled">
              </div>
            </div>

            <br>

            <div class="row">
              <div class="col-md-4">
                <label><strong>Placa</strong></label>
                <select class="form-control" id="number_plate_vehicle" style="width: 100%;">
                  <option value=""></option>
                  @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->number_plate}}">{{$vehicle->number_plate}}</option>
                  @endforeach    
                </select>
              </div>
              <div class="col-md-4">
              <label><strong>Marca</strong></label>
                <input class="form-control" id="brand_vehicle" disabled="disabled"></input>
              </div>
              <div class="col-md-4">
              <label><strong>Modelo</strong></label>
                <input class="form-control" id="model_vehicle" disabled="disabled"></input>
              </div>
                </div>
                <!-- /.form-group -->         
              <!-- /.col -->
            </div>
          <!-- /.row -->
        <div class="box-footer">
          <button type="button" class="btn btn-primary" id="save_transaction">Guardar</button>
        </div>
        </div><!-- /.box-body -->        
      </div><!-- /.box-default -->