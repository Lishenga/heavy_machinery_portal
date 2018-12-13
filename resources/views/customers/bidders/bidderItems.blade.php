@extends('layouts.master')
@section('styles')
     <!-- DataTables -->
    <link href="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
    <link href="{{asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop
@section('title')
    Customers
@stop
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    
    $( document ).ready(function() {
        $("#first").click(function(){
            var page = 1
            var setstorage = localStorage.setItem("page", page);
            $("#storage1").val(page);
            console.log(page);
        });
    });

    $( document ).ready(function() {
        $("#next").click(function(){
            //localStorage.removeItem("page");
            var checkStorage = localStorage.getItem('page');
            var setstorage = localStorage.setItem("page", parseInt(checkStorage)+1);
            var getStorage = localStorage.getItem('page');
            $("#storage3").val(getStorage);
            console.log(getStorage);
        });
    });
    $( document ).ready(function() {
        $("#prev").click(function(){
            //localStorage.removeItem("page");
            var checkStorage = localStorage.getItem('page');
            var setstorage = localStorage.setItem("page", parseInt(checkStorage)-1);
            var getStorage = localStorage.getItem('page');
            $("#storage2").val(getStorage);
            console.log(getStorage);
        });
    });</script>

            <div class="container-fluid">
                
                <!-- Page-Title -->

                <div class="row">

                     <div class="col-sm-6">

                        <h4 class="page-title" style="margin-left:150px; margin-top: 50px; margin-bottom: 40px">Dashboard</h4>

                    </div>

                    <div class="col-sm-6">

                        @include('customers.bidders.items.create')

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-4" style="margin-left: -200px;">

                        <form role="form" method="POST" action="{{url('/customers/items')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input  id="storage2" type="hidden" name="page">

                            <input type="hidden" name="id" value="{{$user_id}}">

                            <div class="modal-footer form-group">

                                <button id="prev" type="submit" class="btn btn-info btn-small">Previous Page</button>

                            </div>

                        </form>

                    </div>

                    <div class="col-sm-4" style="margin-left: 50px;">

                        <form role="form"  method="POST" action="{{url('/customers/items')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input  id="storage1" type="hidden" name="page">

                            <input type="hidden" name="id" value="{{$user_id}}">

                            <div class="modal-footer form-group">

                                <button id="first" type="submit" class="btn btn-info btn-small">First Page</button>

                            </div>

                        </form>

                        </div>

                    <div class="col-sm-4">

                        <form role="form" method="POST" action="{{url('/customers/items')}}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            <input  id="storage3" type="hidden" name="page">

                            <input type="hidden" name="id" value="{{$user_id}}">

                            <div class="modal-footer form-group">

                                <button id="next" type="submit" class="btn btn-info">Next Page</button>

                            </div>

                        </form>
                    </div>

                </div>
               
               @include('layouts.alerts')


                <div class="row">
                  
                    <div class="col-md-12">
                
                        <div class="card-box table-responsive">
                          
                            <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Item Description</th>
                                    <th>Location</th>
                                    <th>Picture</th>
                                    <th>Price for Lease</th>
                                    <th>Max Radius</th>
                                    <th>Min Radius</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @foreach($customers as $customer)  
                                
                                    <tr>
                                        <td>{{@$customer->name }}</td>
                                        <td>{{@$customer->description }}</td>
                                        <td>{{@$customer->location_county}} (County) {{@$customer->location_ward}} (Ward)</td>
                                        <td><img src="http://142.93.7.234:86/{{@$customer->pictures_thumb}}" alt="user" class="rounded-circle"></td>
                                        <td>{{@$customer->price_for_lease}}</td>
                                        <td>{{@$customer->max_radius}}</td>
                                        <td>{{@$customer->min_radius}}</td>
                                        @if(@$customer->bid_status == 1)
                                            <td>Active</td>
                                        @else
                                            <td>Inactive</td>
                                        @endif
                                        <td>{{@$customer->updated_at }}</td>
                                        <td>
                                            <a href="{{url('/customers/delete')}}?id={{$customer->id}}" onclick="alert('Are you sure you want to block {{@$customer->name }} bid?')" class="btn waves-effect waves-light btn-danger"> <i class="fa fa-remove"></i> </a>
                                        </td>
                                    </tr>

                                @endforeach


                                </tbody>
                            </table>    
                        </div>
                    </div>
                </div>            

        </div> <!-- container -->
@stop
@section('scripts')
     <!-- Required datatable js -->
    <script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script>
           //Buttons examples
            var table = $('#datatable').DataTable({
            
               
            });

            table.buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');</script>
@stop
