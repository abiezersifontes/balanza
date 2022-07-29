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
            <div class="col-md-4">
                <label for="product">Producto</label>
                <select class="form-control product" disabled="disabled">
                  <option value="">{{$transaction->product_name}}</option>
                </select>
              </div>
              <div class="col-md-2">
              <label>Tipo</label>
                <select class="form-control type_transaction" disabled="disabled">
                  @if($transaction->type == "sale")
                  <option value="sale" selected="selected">Venta</option>
                  <option value="purchase" >Compra</option>
                  
                  @else
                  <option value="sale" >Venta</option>
                  <option value="purchase" selected="selected">Compra</option>
                  @endif;
                </select>
              </div>
              <div class="col-md-3">
                <label>Peso de entrada (kg)</label>
                <input type="text" placeholder="Peso inicial" id="input_weight" value="{{$transaction->input_weight}}" class="form-control">
              </div>
              <div class="col-md-3">
              <label>Peso de salida (kg)</label>
                <input class="form-control" id="output_weight" placeholder="Peso final"></input>
              </div>
            </div>

            <br>

          <div class="row">
              <div class="col-md-6">
                <label>Rif</label>
                <select class="form-control rif_beneficiary" style="width: 100%;" disabled="disabled">
                    <option value="{{$transaction->beneficiary_rif}}">{{$transaction->beneficiary_rif}}</option>
                </select>
              </div>
              <div class="col-md-6">
              <label>Beneficiario</label>
                <input class="form-control" id="name_beneficiary" value="{{$transaction->beneficiary_name}}" disabled="disabled"></input>
              </div>
            </div>

            <br>

          <div class="row">
            <div class="col-md-6">
              <label>Cedula</label>
              <select class="form-control rif_driver" style="width: 100%;" disabled="disabled">
                  <option value="{{$transaction->driver_rif}}">{{$transaction->driver_rif}}</option>
              </select>
            </div>
            <div class="col-md-6">
            <label>Chofer</label>
              <input class="form-control" id="name_driver" disabled="disabled" value="{{$transaction->name_driver}}">
            </div>
          </div>

          <br>

          <div class="row">
            <div class="col-md-4">
              <label>Placa</label>
              <select class="form-control number_plate_vehicle" style="width: 100%;" disabled="disabled">
                  <option value="{{$transaction->number_plate_vehicle}}">{{$transaction->number_plate_vehicle}}</option>
              </select>
            </div>
            <div class="col-md-4">
            <label>Marca</label>
              <input class="form-control" id="brand_vehicle" disabled="disabled" value="{{$transaction->brand_vehicle}}"></input>
            </div>
            <div class="col-md-4">
            <label>Modelo</label>
              <input class="form-control" id="model_vehicle" disabled="disabled" value="{{$transaction->model_vehicle}}"></input>
            </div>
              </div>
              <!-- /.form-group -->         
            <!-- /.col -->
          </div>
          <!-- /.row -->
        <div class="box-footer">
        <input type="hidden" id="transaction_id" value="{{$transaction->id}}">
        <button type="button" class="btn btn-primary" id="close_transaction">Guardar</button>
        </div>
        </div>
        <!-- /.box-body -->
      </div>