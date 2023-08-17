
            <nav class="main-header navbar navbar-expand navbar-dark">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                  </li>
                  <li class="nav-item d-none d-sm-inline-block">
                    <a href="dashboard" class="nav-link">Home</a>
                  </li>
                </ul>
            
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                    <span class="nav-link">
                    Welcome {{ Auth::user()->getRule->rule_name }}!
                    </span>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                      <img src="/storage/{{ Auth::user()->profile_photo_path ?? 'default-profile/admin-profile.png' }}" class="img-circle elevation-2" alt="{{ Auth::user()->name }}" style="max-height: 30px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                      <span class="dropdown-item dropdown-header"><i class="fa fa-circle" style="color:#4BB543"></i> {{ Auth::user()->name }}</span>
                      <div class="dropdown-divider"></div>
                      {{-- Profile Management--}}
                        <a href="/editprofileform" class="dropdown-item"><i class="fas fa-user-edit mr-2"></i>{{ __('Profile Management') }}</a>
                      {{-- Password Update--}}
                        <a href="/passwordupdate" class="dropdown-item"><i class="fa fa-key mr-2"></i>{{ __('Password Update') }}</a>
                      <!-- Log Out -->
                      <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <a href="{{ route('logout') }}"
                        @click.prevent="$root.submit();" class="dropdown-item">
                          <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                        </a>
                      </form>
                    </div>
                  </li>
                </ul>
              </nav>