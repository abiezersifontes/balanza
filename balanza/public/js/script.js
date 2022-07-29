$(document).ready(function(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
      $( "#date_input" ).datepicker({
        language:'es',
        format:"dd/mm/yyyy"
      });
      $( "#date_output" ).datepicker({
        language:'es',
        format:"dd/mm/yyyy"
      });
    
        
    //soft delete for transactions
    $(document).on("click","#delete_transaction",function(event){
      event.preventDefault();
      id = $(this).val();      
      $.ajax({
        url:"transaction/"+id,
        type:"delete",
        success:function(data){
          $("section.content").html(data);
        },
        error:function(error){
          
        }
      });
    });

    //soft delete for driver
    $(document).on("click","#delete_driver",function(event){
      event.preventDefault();
      rif = $(this).val();      
      
      $.ajax({
        url:"driver/"+rif,
        type:"delete",
        success:function(data){
          $("section.content").html(data);
        },
        error:function(error){
          
        }
      });
    });

    //soft delete for beneficiary
    $(document).on("click","#delete_beneficiary",function(event){
      event.preventDefault();
      rif = $(this).val();      
      $.ajax({
        url:"beneficiary/"+rif,
        type:"delete",
        success:function(data){
          $("section.content").html(data);
        },
        error:function(error){
          
        }
      });
    });

    //soft delete for vehicle
    $(document).on("click","#delete_vehicle",function(event){
      event.preventDefault();
      id = $(this).val();      
      $.ajax({
        url:"vehicle/"+id,
        type:"delete",
        success:function(data){
          $("section.content").html(data);
        },
        error:function(error){
          
        }
      });
    });

    //search Drivers
    // $(document).on("keypress","#search_driver",function(){
    //   var input = $(this).val();
    //   var type_input = $("#type_input_driver").val();
    //   $.ajax({
    //     type:"GET",
    //     url:"query_driver",
    //     data:{input:input, type_input},
    //     dataType:"json",
    //     success:function(data){
    //       $(".respuesta").html(data);
    //     },
    //     error:function(errors){
    
    //     }
    //   });
    // });

    //search Vehicle
    $(document).on("click","#search_vehicle",function(){
      var number_plate = $("#vehicle_number").val();
      var url = "search_vehicle/"+number_plate;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });

    //search driver
    $(document).on("click","#search_driver",function(){
      var input_value = $("#input_value").val();
      var type_input_driver = $("#type_input_driver").val();
      var url = "search_driver/"+type_input_driver+"/"+input_value;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });

    //search beneficiary
    $(document).on("click","#search_beneficiary",function(){
      var input_value = $("#input_value").val();
      var type_input_beneficiary = $("#type_input_beneficiary").val();
      var url = "search_beneficiary/"+type_input_beneficiary+"/"+input_value;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });

    //search open transaction
    $(document).on("click","#search_open_transaction",function(){
      var input_value = $("#input_value").val();
      var type_input = $("#type_input").val();
      var url = "search_open_transaction/"+type_input+"/"+input_value;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });

    //search close transaction
    $(document).on("click","#search_close_transaction",function(){
      var input_value = $("#input_value").val();
      var type_input = $("#type_input").val();
      var url = "search_close_transaction/"+type_input+"/"+input_value;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });

    //search null transaction
    $(document).on("click","#search_null_transaction",function(){
      var input_value = $("#input_value").val();
      var type_input = $("#type_input").val();
      var url = "search_null_transaction/"+type_input+"/"+input_value;

      $.get(url,function(data){
        $(".search_resp").html(data);
      });
    });


    updated_transactions_transit();
    //obtain driver for transaction
    $(document).on("change","#rif_driver",function(){
      var rif = $(this).val();
      $.get("driver_for_transaction/"+rif,function(data){
        
        $('#name_driver').attr("value",data.name);
      });
    });
    //obtain beneficiary for transaction
    $(document).on("change","#rif_beneficiary",function(){
      var rif = $(this).val();
      $.get("beneficiary_for_transaction/"+rif,function(data){
        
        $('#name_beneficiary').attr("value",data.name);
      });
    });
    //obtain vehicle for transaction
    $(document).on("change","#number_plate_vehicle",function(){
      var number_plate = $(this).val();
      
      $.get("vehicle_for_transaction/"+number_plate,function(data){;
        $('#brand_vehicle').attr("value",data.brand);
        $('#model_vehicle').attr("value",data.model);        
      });
    });

    $("#rif_driver").select2({
      placeholder: "Ingrese la cedula del chofer",
      allowClear: true
    });

    $("#rif_beneficiary").select2({
      placeholder: "Ingrese el rif del beneficiario",
      allowClear: true
    });

    $("#number_plate_vehicle").select2({
      placeholder: "Ingrese la placa del vehiculo",
      allowClear: true
    });

    $("#product").select2({
      placeholder: "Ingrese el producto",
      allowClear: true
    });

    //views for listing
    $(".query_driver").click(function(){
      query('listing_driver');
    });
    
    $(".query_vehicle").click(function(){
      query('listing_vehicle');
    });
    
    $(".query_beneficiary").click(function(){
      query('listing_beneficiary');
    });
    
    $(".open_query_transaction").click(function(){
      query('listing_transaction_open');
    });

    $(".close_query_transaction").click(function(){
      query('listing_transaction_close');
    });

    $(".null_query_transaction").click(function(){
      query('listing_transaction_null');
    });


    //Update vehicle
    $(document).on("click","#update_vehicle",function(e){
      e.preventDefault();
      url = $(this).val();
      number_plate = $("#number_plate_vehicle").val();
      brand = $("#brand_vehicle").val();
      model = $("#model_vehicle").val();

      $.ajax({
        type:'PUT',
        url:url,
        data: {number_plate:number_plate,brand:brand,model:model},
        dataType:'json',
        success:function(data){
          
          
          if(data.number_plate != null && data.number_plate != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.number_plate[0]);
          }else if(data.model != null && data.model != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.model[0]);
          }else if(data.brand != null && data.brand != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.brand[0]);
          }else{
            query('listing_vehicle');
          }
        },
        error:function(data){
          
          // var errors = data.responseJSON;
          
        }
      });
    });


