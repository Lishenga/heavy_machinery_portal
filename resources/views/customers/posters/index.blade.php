

@extends('layouts.master')
@section('title')
    Customers
@stop
@section('content')
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
            <div class="container">
                
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">More<span class="m-l-5"><i
                                    class="fa fa-list"></i></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form role="form" method="POST" action="{{url('customers/transactions_bidders')}}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="q" value="0">

                                    <input type="hidden" name="id" value="{{$customer->id}}">

                                    <input  id="storage" type="hidden" name="page">

                                    <div class="modal-footer form-group">

                                        <button type="submit" class="dropdown-item btn btn-info btn-small">Transactions</button>

                                    </div>

                                </form>
                                <div class="dropdown-divider"></div>
                                <form role="form" method="POST" action="{{url('customers/posts')}}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="q" value="0">

                                    <input type="hidden" name="id" value="{{$customer->id}}">

                                    <input  id="storage" type="hidden" name="page">

                                    <div class="modal-footer form-group">

                                        <button type="submit" class="dropdown-item btn btn-info btn-small">Sell all posts</button>

                                    </div>

                                </form>
                                <div class="dropdown-divider"></div>
                                <form role="form" method="POST" action="{{url('customers/post/allacceptedbids')}}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="q" value="0">

                                    <input type="hidden" name="user_id" value="{{$customer->id}}">

                                    <input  id="storage" type="hidden" name="page">

                                    <div class="modal-footer form-group">

                                        <button type="submit" class="dropdown-item btn btn-info btn-small">See all accepted bids</button>

                                    </div>

                                </form>
                            </div>

                        </div>
                        <h4 class="page-title">Customer</h4>
                    </div>
                </div>

                @include('layouts.alerts')
            <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-success">
                          User Stripe Id:
                          {{$customer->stripe_id}}
                        </div>
                    </div>
  
               <div class="col-md-9">
                <form method="POST" action="{{ url('/customers/update_poster') }}">
                  <div class="row">
                   
                    {{ csrf_field() }}
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="First Name" value="{{$customer->fname}}">
                            <small class="text-muted">
                               
                            </small>
                        </fieldset>
                    </div>
                    <input type="hidden" name="id" value="{{$customer->id}}">
                     <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Other Names</label>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{$customer->lname}}">
                            <small class="text-muted">
                                
                            </small>
                        </fieldset>
                    </div>

                     <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email" placeholder="First Name" value="{{$customer->email}}">
                            <small class="text-muted">
                               
                            </small>
                        </fieldset>
                    </div>

                     <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Phone number</label>
                            <input type="number" class="form-control" placeholder="Enter Phone Number" name="msisdn" value="{{$customer->msisdn}}">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>
                    
                    <button type="submit" class="btn btn-block  btn-custom waves-effect waves-light active">Save</button>
                    
                  
                </div>
            </form>
            </div>


        </div>
        <div class="row">
                   
            <h6 class="page-title">Cards</h6>
                    
        </div>

       @if(isset($stripe->data))
            <div class="row">
                @forelse($stripe->data as $card)
                    
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="card-box tilebox-one">
                            <i class="icon-layers float-right text-muted"></i>
                            <h6 class="text-muted text-uppercase m-b-20">{{$card->last4}}</h6>
                            
                            <span class="label label-success"> {{$card->brand}} </span> <span class="text-muted"></span>
                        </div>
                    </div>
                @empty

                @endforelse
            </div>
       @endif
               

        </div> <!-- container -->
@stop