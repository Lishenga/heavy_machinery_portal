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
    @include('layouts.alerts')
    <div class="row">

        <div class="col-sm-6">

            <h4 class="page-title" style="margin-left:150px; margin-top: 50px; margin-bottom: 40px">Dashboard</h4>

        </div>

        <div class="col-sm-6">

            @include('customers.layouts.create')

        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    $( document ).ready(function() {
        $("form").ready(function(){
            //localStorage.removeItem("page");
            var page = 1
            var checkStorage = localStorage.getItem('page');
            if (checkStorage == undefined || checkStorage == "") { 
                var setstorage = localStorage.setItem("page", page);
                var getStorage = localStorage.getItem('page');
                $("#storage").val(getStorage);
                console.log(page);
            }
            else if(checkStorage != undefined || checkStorage != "") {
                var setstorage = localStorage.setItem("page", parseInt(checkStorage)+1);
                var getStorage = localStorage.getItem('page');
                $("#storage").val(getStorage);
                console.log(getStorage);
            }
        });
        
    });</script>

    @include('layouts.alerts')

    <div class="row">

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4" style='margin-left:70px'>

            <div class="card-box tilebox-one">

                <i class="fas fa-users float-right" style='margin-top:20px'></i>

                <form role="form"   method="POST" action="{{url('/customers/check')}}" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <input type="hidden" name="q" value="0">

                    <input  id="storage" type="hidden" name="page">

                    <div class="modal-footer form-group">

                        <button type="submit" style='margin-right:200px' class="btn btn-info">Bidders</button>

                    </div>

                </form>

            </div>

        </div>

        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4" style='margin-left:250px'>

            <div class="card-box tilebox-one">
            
                <i class="fas fa-users float-right" style='margin-top:20px'></i>

                <form role="form"  method="POST" action="{{url('/customers/check')}}" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <input type="hidden" name="q" value="1">

                    <input id="storage" type="hidden" name="page">

                    <div class="modal-footer form-group">

                        <button type="submit" style='margin-right:200px' class="btn btn-info">Posters</button>

                    </div>

                </form>

            </div>

        </div>

    </div>
    <!-- end row -->

</div> <!-- container -->
@stop