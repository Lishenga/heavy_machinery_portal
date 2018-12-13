@extends('layouts.master')
@section('title')
    Dashboard
@stop
@section('content')
      
<div class="container-fluid">
                
    <!-- Page-Title 
    
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    -->
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>

    @include('layouts.alerts')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box tilebox-one">
                <i class="fas fa-chart-line float-right"></i>
                <a href="{{url('/customers')}}"  class="text-uppercase m-b-20"> Customers</a>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box tilebox-one">
                <i class="fas fa-users float-right"></i>
                <a href="{{url('/transactions')}}"  class="text-uppercase m-b-20"> Transactions</a>
            </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card-box tilebox-one">
                <i class="fas fa-chart-bar float-right"></i>
                <a href="{{url('/settings')}}"  class="text-uppercase m-b-20"> Settings</a>
            </div>
        </div>
    </div>
    <!-- end row -->

</div> <!-- container -->
@stop