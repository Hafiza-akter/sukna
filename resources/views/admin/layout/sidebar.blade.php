<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile not-navigation-link">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{asset('dist/img/avatar2.png')}}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Richard V.Welsh</p>
                  <div class="dropdown" data-display="static">
                    <a href="#" class="nav-link d-flex user-switch-dropdown-toggler" id="UsersettingsDropdown" href="#"
                      data-toggle="dropdown" aria-expanded="false">
                      <small class="designation text-muted">Manager</small>
                      <span class="status-indicator online"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="UsersettingsDropdown">
                      <a class="dropdown-item p-0">
                        <div class="d-flex border-bottom">
                          <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                          </div>
                          <div
                            class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                            <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                          </div>
                          <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                            <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                          </div>
                        </div>
                      </a>
                      <a class="dropdown-item mt-2"> Manage Accounts </a>
                      <a class="dropdown-item"> Change Password </a>
                      <a class="dropdown-item"> Check Inbox </a>
                      <a class="dropdown-item"> Sign Out </a>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <?php if(Session()->get('is_admin') != 0) {?>

          <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-expanded="false" aria-controls="basic-ui">
              <i class="menu-icon mdi mdi-emoticon"></i>
              <span class="menu-title">User</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="basic-ui">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item ">
                  <a class="nav-link" href="{{route('userlist')}}">List</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="basic-ui/dropdowns.html">Dropdowns</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="basic-ui/typography.html">Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <?php } ?>
        </ul>
      </nav>