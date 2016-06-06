<!-- Fixed navbar -->
<div class="navbar navbar-default navbar-fixed-top navbar-transparent-black mm-fixed-top" role="navigation" id="navbar">
          
  <!-- Branding -->
  <div class="navbar-header col-md-2">
    <a class="navbar-brand" href="{{asset('home')}}">
      <strong>HP</strong>Shop
    </a>
    <div class="sidebar-collapse">
      <a href="#">
        <i class="fa fa-bars"></i>
      </a>
    </div>
  </div>
  <!-- Branding end -->
  <div class="copyrights">Collect from <a href="http://www.hpshop.com/"  title="HPShop">HPShop</a></div>

  <!-- .nav-collapse -->
  <div class="navbar-collapse">

    <!-- Search -->
    <div class="search" id="main-search">
      <i class="fa fa-search"></i> <input type="text" placeholder="Search...">
    </div>
    <!-- Search end -->

    <!-- Quick Actions -->
    <ul class="nav navbar-nav quick-actions">
                
                <li class="dropdown divided">
                  
                  <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="label label-transparent-black">0</span>
                  </a>

                  <ul class="dropdown-menu wide arrow nopadding bordered">
                    <li><h1>You have <strong>2</strong> new tasks</h1></li>
                    <li>
                      <a href="#">
                        <div class="task-info">
                          <div class="desc">Layout</div>
                          <div class="percent">80%</div>
                        </div>
                        <div class="progress progress-striped progress-thin">
                          <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">40% Complete (success)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="task-info">
                          <div class="desc">Schemes</div>
                          <div class="percent">15%</div>
                        </div>
                        <div class="progress progress-striped active progress-thin">
                          <div class="progress-bar progress-bar-cyan" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 15%">
                            <span class="sr-only">45% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="task-info">
                          <div class="desc">Forms</div>
                          <div class="percent">5%</div>
                        </div>
                        <div class="progress progress-striped progress-thin">
                          <div class="progress-bar progress-bar-orange" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 5%">
                            <span class="sr-only">5% Complete (warning)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="task-info">
                          <div class="desc">JavaScript</div>
                          <div class="percent">30%</div>
                        </div>
                        <div class="progress progress-striped progress-thin">
                          <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                            <span class="sr-only">30% Complete (danger)</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <div class="task-info">
                          <div class="desc">Dropdowns</div>
                          <div class="percent">60%</div>
                        </div>
                        <div class="progress progress-striped progress-thin">
                          <div class="progress-bar progress-bar-amethyst" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li><a href="#">Check all tasks <i class="fa fa-angle-right"></i></a></li>
                  </ul>

                </li>

                <li class="dropdown divided">
                  
                  <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="label label-transparent-black">0</span>
                  </a>

                  <ul class="dropdown-menu wider arrow nopadding messages">
                    <li><h1>You have <strong>1</strong> new message</h1></li>

                    <li class="topborder"><a href="#">Check all messages <i class="fa fa-angle-right"></i></a></li>
                  </ul>

                </li>

                <li class="dropdown divided">
                  
                  <a class="dropdown-toggle button" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell"></i>
                    <span class="label label-transparent-black">0</span>
                  </a>

                  <ul class="dropdown-menu wide arrow nopadding bordered">
                    <li><h1>You have <strong>3</strong> new notifications</h1></li>
                    
                    <li>
                      <a href="#">
                        <span class="label label-green"><i class="fa fa-user"></i></span>
                        New user registered.
                        <span class="small">18 mins</span>
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <span class="label label-red"><i class="fa fa-power-off"></i></span>
                        Server down.
                        <span class="small">27 mins</span>
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <span class="label label-orange"><i class="fa fa-plus"></i></span>
                        New order.
                        <span class="small">36 mins</span>
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <span class="label label-cyan"><i class="fa fa-power-off"></i></span>
                        Server restared.
                        <span class="small">45 mins</span>
                      </a>
                    </li>

                    <li>
                      <a href="#">
                        <span class="label label-amethyst"><i class="fa fa-power-off"></i></span>
                        Server started.
                        <span class="small">50 mins</span>
                      </a>
                    </li>

                     <li><a href="#">Check all notifications <i class="fa fa-angle-right"></i></a></li>
                  </ul>

                </li>

                <li class="dropdown divided user" id="current-user">
                  <div class="profile-photo">
                    @if (Auth::user()->avatar != '')
                      <img src="{!!asset('avatar/'.Auth::user()->avatar)!!}" alt />
                    @else
                      <img src="{!!asset('avatar/default.png')!!}" alt />
                    @endif
                  </div>
                  <a class="dropdown-toggle options" data-toggle="dropdown" href="#">
                    {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                  </a>
                  
                  <ul class="dropdown-menu arrow settings">

                    <li>
                      
                      <h3>Backgrounds:</h3>
                      <ul id="color-schemes">
                        <li><a href="#" class="bg-1"></a></li>
                        <li><a href="#" class="bg-2"></a></li>
                        <li><a href="#" class="bg-3"></a></li>
                        <li><a href="#" class="bg-4"></a></li>
                        <li><a href="#" class="bg-5"></a></li>
                        <li><a href="#" class="bg-6"></a></li>
                      </ul>

                    </li>

                    <li class="divider"></li>

                    <li>
                      <a href="{!!asset('home')!!}"> Home</a>
                    </li>

                    <li>
                      <a href="{!! url('admin/users/{id}/edit', Auth::user()->id) !!}"> Profile</a>
                    </li>

                    <li class="divider"></li>

                    <li>
                      <a href="{{asset('auth/logout')}}"><i class="fa fa-power-off"></i> Logout</a>
                    </li>
                  </ul>
                </li>

    </ul>
    <!-- /Quick Actions -->



    <!-- Sidebar -->
      @include('includes.admin.sidebar')
    <!-- Sidebar end -->
  </div>
  <!--/.nav-collapse -->
</div>
<!-- Fixed navbar end -->