//update driver
    $(document).on("click","#update_driver",function(e){
      e.preventDefault();
      rif = $("#rif_driver").val();
      name = $("#name_driver").val();
      phone = $("#phone_driver").val();

      $.ajax({
        type:'PUT',
        url:'driver/'+rif,
        data: {rif:rif,name:name,phone:phone},
        dataType:'json',
        success:function(data){
          if(data.rif != null && data.rif != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.rif[0]);
          }else if(data.name != null && data.name != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.name[0]);
          }else if(data.phone != null && data.phone != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.phone[0]);
          }else{
            query('listing_driver');
          }

        },
        error:function(data){
          var errors = data.responseJSON;
            
        }
      });
    });

    //update beneficiary
    $(document).on("click","#update_beneficiary",function(e){
      e.preventDefault();
      type_id = $("#type_id").val();
      rif = $("#rif_beneficiary").val();
      name = $("#name_beneficiary").val();
      phone = $("#phone_beneficiary").val();

      $.ajax({
        type:'PUT',
        url:'beneficiary/'+rif,
        data: {rif:rif,name:name,phone:phone,type_id:type_id},
        dataType:'json',
        success:function(data){
          if(data.rif != null && data.rif != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.rif[0]);
          }else if(data.name != null && data.name != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.name[0]);
          }else if(data.phone != null && data.phone != undefined){
            $(".box-body .alert-danger").removeClass("hide");
            $(".box-body .alert-danger").html(data.phone[0]);
          }else{
            query('listing_beneficiary');
          }

        },
        error:function(data){
          var errors = data.responseJSON;
            
        }
      });
    });

    //forms for register

    $(".register_vehicle").click(function(){
      get_form("vehicle/create");
    });
    $(".register_beneficiary").click(function(){
      get_form("beneficiary/create");
    });

    $(".register_driver").click(function(){
      get_form("driver/create");
    });

    //show form for beneficiary
    $(document).on("click","#edit_beneficiary",function(e){
      e.preventDefault();
      var url = $(this).attr("href")
      
      $.get(url,function(data){
        $("section.content").html(data);
      });
    });

    //show form for beneficiary
    $(document).on("click","#edit_driver",function(e){
      e.preventDefault();
      var url = $(this).attr("href")
      
      $.get(url,function(data){
        $("section.content").html(data);
      });
    });

    //show form for vehicle
    $(document).on("click","#edit_vehicle",function(e){
      e.preventDefault();
      var url = $(this).attr("href")
      
      $.get(url,function(data){
        $("section.content").html(data);
      });
    });

    //close transaction
    $(document).on("click","#edit_transaction",function(e){
      e.preventDefault();
      var url = $(this).attr("href")
      $.get(url,function(data){
        $("section.content").html(data);
      });
    });
    
    //close transaction
    $(document).on("click","#close_transaction",function(e){
      e.preventDefault();
      var input_weight = $("#input_weight").val();
      var output_weight = $("#output_weight").val();
      var transaction_id = $("#transaction_id").val();
      
      $.ajax({
        type:'PUT',
        url:'transaction/'+transaction_id,
        data:{  input_weight:input_weight,          
                output_weight:output_weight },
        dataType:'json',
        success:function(data){
          // prueba = data.responseJSON;
          console.log("hell");
            if(data.output_weight != null && data.output_weight != undefined){
              $(".box-body .alert-danger").removeClass("hide");
              $(".box-body .alert-danger").html(data.output_weight[0]);
            }else{
              updated_transactions_transit();
              query('listing_transaction_close');
            }
        },
        error:function(data){
            // var errors = data.responseJSON;
            if(data.responseText=="mayor"){
              
              $(".box-body .alert-danger").removeClass("hide");
              $(".box-body .alert-danger").html("<p>el peso de salida no puede ser menor al de entrada</p>");
              
            }
        }
      });
    });

    //save and validation for transaction
    $("section.content").on("click","#save_transaction",function(){
      beneficiary_rif = $("#rif_beneficiary").val();
      number_plate_vehicle = $("#number_plate_vehicle").val();
      driver_rif = $("#rif_driver").val();
      input_weight = $("#input_weight").val();
      type = $("#type_transaction").val();
      product = $("#product").val();
      date_input = $("#date_input").val();
      date_output = $("#date_output").val();
      hour_input = $("#hour_input").val()
      minute_input = $("#minute_input").val()
      period_input = $("#period_input").val()
      hour_output = $("#hour_input").val()
      minute_output = $("#minute_input").val()
      period_output = $("#period_input").val()
        $.ajax({
          type: 'post',
          url: "transaction",
          data: { type:type,
                  product:product,
                  beneficiary_rif:beneficiary_rif,
                  number_plate_vehicle:number_plate_vehicle,
                  driver_rif:driver_rif,
                  input_weight:input_weight,
                  date_input:date_input,
                  date_output:date_output,
                  hour_input:hour_input,
                  minute_input:minute_input,
                  period_input:period_input,
                  hour_output:hour_output,
                  minute_output:minute_output,
                  period_output:period_output
              },
          dataType: 'json',
          success: function(data){
            $(".box-body .alert-danger").addClass("hide");
            window.location="/home";
            // get_form("beneficiary/create");
            // $(".box-body .alert-success").removeClass("hide");
            // $(".box-body .alert-success").html("Datos registrados correctamente");
          },
          error: function(data){
            var errors = data.responseJSON;
            
            $(".box-body .alert-danger").removeClass("hide");
            if(errors.input_weight != null && errors.input_weight != undefined){
              $(".box-body .alert-danger").html(errors.input_weight[0]);
            }
            if(errors.beneficiary_rif != null && errors.beneficiary_rif != undefined){
              $(".box-body .alert-danger").html(errors.beneficiary_rif[0]);
            }
            if(errors.driver_rif != null && errors.driver_rif != undefined){
              $(".box-body .alert-danger").html(errors.driver_rif[0]);
            }
            if(errors.number_plate_vehicle != null && errors.number_plate_vehicle != undefined){
              $(".box-body .alert-danger").html(errors.number_plate_vehicle[0]);
            }
          }
      });
    });

    $

    //save and validation for beneficiary
    $("section.content").on("click","#save_beneficiary",function(){
      type_id = $("#type_id").val();
      rif = $("#rif_beneficiary").val();
      name = $("#name_beneficiary").val();
      phone = $("#phone_beneficiary").val();
      
        $.ajax({
          type: 'post',
          url: "beneficiary",
          data: {rif:rif,name:name,phone:phone,type_id:type_id},
          dataType: 'json',
          success: function(data){
            $(".box-body .alert-danger").addClass("hide");
            
            get_form("beneficiary/create");
            $(".box-body .alert-success").removeClass("hide");
            $(".box-body .alert-success").html("Datos registrados correctamente");
          },
          error: function(data){
            var errors = data.responseJSON;
            
            $(".box-body .alert-danger").removeClass("hide");
            if(errors.rif != undefined){
              $(".box-body .alert-danger").html(errors.rif[0]);
            }else if(errors.name != null && errors.name != undefined){
              $(".box-body .alert-danger").html(errors.name[0]);
            }else if(errors.phone != undefined){
              $(".box-body .alert-danger").html(errors.phone[0]);
            }
          }
      });
    });


    //save and validation for vehicle
    $("section.content").on("click","#save_vehicle",function(){
      number_plate = $("#number_plate_vehicle").val();
      brand = $("#brand_vehicle").val();
      model = $("#model_vehicle").val();
      
        $.ajax({
          type: 'post',
          url: "vehicle",
          data: {number_plate:number_plate,brand:brand,model:model},
          dataType: 'json',
          success: function(data){
            $(".box-body .alert-danger").addClass("hide");
            
            get_form("vehicle/create");
            $(".box-body .alert-success").removeClass("hide");
            $(".box-body .alert-success").html("Datos registrados correctamente");
          },
          error: function(data){
            var errors = data.responseJSON;
            
            $(".box-body .alert-danger").removeClass("hide");
            if(errors.number_plate != undefined){
              $(".box-body .alert-danger").html(errors.number_plate[0]);
            }else if(errors.model){
              $(".box-body .alert-danger").html(errors.model[0]);
            }else if(errors.brand != null && errors.brand != undefined){
              $(".box-body .alert-danger").html(errors.brand[0]);
            }
          }
      });
    });

    //save driver and validation
    $("section.content").on("click","#save_driver",function(){
      rif = $("#rif_driver").val();
      name = $("#name_driver").val();
      phone = $("#phone_driver").val();
      
        $.ajax({
          type: 'post',
          url: "driver",
          data: {rif:rif,name:name,phone:phone},
          dataType: 'json',
          success: function(data){
            $(".box-body .alert-danger").addClass("hide");
            
            get_form("driver/create");
            $(".box-body .alert-success").removeClass("hide");
            $(".box-body .alert-success").html("Datos registrados correctamente");
          },
          error: function(data){
            var errors = data.responseJSON;
            
            $(".box-body .alert-danger").removeClass("hide");
              if(errors.name != null && errors.name != undefined){
                $(".box-body .alert-danger").html(errors.name[0]);
              }else if(errors.rif != undefined){
                $(".box-body .alert-danger").html(errors.rif[0]);
              }else if(errors.phone != undefined){
                $(".box-body .alert-danger").html(errors.phone[0]);
              }
            
          }
      });
    });

    $(document).on('click','.pagination a',function(e){
      e.preventDefault();
      var page = $(this).attr('href');
      query(page);
    });
    // $('#search_driver').keyup(function(){
    //   // type_input = $('type_input_driver').val();
    
    // });
    // $("#search_driver").keyup(function(e){
    
    // });
    // $("#search_driver").keypress(function() {
    
    // });
    // $( "#target" ).keydown(function() {
    //   alert( "Handler for .keydown() called." );
    // });
});

function get_form(url){
    $.get(url,function(data){
      $("section.content").html(data);
    });
}

function query(url){
  $.ajax({
    type:"get",
    url:url,
    success: function(data){
      $("section.content").html(data);
    }
  });
}

function updated_transactions_transit(){
  $.get('transactions_transit',function(data){      
      if(data <= 0){
        $(".transaction_transit").addClass("hide");
      }
        $(".transaction_transit").text(data);
    });
}