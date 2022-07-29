<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->            
            <li class="treeview">
                <a href="#"><i class='fa fa-balance-scale'></i> <span>{{ trans('adminlte_lang::message.transactions_menu') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{url('home')}}" class="register_transaction">{{ trans('adminlte_lang::message.register_menu') }}</a></li>
                    <li><a href="#" class="open_query_transaction">{{ trans('adminlte_lang::message.open_transaction') }}</a></li>
                    <li><a href="#" class="close_query_transaction">{{ trans('adminlte_lang::message.close_transactions') }}</a></li>
                    <li><a href="#" class="null_query_transaction">{{ trans('adminlte_lang::message.null_transactions') }}</a></li>
                </ul>
            </li>            
            <li class="treeview">
                <a href="#"><i class='fa fa-drivers-license-o'></i> <span>{{ trans('adminlte_lang::message.driver_menu') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#" class="register_driver">{{ trans('adminlte_lang::message.register_menu') }}</a></li>
                    <li><a href="#" class="query_driver">{{ trans('adminlte_lang::message.query_menu') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-bus'></i> <span>{{ trans('adminlte_lang::message.vehicle_menu') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#" class="register_vehicle">{{ trans('adminlte_lang::message.register_menu') }}</a></li>
                    <li><a href="#" class="query_vehicle">{{ trans('adminlte_lang::message.query_menu') }}</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-building-o'></i> <span>{{ trans('adminlte_lang::message.beneficiary_menu') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#" class="register_beneficiary">{{ trans('adminlte_lang::message.register_menu') }}</a></li>
                    <li><a href="#" class="query_beneficiary">{{ trans('adminlte_lang::message.query_menu') }}</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
