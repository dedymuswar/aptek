<div class="container">
    <ul class="nav page-navigation">
        <li class="nav-item ">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="link-icon" data-feather="codepen"></i>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('gillies') }}" class="nav-link">
                <i class="link-icon" data-feather="git-merge"></i>
                <span class="menu-title">Gillies</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('doughlas') }}" class="nav-link">
                <i class="link-icon" data-feather="trello"></i>
                <span class="menu-title">Doughlas</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('ilyas') }}" class="nav-link">
                <i class="link-icon" data-feather="slack"></i>
                <span class="menu-title">Ilyas</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('ppni') }}" class="nav-link">
                <i class="link-icon" data-feather="wind"></i>
                <span class="menu-title">PPNI</span>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="link-icon" data-feather="wind"></i>
              <span class="menu-title">Depkes</span>
              <i class="link-arrow"></i>
            </a>
            <div class="submenu">
              <ul class="submenu-item">
                <li class="nav-item"><a href="{{ route('depkes.rrawat') }}" class="nav-link ">Ruangan rawat</a></li>
                <li class="nav-item"><a href="{{ route('depkes.kamarok') }}" class="nav-link ">Kamar OK</a></li>
                <li class="nav-item"><a href="{{ route('depkes.ugd') }}" class="nav-link ">UGD</a></li>
                <li class="nav-item"><a href="{{ route('depkes.rj') }}" class="nav-link ">Rawat Jalan</a></li>
              </ul>
            </div>
          </li>
        @role('admin')
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="link-icon" data-feather="users"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        @endrole
    </ul>
</div>