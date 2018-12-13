@include('layouts.header')

  
@include('layouts.nav')  

        <div class="preloader-wrap">
            <div class="percentage" id="precent"></div>
            <div class="loader">
                <div class="trackbar">
                <div class="loadbar"></div>
                </div>
                <div class="glow"></div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            
            @yield('content')
            <!-- Footer -->
            <footer class="footer">
                2016 - 2018 © Lanthanion.
            </footer>
            <!-- End Footer -->



            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <div class="nicescroll">
                    <ul class="nav nav-pills nav-justified text-xs-center">
                        <li class="nav-item">
                            <a href="#home-2"  class="nav-link active" data-toggle="tab" aria-expanded="false">
                                Activity
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages-2" class="nav-link" data-toggle="tab" aria-expanded="true">
                                Settings
                            </a>
                        </li>
                    </ul>

              
                </div> <!-- end nicescroll -->
            </div>
            <!-- /Right-bar -->



        </div> <!-- End wrapper -->     


         

@include('layouts.footer')