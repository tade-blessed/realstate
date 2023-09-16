       <nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          Real<span>State</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{route('admin.dashbord')}}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">RealEstate</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property Type</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.type')}}" class="nav-link">All Type</a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Add Type</a>
                </li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Amenitie</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.amenitie')}}" class="nav-link">All </a>
                </li>
                <li class="nav-item">
                  <a href="pages/email/read.html" class="nav-link">Add Amenitie</a>
                </li>
                
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="emails">
              <i class="link-icon" data-feather="mail"></i>
              <span class="link-title">Property</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{route('all.property')}}" class="nav-link">All property </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('add.property')}}" class="nav-link">Add Property</a>
                </li>
                
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
              <i class="link-icon" data-feather="calendar"></i>
              <span class="link-title">Calendar</span>
            </a>
          </li>
          <li class="nav-item nav-category">Components</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
              <i class="link-icon" data-feather="feather"></i>
              <span class="link-title">UI Kit</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                </li>
                <li class="nav-item">
                  <a href="pages/ui-components/badges.html" class="nav-link">Badges</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">Role and Permission</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
              <i class="link-icon" data-feather="anchor"></i>
              <span class="link-title">Role and Permission</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
              <ul class="nav sub-menu">
                <li class="nav-item">
                <a href="{{route('all.permission')}}" class="nav-link">All permission</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('all.roles')}}" class="nav-link">All Roles</a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('add.roles.permission')}}" class="nav-link">Roles in Permission</a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('all.role.permission')}}" class="nav-link">All Roles in Permission</a>
                  </li>
              </ul>
            </div>
          </li>
      
          <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
              <i class="link-icon" data-feather="hash"></i>
              <span class="link-title">Documentation</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>