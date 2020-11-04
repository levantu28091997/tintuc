<header>
  <!-- Modal User -->
  <div class="modal fade bd-example-modal-lg " id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-wrapper">
                <div class="customer-form">
                    <div class="tab-content create-acount-form active">
                        <div class="login-icon">
                            <span class="flaticon-profile"></span>
                        </div>
                        <p class="des-login">
                            Create an account to expedite future checkouts, track order history & receive emails, discounts, & special offers
                        </p>
                        <div class="login-form">
                            <form action="" method="Post" class="login">
                              @csrf
                                <p class="form-rows">
                                    <input type="text" placeholder="Username" id="emailLogin">
                                </p>
                                <p class="form-rows">
                                    <input type="password" placeholder="Password" id="passLogin">
                                </p>
                                <p class="form-rows">
                                    <label for="" class="remember-me">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#" class="lost-passw">Lost your password?</a>
                                    <input type="submit" name="login" value="Login" id="SignIn">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="tab-content back-login-form">
                        <div class="login-icon">
                            <span class="flaticon-login"></span>
                            <p class="des-re">Register</p>
                        </div>
                        <div class="login-form">
                            <form action="" method="Post" class="login">
                                <p class="form-rows">
                                    <input type="text" placeholder="Username">
                                </p>
                                <p class="form-rows">
                                    <input type="text" placeholder="Password">
                                </p>
                                <p class="des-re">
                                        Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.
                                    </p>
                                <p class="form-rows">
                                    <input type="submit" name="login" value="Register" id="SignOut">
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="spec">
                        <span>OR</span>
                    </div>
                    <ul class="redirect">
                        <li><a href="" class="create-acount active">Create an Acount</a></li>
                        <li><a href="" class="back-login">Back to login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal User -->
    <div class="header-wrapper">
      <div class="container container-full">
        <div class="header-inner">
          <a class="logo-header" href="#">
            <img src="images/logo.png" alt="Logo">
          </a>
          <ul class="menu-header__list">
            @foreach ($theloai as $tl)
              @if (count($tl->loaitin) > 0)
              <li class="menu-header__item">
                <a href="" class="menu-header__link">{{$tl->name}}</a>
                <ul class="sub_menu menu-header__list">
                  @foreach ($tl->loaitin as $item)
                    <li class="menu-header__item"><a href="" class="menu-header__link">{{$item->name}}</a></li>
                  @endforeach
                </ul>
              </li>
              @else
              <li class="menu-header__item"><a href="" class="menu-header__link">{{$tl->name}}</a></li>
              @endif
            @endforeach
            <li class="menu-header__item">
              <!-- block-acount -->
                <div class="block-account">
                  <span data-toggle="modal" data-target="#userModal">
                      <i class="pe-7s-user"></i>
                  </span>
              </div>
            </li>
{{--             
            <li class="menu-header__item"><a href="" class="menu-header__link">work</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">services</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">about us</a></li>
            <li class="menu-header__item"><a href="" class="menu-header__link">contact us</a></li> --}}
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

  @section('script')
    <script>
      $(document).ready(function(){
        $('#SignIn').click(function(event){
            event.preventDefault();
            let email = $('#emailLogin').val();
            let pass  = $('#passLogin').val();
            $.post('loginAjax',{email : email,pass: pass}, function($data){})
            $.ajax({
              url : 'loginAjax',
              type: 'POST',
              data : {
                email : email,
                pass: pass,
              },
              success:function(response){
              console.log(response);
            },
          });
        });
      });
    </script>
  @endsection