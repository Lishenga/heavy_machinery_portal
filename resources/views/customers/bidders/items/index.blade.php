

@extends('layouts.master')
@section('title')
    Customers
@stop
@section('content')
            <div class="container">
                
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group pull-right m-t-15">
                            <button type="button" class="btn btn-custom dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">More<span class="m-l-5"><i
                                    class="fa fa-list"></i></span></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form role="form" method="POST" action="{{url('customers/items/gallery')}}" enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <input type="hidden" name="q" value="0">

                                    <input type="hidden" name="id" value="{{$items->id}}">

                                    <input  id="storage" type="hidden" name="page">

                                    <div class="modal-footer form-group">

                                        <button type="submit" class="dropdown-item btn btn-info btn-small">Gallery for item</button>

                                    </div>

                                </form>
                                 <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{url('/customers/items/delete')}}?id={{$items->id}}" onclick="alert('Are you sure you want to block {{@$items->name }}?')">Delete</a>
                            </div>

                        </div>
                        <h4 class="page-title">Customer's Item</h4>
                    </div>
                </div>

                @include('layouts.alerts')
            <div class="row">
  
                <div class="col-md-9">
                    <form method="POST" action="{{ url('/customers/item/update_bidders') }}">
                    <div class="row">
                    
                        {{ csrf_field() }}
                        
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Category</label>
                                <select class="selectpicker" multiple data-max-options="10" name="category_id" data-live-search="true">
                                    @foreach($category as $categories)
                                        @if($items->category_id == $categories->id)

                                            <option value="{{$categories->id}}">{{$categories->name}}</option>

                                        @else
                                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <small class="text-muted">
                                
                                </small>
                            </fieldset>
                        </div>
                        <input type="hidden" name="id" value="{{$items->id}}">
                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Name" value="{{$items->name}}">
                                <small class="text-muted">
                                    
                                </small>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea rows="4" cols="50" name="description" placeholder="Description">
                                    {{$items->description}}
                                </textarea>
                                <small class="text-muted">
                                
                                </small>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Location</label>
                                    <input type="text" class="form-control" placeholder="Location" name="location_id" value="County:{{$location->county}} Region:{{$location->region}} Ward:{{$location->ward_or_town}}">
                                <small class="text-muted"> 
                                </small>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Price for lease</label>
                                <input type="text" class="form-control" placeholder="Price for lease" name="price_for_lease" value="{{$items->price_for_lease}}">
                                <small class="text-muted"> 
                                </small>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Minimum Radius</label>
                                <input type="number" class="form-control" placeholder="Minimum Radius" name="min_radius" value="{{$items->min_radius}}">
                                <small class="text-muted"> 
                                </small>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset class="form-group">
                                <label for="exampleInputEmail1">Maximum Radius</label>
                                <input type="number" class="form-control" placeholder="Maximum Radius" name="max_radius" value="{{$items->max_radius}}">
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
                <div class="col-xs-12">
                    <div class="card-box tilebox-one">
                        <i class="icon-layers float-right text-muted"></i>
                        <h6 class="text-muted text-uppercase m-b-20">Picture</h6>
                        <img src="http://142.93.7.234:86/{{$items->pictures}}" alt="user">
                    </div>
                </div>
            </div>
               

    </div> <!-- container -->
@stop