@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
		
			<!--<div class="col-md-10 col-md-offset-2">-->
				<!-- Default box -->
				<!--<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Home</h3>

						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						{{ trans('adminlte_lang::message.logged') }}. para la balanza de la empresa Cabelum
						
					</div>
					/.box-body
				</div>-->
				<!-- /.box -->
			<!--</div>-->
				@section('register_driver')
    				@include('adminlte::layouts.forms.register_transaction')
				@show
		</div>
	</div>
@endsection
