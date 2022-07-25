<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    
    @can('Admin')
      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('/groups/*') && 'active' }}" href="{{ route('groups.index') }}">
          <i class="bi bi-bookmarks"></i>
          <span>Groups</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('/members/*') && 'active' }}" href="{{ route('members.index') }}">
          <i class="bi bi-person-badge"></i>
          <span>Members</span>
        </a>
      </li>

      <li class="nav-heading">Administrator</li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('/users/*') && 'active' }}" href="{{ route('users.index') }}">
          <i class="bi bi-people"></i>
          <span>Users</span>
        </a>
      </li>
    @elsecan('Member')
      <li class="nav-heading">Dashboard</li>

      <li class="nav-item">
        <a class="nav-link collapsed {{ Request::is('/member') && 'active' }}" href="{{ route('member') }}">
          <i class="bi bi-briefcase"></i>
          <span>Profile</span>
        </a>
      </li>
    @endcan

  </ul>
</aside>