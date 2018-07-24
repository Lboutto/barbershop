<div class="navbar nav_title" style="border: 0;">
  <a href="{{route('home')}}" class="site_title">
    <!--<i class="glyphicon glyphicon-home"></i>-->
    <span>BARBERIA</span>
  </a>
</div>
<div class="clearfix"></div>
<!--perfil menu -->
<div class="profile clearfix">
  <div class="profile_pic">
    <img src="{{asset('img/logo.png')}}" alt="..." class="img-circle profile_img">
  </div>
  <div class="profile_info">
    <span>Bienvenido,</span>
    <h2>{{ Auth::user()->name }}</h2>
  </div>
</div>
<!-- /perfil menu -->
<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menú</h3>
    <ul class="nav side-menu">
      
      <li>
        
        <a>
          <i class="fa fa-shopping-cart animated slideInLeft"></i> 
          @if(Auth::user()->hasrole('administrator'))
          Ventas
          @else
          Mis Ventas
          @endif
          <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
          <li>
            <a href="{{route('sales.index')}}">
              <i class="fa fa-bars"></i>Lista de Ventas</a>
          </li>
          <li>
            <a href="{{route('sales.create')}}">
              <i class="fa fa-plus"></i>Registrar Venta</a>
          </li>
        </ul>
      </li>
      @role('administrator')
      <li>
        <a>
          <i class="fa fa-users"></i> Usuarios
          <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
          <li> 
              <a href="{{route('user.index')}}">
              <i class="fa fa-bars"></i>Lista de Usuarios</a>
          </li>
          <li>
             <a href="{{route('user.create')}}">
             <i class="fa fa-plus"></i>Agregar Usuarios</a>
          </li>
        </ul>
      </li>
      <li>
        <a>
          <i class="fa fa-circle"></i> Roles
          <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
          <li>
              <a href="{{route('role.index')}}">
              <i class="fa fa-bars"></i>Lista de Roles</a>
          </li>
          <li>
              <a href="{{route('role.create')}}">
              <i class="fa fa-plus"></i>Agregar Rol</a>
          </li>
        </ul>
      </li>
      <li>
        <a>
          <i class="fa fa-cogs"></i> Permisos
          <span class="fa fa-chevron-down"></span>
        </a>
        <ul class="nav child_menu">
          <li>
            <a href="{{route('permission.index')}}">
              <i class="fa fa-bars"></i>Lista de Permisos</a>
          </li>
          <li>
            <a href="{{route('permission.create')}}">
              <i class="fa fa-plus"></i>Agregar Permisos</a>
          </li>
        </ul>
      </li>
      @endrole
    </ul>
  </div>
</div>
<!-- /sidebar menu -->
<!-- /sidebar menu footer buttons -->
<div class="sidebar-footer hidden-small">
   <a  data-toggle="tooltip" data-placement="top"  id="fullscreen" href="#fullscreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a> 
  <a data-toggle="tooltip" data-placement="top"  href="{{route('logout')}}">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /sidebar menu footer buttons -->
</div>
</div>