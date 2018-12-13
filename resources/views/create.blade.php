@include('layouts.header')

        <!-- Top content -->
      <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="{{asset('images/logo.png')}}" alt="" height="100"></span>
                                            </a>
                                        </h2>
                                        <p class="m-b-0"></p>
                                    </div>
                                    
                                    @include('layouts.alerts')

                                    <div class="account-content">

                                        <form role="form"   method="POST" action="{{ url('create') }}">

                                            {{ csrf_field() }}

                                            <div class="form-group">

                                                <label  for="form-username">Name<span class="text-danger">*</span></label>

                                                <input type="text" name="name" placeholder="Full Names..." class="form-username form-control"  required parsley-type="text">

                                            </div>

                                            <div class="form-group">

                                                <label  for="form-username">Email Address<span class="text-danger">*</span></label>

                                                <input type="text" name="email" placeholder="Email Address..." class="form-username form-control"  required parsley-type="text">

                                            </div>

                                            <div class="form-group">

                                                <label  for="form-username">Phone Number<span class="text-danger">*</span></label>

                                                <input type="number" name="phone_number" placeholder="Phone Number..." class="form-username form-control"  required parsley-type="text">

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
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>


        <!-- Javascript -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
        <script src="{{ asset('assets/js/scripts.js')}}"></script>

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>