      <!-- Navigation Bar-->
      <header id="topnav">
          


          <div class="navbar-custom">
              <div class="container-fluid">
                  <div id="navigation">
                      <!-- Navigation Menu-->
                      <ul class="navigation-menu">
                          <li>
                              <a href="{{ url('/') }}" class="">
                                 <img src="{{url('logo.png')}}" height="30">
                              </a>
                          </li>
                          <li class="has-submenu">
                              <a href="#"><i class="zmdi zmdi-view-dashboard"></i> <span> Menu </span> </a>
                              <ul class="submenu megamenu">
                                  <li>
                                      <ul>
                                          <li><a href="{{url('/customers')}}">Customers</a></li>
                                          <li><a href="{{url('/settings')}}">Settings</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <ul>
                                          <li><a href="{{url('/transactions')}}">Transactions</a></li>
                                          <li><a href="{{url('/care')}}">Customer Care</a></li>
                                      </ul>
                                  </li>
                                  
                              </ul>
                          </li>
                        

                      </ul>


                      <ul class="navigation-menu float-right">
                          <li class="list-inline-item dropdown notification-list">
                              <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                                  <i class="zmdi zmdi-format-subject noti-icon"></i>
                              </a>
                          </li>

                          <li class="list-inline-item dropdown notification-list" align="right">
                              <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                 aria-haspopup="false" aria-expanded="false">
                              </a>
                              <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                  <!-- item-->
                                  <div class="dropdown-item noti-title">
                                      <h5 class="text-overflow"><small>Welcome ! {{Auth::user()->name}}</small> </h5>
                                  </div>

                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                      <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                                  </a>

                                  <!-- item-->
                                  <a href="{{url('settings/')}}" class="dropdown-item notify-item">
                                      <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                                  </a>

                                  <!-- item-->
                                  <a href="javascript:void(0);" class="dropdown-item notify-item">
                                      <i class="zmdi zmdi-lock-open"></i> <span>Lock Screen</span>
                                  </a>

                                  <!-- item-->
                                  <a href="{{url('logout')}}" class="dropdown-item notify-item">
                                      <i class="zmdi zmdi-power"></i> <span>Logout</span>
                                  </a>

                              </div>
                          </li>
                         

                      </ul>
                      <!-- End navigation menu  -->
                  </div>
              </div>
          </div>
      </header>
      <!-- End Navigation Bar-->