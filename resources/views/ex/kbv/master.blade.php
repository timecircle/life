<html lang="{{ app()->getLocale() }}">

  @include('inc.head')
<body  data-menu="vertical-menu" data-col="2-columns"
class="vertical-layout vertical-menu">

      @include('inc.brand')


  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark">

    <div class="main-menu-content menu-accordion">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
        <li>
            <a href="{{url('/dashboard/')}}"><i class="ft-grid"> </i><span data-i18n="" class="menu-title"> Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a href="#"><i class="ft-bar-chart"> </i><span data-i18n="" class="menu-title"> Report</span></a>
        </li>
        <li ><a href="{{url('/mission')}}" class="menu-item">

          <i class="ft-bell"> </i>
          <span>  Mission</span></a>
        </li>
        <li>
            <a href="{{url('/redeem/')}}">
                <i class="ft-box"> </i>
              <span data-i18n="" class="menu-title">Redeem</span></a>
        </li>
        <li>
            <a href="{{url('/reseller/')}}">
              <i class="ft-user-plus"> </i><span data-i18n="" class="menu-title">Member</span></a>
        </li>



      </ul>
    </div>

  </div>

  <div class="app-content content container-fluid">
    @yield('content')
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->

  <div class="profile text-xs-right">
    <ul class="nav">

              <li class="nav-item">
                <p >
                  <a href="{{url('logout')}}"><span >Logout</span>  <i class="ft-power"></i> </a>
                </p>
              </li>
              <li class="nav-item">
                <p >
                  <a href="{{url('password')}}">
                    <span >Change password</span> <i class="fa fa-key"></i>
                  </a>
                </p>
              </li>
    </ul>
  </div>
  @include('inc.footer')

  <script src="{{ mix('js/app.js') }}">


  </script>
  </body>
</html>
