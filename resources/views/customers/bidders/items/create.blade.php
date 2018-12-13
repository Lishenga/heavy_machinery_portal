<!-- Add User Modal -->

<div class="modal fade" id="myUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h5 class="modal-title" id="myModalLabel" style="margin-right: 200px">New Item</h4>

        </div>

        <div class="modal-body">

            <form method="POST" action="{{ url('/customers/createItem/') }}" enctype='multipart/form-data'>
                <div class="row">
                
                    {{ csrf_field() }}
                    
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="selectpicker" multiple data-max-options="10" name="category_id" data-live-search="true">
                                @foreach($category as $categories)

                                    <option value="{{$categories->id}}">{{$categories->name}}</option>

                                @endforeach
                            </select>
                            <small class="text-muted">
                            
                            </small>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name">
                            <small class="text-muted">
                                
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Description</label>
                            <textarea rows="4" cols="20" name="description" placeholder="Description">
                            </textarea>
                            <small class="text-muted">
                            
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Location</label>
                            <select class="selectpicker" multiple data-max-options="10" name="location_id" data-live-search="true">
                                @foreach($location as $locations)

                                    <option value="{{$locations->id}}">{{$locations->region}}</option>

                                @endforeach
                            </select>
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Price for lease</label>
                            <input type="text" class="form-control" placeholder="Price for lease" name="price_for_lease">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>

                    <input type="hidden" name="user_id" value="{{$user_id}}">

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Minimum Radius</label>
                            <input type="number" class="form-control" placeholder="Minimum Radius" name="min_radius">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Maximum Radius</label>
                            <input type="number" class="form-control" placeholder="Maximum Radius" name="max_radius">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>

                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label for="exampleInputEmail1">Picture</label>
                            <input type="file" class="form-control" name="pictures">
                            <small class="text-muted"> 
                            </small>
                        </fieldset>
                    </div>
                    
                    <button type="submit" class="btn btn-block  btn-custom waves-effect waves-light active">Create Item</button>
                    
                
                </div>
            </form>

        </div>

    </div>

</div>

</div>

<!-- End Add User Modal -->



<div class="row" style="margin-left: 200px; margin-top: 50px; margin-bottom: 40px">

<button class="btn btn-custom" data-toggle="modal" data-target="#myUser"><i class="fa fa-fw fa-plus"></i>New Item</button>

<br>

</div>