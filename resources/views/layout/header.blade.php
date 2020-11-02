<header>
    <div class="header-wrapper">
      <div class="container container-full">
        <div class="header-inner">
          <a class="logo-header" href="#">
            <img src="images/logo.png" alt="Logo">
          </a>
          <ul class="menu-header__list">
            @foreach ($theloai as $tl)
              @if (count($tl->loaitin) > 0)
              <li class="menu-header__item"><a href="" class="menu-header__link">{{$tl->name}}</a></li>
              <ul class="menu-header__list">
                @foreach ($tl->loaitin as $item)
                  <li class="menu-header__item"><a href="" class="menu-header__link">{{$item->name}}</a></li>
                @endforeach
              </ul>
              @endif
            @endforeach
            
            <li class="menu-header__item"><a href="" class="menu-header__link">work</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">services</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">about us</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">contact us</a></li>
          </ul>
          <div class="icon-menu-mobie js-menu-mobie">
            <i class="pe-7s-menu"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- menu mobie -->
    <div class="offcanvas-collapse">
      <div class="navbar-collapse">
        <ul class="navbar-nav fa-ul">
          <li class="nav-item">
            <a class="nav-link" href="index.html"><i class="fa fa-fw fa-home"></i>Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="our-products.html"><i class="fa fa-fw fa-desktop"></i>Work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="our-services.html"><i class="fa fa-fw fa-server"></i>Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.html"><i class="fa fa-fw fa-id-card-o"></i>About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about-us.html"><i class="fa fa-object-group"></i>Contact Us</a>
          </li>
        </ul>
        <ul class="navbar-nav fa-ul">
          <li class="nav-item">
            <a class="nav-link" href="tel:+84914731527"><i class="fa fa-fw fa-phone"></i>+(84)914.731.527</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mailto:levantu.nd1997@gmail.com"><i class="fa fa-fw fa-envelope-open-o"></i>levantu.nd1997@gmail.com</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="menu-overlay"></div>

  </header>