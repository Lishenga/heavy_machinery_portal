<!-- Add User Modal -->

<div class="modal fade" id="myUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

<div class="modal-dialog" role="document">

    <div class="modal-content">

        <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            <h5 class="modal-title" id="myModalLabel" style="margin-right: 200px">New User</h4>

        </div>

        <div class="modal-body">

            <form role="form" method="POST" action="{{ url('/customers/createUser') }}">

                {{ csrf_field() }}

                <div class="form-group">

                    <label  for="form-username">First Name<span class="text-danger">*</span></label>

                    <input type="text" name="fname" placeholder="First Name..." class="form-username form-control"  required parsley-type="text">

                </div>

                <div class="form-group">

                    <label  for="form-username">Last Name<span class="text-danger">*</span></label>

                    <input type="text" name="lname" placeholder="Last Name..." class="form-username form-control"  required parsley-type="text">

                </div>

                <div class="form-group">

                    <label  for="form-username">Email Address<span class="text-danger">*</span></label>

                    <input type="text" name="email" placeholder="Email Address..." class="form-username form-control"  required parsley-type="text">

                </div>

                <div class="form-group">

                    <label  for="form-username">Phone Number<span class="text-danger">*</span></label>

                    <input type="number" name="msisdn" placeholder="Phone Number..." class="form-username form-control"  required parsley-type="text">

                </div>

                <div class="form-group">

                    <label  for="form-username">Role<span class="text-danger">*</span></label>

                    <select class="selectpicker" multiple data-max-options="10" name="role" data-live-search="true">

                        <option value="POSTER">Poster</option>
                        <option value="BIDDER">Bidder</option>

                    </select>

                </div>

                <div class="form-group">

                    <label  for="form-username">Password<span class="text-danger">*</span></label>

                    <input type="password" name="password" placeholder="Password..." class="form-username form-control"  required parsley-type="text">

                </div>

                <div class="modal-footer">

                    <button type="submit" class="btn btn-info">Create User</button>

                </div>

            </form>

        </div>

    </div>

</div>

</div>

<!-- End Add User Modal -->


<div class="row" style="margin-left: 200px; margin-top: 50px; margin-bottom: 40px">

<button class="btn btn-custom" data-toggle="modal" data-target="#myUser"><i class="fa fa-fw fa-plus"></i>New User</button>

<br>

</div>