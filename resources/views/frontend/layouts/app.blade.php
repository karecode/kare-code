<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>@section('tittle') Kare-Code Yazılım @show</title>

    <!--SEO Meta Tags-->
    <meta name="description" content="iTheme - Multipurpose HTML5 Theme"/>
    <meta name="keywords"
          content="multipurpose, ios, material, blog, shop, portfolio, specialty pages, landing, elements, shortcodes, html5, css3, jquery, js, modernizr, gallery, slider, touch, mobile"/>
    <meta name="author" content="8Guild"/>

    <!--Mobile Specific Meta Tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!--Favicon-->
    <link rel="shortcut icon" href="{{asset('frontend/favicon.ico')}}" type="image/x-icon">
    <link rel="icon" href="{{asset('frontend/favicon.ico')}}" type="image/x-icon">

    <!-- Vendor Styles -->
    <link href="{{asset('frontend/masterslider/style/masterslider.css')}}" rel="stylesheet" media="screen">

    <!-- All Theme Styles including Bootstrap, FontAwesome, etc. compiled from styles.less-->
    <link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet" media="screen">

    <!-- Preloader (Pace.js) -->
    <script src="{{asset('frontend/js/plugins/pace.min.js')}}"></script>

    <!--Modernizr / Detectizr-->
    <script src="{{asset('frontend/js/libs/modernizr.custom.js')}}"></script>
    <script src="{{asset('frontend/js/libs/detectizr.min.js')}}"></script>

    @yield('css')
</head>

<!-- Body -->
<!-- Add ".body-alt" class to <body> for alternative color option. -->
<body>

<!-- Preloader -->
<div class="preloader-bg"></div>
<div class="preloader">
    <span></span>
</div>

<!-- Fake scrollbar (when open popups/modals) -->
<div class="fake-scrollbar"></div>

<!-- Login / Sign Up Modal -->
<div class="modal fade" id="login-modal">
    <div class="modal-dialog">
        <div class="container">
            <div class="modal-form">
                <div class="tab-content">
                    <!-- Sign in form -->
                    <form class="tab-pane transition scale fade in active" method="POST" id="signin-form"
                          autocomplete="off" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <h3 class="modal-title space-bottom-2x">Giriş Yap</h3>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="form-input ">
                                <input type="email" name="email" id="si_email" readonly
                                       onfocus="$(this).removeAttr('readonly');" required value="{{ old('email') }}">
                                <label for="si_email">Email</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-input">
                            <input type="email" name="si_email" id="si_email" readonly onfocus="$(this).removeAttr('readonly');" required>
                            <label for="si_email">Email</label>
                            <span class="error-label">Hatalı Email</span>
                            <span class="valid-label"></span>
                        </div>--}}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="form-input">
                                <a class="helper-link" href="/password/reset">Şifremi Unuttum?</a>
                                <input type="password" id="si_password" readonly
                                       onfocus="$(this).removeAttr('readonly');" required name="password">
                                <label for="si_password">Şifre</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-input">
                            <a class="helper-link" href="#">Forgot password?</a>
                            <input type="password" name="si_password" id="si_password" readonly onfocus="$(this).removeAttr('readonly');" required>
                            <label for="si_password">Password</label>
                            <span class="error-label"></span>
                            <span class="valid-label"></span>
                        </div>--}}
                        <label class="checkbox">
                            <input name="remember" type="checkbox"> Beni Hatırla
                        </label>
                        <div class="space-top-2x clearfix">
                            <button type="button" class="btn btn-round btn-ghost btn-danger pull-left"
                                    data-dismiss="modal"><i class="flaticon-cross37"></i></button>
                            <button type="submit" class="btn btn-round btn-ghost btn-success pull-right"><i
                                        class="flaticon-correct7"></i></button>
                        </div>
                        <!-- Switching forms (Fake nav tab) -->
                        <div class="form-switch helper-text space-top-2x">Hesabınız Yok Mu? <a href="#form-1">Hemen
                                Kayıt Olun</a></div>
                    </form>
                    <!-- Sign up form -->
                    <form class="tab-pane transition scale fade" method="post" action="{{ url('/register') }}"
                          id="signup-form">
                        {{ csrf_field() }}
                        <h3 class="modal-title space-bottom-2x">Kayıt Ol</h3>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="form-input">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                <label for="name">Adınız</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="form-input">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}">
                                <label for="email">Email</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="form-input">
                                <input id="password" type="password" class="form-control" name="password">
                                <label for="password">Şifre</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <div class="form-input">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation">
                                <label for="password-confirm">Şifre Tekrar</label>
                                <span class="error-label"></span>
                                <span class="valid-label"></span>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--<div class="form-input">
                            <input type="email" name="su_email" id="su_email" required>
                            <label for="su_email">Email</label>
                            <span class="error-label"></span>
                            <span class="valid-label"></span>
                        </div>
                        <div class="form-input">
                            <input type="password" name="su_password" id="su_password" required>
                            <label for="su_password">Password</label>
                            <span class="error-label"></span>
                            <span class="valid-label"></span>
                        </div>
                        <div class="form-input">
                            <input type="password" name="su_password_repeat" id="su_password_repeat" required>
                            <label for="su_password_repeat">Repeat password</label>
                            <span class="error-label"></span>
                            <span class="valid-label"></span>
                        </div>--}}
                        <label class="checkbox">
                            <input type="checkbox"> Yeniliklerden Haberdar Ol
                        </label>
                        <div class="space-top-2x clearfix">
                            <button type="button" class="btn btn-round btn-ghost btn-danger pull-left"
                                    data-dismiss="modal"><i class="flaticon-cross37"></i></button>
                            <button type="submit" class="btn btn-round btn-ghost btn-success pull-right"><i
                                        class="flaticon-correct7"></i></button>
                        </div>
                        <!-- Switching forms (Fake nav tab) -->
                        <div class="form-switch helper-text space-top-2x">Hesabın var mı? <a href="#form-2">Giriş
                                Yap</a></div>
                    </form>
                </div>
                <!-- Hidden real nav tabs -->
                @if(Auth::guest())
                    <ul class="nav-tabs hidden">
                        <li id="form-1"><a href="#signup-form" data-toggle="tab">Kayıt Ol</a></li>
                        <li id="form-2"><a href="#signin-form" data-toggle="tab">Giriş Yap</a></li>
                    </ul>
                @endif

            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Search Modal -->
<div class="modal fade" id="search-modal">
    <div class="modal-dialog">
        <div class="container">
            <!-- Search form -->
            <form class="modal-form" id="search-form">
                <h3 class="modal-title space-bottom-2x">Search</h3>
                <div class="form-input">
                    <input type="text" name="search_inpt" id="search_inpt" required>
                    <label for="search_inpt">Type to search</label>
                    <span class="error-label"></span>
                    <span class="valid-label"></span>
                </div>
                <div class="space-top-2x clearfix">
                    <button type="button" class="btn btn-round btn-ghost btn-danger pull-left" data-dismiss="modal"><i
                                class="flaticon-cross37"></i></button>
                    <button type="submit" class="btn btn-round btn-ghost btn-success pull-right"><i
                                class="pe-7s-search"></i></button>
                </div>
            </form>
        </div>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Top Bar -->
<!-- The screen width at which topbar disappears can be controlled through the variable "@topbar-hidden" in less/variables.less -->
<div class="top-bar">
    <div class="container">
        <div class="social-buttons">
            <a href="#" class="sb-twitter cbutton cbutton--effect"><i class="bi-twitter"></i></a>
            <a href="#" class="sb-google-plus cbutton cbutton--effect"><i class="bi-gplus"></i></a>
            <a href="#" class="sb-facebook cbutton cbutton--effect"><i class="bi-facebook"></i></a>
        {{--<a href="#" class="sb-skype"><i class="bi-skype"></i>8guild</a>--}}
        <!-- <a href="#" class="sb-behance"><i class="bi-behance"></i></a> -->
            <!-- <a href="#" class="sb-bitbucket"><i class="bi-bitbucket"></i></a> -->
            <!-- <a href="#" class="sb-codepen"><i class="bi-codepen"></i></a> -->
            <!-- <a href="#" class="sb-deviantart"><i class="bi-deviantart"></i></a> -->
            <!-- <a href="#" class="sb-digg"><i class="bi-digg"></i></a> -->
            <!-- <a href="#" class="sb-dribbble"><i class="bi-dribbble"></i></a> -->
            <!-- <a href="#" class="sb-dropbox"><i class="bi-dropbox"></i></a> -->
            <!-- <a href="#" class="sb-flickr"><i class="bi-flickr"></i></a> -->
            <!-- <a href="#" class="sb-foursquare"><i class="bi-foursquare"></i></a> -->
            <!-- <a href="#" class="sb-github"><i class="bi-github"></i></a> -->
            <!-- <a href="#" class="sb-instagram"><i class="bi-instagram"></i></a> -->
            <!-- <a href="#" class="sb-jsfiddle"><i class="bi-jsfiddle"></i></a> -->
            <!-- <a href="#" class="sb-lastfm"><i class="bi-lastfm"></i></a> -->
            <!-- <a href="#" class="sb-linkedin"><i class="bi-linkedin"></i></a> -->
            <!-- <a href="#" class="sb-paypal"><i class="bi-paypal"></i></a> -->
            <!-- <a href="#" class="sb-pinterest"><i class="bi-pinterest-circled"></i></a> -->
            <!-- <a href="#" class="sb-reddit"><i class="bi-reddit"></i></a> -->
            <!-- <a href="#" class="sb-soundcloud"><i class="bi-soundcloud"></i></a> -->
            <!-- <a href="#" class="sb-stackoverflow"><i class="bi-stackoverflow"></i></a> -->
            <!-- <a href="#" class="sb-steam"><i class="bi-steam"></i></a> -->
            <!-- <a href="#" class="sb-stumbleupon"><i class="bi-stumbleupon"></i></a> -->
            <!-- <a href="#" class="sb-trello"><i class="bi-trello"></i></a> -->
            <!-- <a href="#" class="sb-tumblr"><i class="bi-tumblr"></i></a> -->
            <!-- <a href="#" class="sb-twitch"><i class="bi-twitch"></i></a> -->
            <!-- <a href="#" class="sb-vimeo"><i class="bi-vimeo-squared"></i></a> -->
            <!-- <a href="#" class="sb-vine"><i class="bi-vine"></i></a> -->
            <!-- <a href="#" class="sb-vk"><i class="bi-vkontakte"></i></a> -->
            <!-- <a href="#" class="sb-wechat"><i class="bi-wechat"></i></a> -->
            <!-- <a href="#" class="sb-wordpress"><i class="bi-wordpress"></i></a> -->
            <!-- <a href="#" class="sb-xing"><i class="bi-xing"></i></a> -->
            <!-- <a href="#" class="sb-yahoo"><i class="bi-yahoo"></i></a> -->
            <!-- <a href="#" class="sb-yelp"><i class="bi-yelp"></i></a> -->
            <!-- <a href="#" class="sb-youtube"><i class="bi-youtube"></i></a> -->
        </div>

    </div>
</div>

<!-- Navbar -->
<!-- Add class ".navbar-sticky" to make navbar stuck when it hits the top of the page. You can also use modifier classes like: "navbar-dark", "navbar-ghost navbar-ghost-light", .navbar-ghost navbar-ghost-dark" to change navbar apperance. The screen width at which navbar collapses can be controlled through the variable "@nav-collapse" in less/variables.less -->
<header class="navbar navbar-sticky">
    <div class="container">
    <!-- Logo icon width can be adjusted trough the variable '@logo-img-max-width' in less/variables.less. The logo width (icon + text) can be adjusted trough the variable '@logo-max-width' in less/variables.less. -->
        <a href="index.html" class="logo">
            <img src="frontend/img/logo/logo-007aff.png" alt="iTheme">
            <span>kare-code</span>
        </a>

        <!-- Site Navigation -->
        <nav class="navbar-nav" id="site-menu">


            <!-- Navigation -->
            <ul>
                <li class="has-submenu active"><a href="#">Home</a>
                    <ul class="submenu">
                        <li class="active"><a href="index.html">Introduction Page</a></li>
                        <li class="has-sub-submenu">
                            <a href="#">Corporate Homepage</a>
                            <ul class="sub-submenu">
                                <li><a href="home-corporate-static-bg.html">Static Image Background</a></li>
                                <li><a href="home-corporate-fullscreen-video.html">Video Fullscreen Background</a></li>
                                <li><a href="home-corporate-fullwidth-slider.html">Full Width Slider (Revolution
                                        Slider)</a></li>
                                <li><a href="home-corporate-fullscreen-slider.html">Fullscreen Slider (Revolution
                                        Slider)</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Business Areas</a>
                            <ul class="sub-submenu">

                                <li><a href="home-business-restaurant.html">Culinary / Restaurant</a></li>
                                <li><a href="home-business-it.html">IT / Software Development</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Portfolio Homepage</a>
                            <ul class="sub-submenu">
                                <li><a href="home-portfolio-web-agency.html">Web Agency</a></li>
                                <li><a href="home-portfolio-photographer.html">Photographer</a></li>
                                <li><a href="home-portfolio-freelancer.html">Freelancer</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Shop Homepage</a>
                            <ul class="sub-submenu">
                                <li><a href="home-shop-fullscreen-slider.html">Fullscreen Slider (Revolution Slider)</a>
                                </li>
                                <li><a href="home-shop-fullwidth-slider.html">Full Width Slider (Revolution Slider)</a>
                                </li>
                                <li><a href="home-shop-featured-slider.html">Featured Products Slider (Master
                                        Slider)</a></li>
                                <li><a href="home-shop-categories-grid.html">Categories Grid</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Portfolio</a>
                    <ul class="submenu">
                        <li><a href="portfolio-list.html">Portfolio List Layout</a></li>
                        <li><a href="portfolio-categorized.html">Portfolio Categorized</a></li>
                        <li class="has-sub-submenu">
                            <a href="#">Portfolio Grid</a>
                            <ul class="sub-submenu">
                                <li><a href="portfolio-grid-1col.html">Portfolio Grid 1 Column</a></li>
                                <li><a href="portfolio-grid-2col.html">Portfolio Grid 2 Columns</a></li>
                                <li><a href="portfolio-grid-3col.html">Portfolio Grid 3 Columns</a></li>
                                <li><a href="portfolio-grid-4col.html">Portfolio Grid 4 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="portfolio-grid-masonry.html">Portfolio Masonry Grid</a></li>
                        <li class="has-sub-submenu">
                            <a href="#">Portfolio Single Project</a>
                            <ul class="sub-submenu">
                                <li><a href="portfolio-single-v1.html">Portfolio Single Project v.1</a></li>
                                <li><a href="portfolio-single-v2.html">Portfolio Single Project v.2</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Portfolio Grid No Gap Boxed</a>
                            <ul class="sub-submenu">
                                <li><a href="portfolio-nogap-boxed-mixed.html">Portfolio Mixed Columns</a></li>
                                <li><a href="portfolio-nogap-boxed-1col.html">Portfolio 1 Column</a></li>
                                <li><a href="portfolio-nogap-boxed-2col.html">Portfolio 2 Columns</a></li>
                                <li><a href="portfolio-nogap-boxed-3col.html">Portfolio 3 Columns</a></li>
                                <li><a href="portfolio-nogap-boxed-4col.html">Portfolio 4 Columns</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Portfolio Grid No Gap Full Width</a>
                            <ul class="sub-submenu">
                                <li><a href="portfolio-nogap-fw-mixed.html">Portfolio Mixed Columns</a></li>
                                <li><a href="portfolio-nogap-fw-1col.html">Portfolio 1 Column</a></li>
                                <li><a href="portfolio-nogap-fw-2col.html">Portfolio 2 Columns</a></li>
                                <li><a href="portfolio-nogap-fw-3col.html">Portfolio 3 Columns</a></li>
                                <li><a href="portfolio-nogap-fw-4col.html">Portfolio 4 Columns</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Blog</a>
                    <ul class="submenu">
                        <li class="has-sub-submenu">
                            <a href="#">Blog Grid Full Width</a>
                            <ul class="sub-submenu">
                                <li><a href="blog-grid-fullwidth-2col.html">Blog Grid 2 Columns</a></li>
                                <li><a href="blog-grid-fullwidth-3col.html">Blog Grid 3 Columns</a></li>
                                <li><a href="blog-grid-fullwidth-4col.html">Blog Grid 4 Columns</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Blog Grid with Sidebar</a>
                            <ul class="sub-submenu">
                                <li><a href="blog-grid-sidebar-2col.html">Blog Grid 2 Columns</a></li>
                                <li><a href="blog-grid-sidebar-3col.html">Blog Grid 3 Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="blog-grid-masonry.html">Blog Grid Masonry</a></li>
                        <li class="has-sub-submenu">
                            <a href="#">Blog List</a>
                            <ul class="sub-submenu">
                                <li><a href="blog-list-fullwidth.html">Blog List Full Width</a></li>
                                <li><a href="blog-list-sidebar.html">Blog List with Sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="blog-single.html">Blog Single Post</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Shop</a>
                    <ul class="submenu">
                        <li class="has-sub-submenu">
                            <a href="#">Shop Grid Full Width</a>
                            <ul class="sub-submenu">
                                <li><a href="shop-grid-fullwidth-2col.html">Shop Grid 2 Columns</a></li>
                                <li><a href="shop-grid-fullwidth-3col.html">Shop Grid 3 Columns</a></li>
                                <li><a href="shop-grid-fullwidth-4col.html">Shop Grid 4 Columns</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Shop Grid with Sidebar</a>
                            <ul class="sub-submenu">
                                <li><a href="shop-grid-sidebar-2col.html">Shop Grid 2 Columns</a></li>
                                <li><a href="shop-grid-sidebar-3col.html">Shop Grid 3 Columns</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Shop List</a>
                            <ul class="sub-submenu">
                                <li><a href="shop-list-fullwidth.html">Shop List Full Width</a></li>
                                <li><a href="shop-list-sidebar.html">Shop List with Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-submenu">
                            <a href="#">Single Product</a>
                            <ul class="sub-submenu">
                                <li><a href="shop-single-v1.html">Single Product v.1</a></li>
                                <li><a href="shop-single-v2.html">Single Product v.2</a></li>
                            </ul>
                        </li>
                        <li><a href="shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </li>
                <li class="has-submenu"><a href="#">Pages</a>
                    <ul class="submenu">
                        <li><a href="parallax-cta.html">Parallax CTA</a></li>
                        <li><a href="faq-support.html">FAQ / Support</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="clients.html">Clients</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="login.html">Log In / Sign Up</a></li>
                        <li><a href="under-construction.html">Under Construction</a></li>
                        <li><a href="404.html">404 Page</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="search-results.html">Search Results</a></li>
                        <li><a href="sitemap.html">Sitemap</a></li>
                    </ul>
                </li>
                <li class="has-mega-menu"><a href="#">Elements</a>
                    <div class="mega-menu">
                        <!-- Possible layout options ".column-2", ".column-3", ".column-4" -->
                        <ul class="column-4">
                            <li class="submenu-heading">A - B</li>
                            <li><a href="elements/accordions.html">Accordions &amp; Panels</a></li>
                            <li><a href="elements/alerts.html">Alerts</a></li>
                            <li><a href="elements/animations.html">Animations</a></li>
                            <li><a href="elements/block-titles.html">Block Titles</a></li>
                            <li><a href="elements/buttons.html">Buttons</a></li>
                            <li class="submenu-heading">C - D</li>
                            <li><a href="elements/charts.html">Charts</a></li>
                            <li><a href="elements/clients.html">Clients</a></li>
                            <li><a href="elements/cta-and-banners.html">Call To Action &amp; Banners</a></li>
                            <li><a href="elements/countdowns.html">Countdowns</a></li>
                            <li><a href="elements/counters.html">Counters</a></li>
                            <li><a href="elements/dividers.html">Dividers</a></li>
                        </ul>
                        <ul class="column-4">
                            <li class="submenu-heading">F - G</li>
                            <li><a href="elements/fonts.html">Fonts</a></li>
                            <li><a href="elements/footers.html">Footers</a></li>
                            <li><a href="elements/forms.html">Forms</a></li>
                            <li><a href="elements/gradients-and-colors.html">Gradients &amp; Solid Colors</a></li>
                            <li><a href="elements/grids.html">Grids</a></li>
                            <li class="submenu-heading">H - I</li>
                            <li><a href="elements/headers.html">Headers</a></li>
                            <li><a href="elements/icons.html">Icons</a></li>
                            <li><a href="elements/content-boxes.html">Icon Content Boxes</a></li>
                            <li><a href="elements/info-notifications.html">Info Notifications</a></li>
                            <li><a href="elements/images.html">Images &amp; Thumbnails</a></li>
                            <li><a href="elements/comparison-slider.html">Image Comparison Slider</a></li>
                        </ul>
                        <ul class="column-4">
                            <li class="submenu-heading">L - M</li>
                            <li><a href="elements/labels-and-badges.html">Labels &amp; Badges</a></li>
                            <li><a href="elements/list-groups.html">List Groups</a></li>
                            <li><a href="elements/maps.html">Maps</a></li>
                            <li><a href="elements/master-slider.html">Master Slider (Premium)</a></li>
                            <li><a href="elements/morphing-devices.html">Morphing Devices</a></li>
                            <li class="submenu-heading">P - R - S</li>
                            <li><a href="elements/page-titles.html">Page Titles &amp; Breadcrumbs</a></li>
                            <li><a href="elements/pricing-plans.html">Pricing Plans</a></li>
                            <li><a href="elements/progress-bars.html">Progress Bars</a></li>
                            <li><a href="elements/ratings.html">Rating System</a></li>
                            <li><a href="elements/sliders-and-carousels.html">Sliders &amp; Carousels</a></li>
                            <li><a href="elements/sliders-and-switches.html">Sliders &amp; Switches</a></li>
                        </ul>
                        <ul class="column-4">
                            <li class="submenu-heading">T</li>
                            <li><a href="elements/tabs.html">Tabs</a></li>
                            <li><a href="elements/tables.html">Tables</a></li>
                            <li><a href="elements/team.html">Team</a></li>
                            <li><a href="elements/testimonials.html">Testimonials</a></li>
                            <li><a href="elements/text-columns.html">Text Columns</a></li>
                            <li><a href="elements/tiles.html">Tiles</a></li>
                            <li><a href="elements/timelines.html">Timelines</a></li>
                            <li><a href="elements/tooltips-and-popovers.html">Tooltips &amp; Popovers</a></li>
                            <li><a href="elements/typography.html">Typography</a></li>
                            <li class="submenu-heading">V - W</li>
                            <li><a href="elements/videos.html">Videos</a></li>
                            <li><a href="elements/widgets.html">Widgets</a></li>
                        </ul>
                    </div>
                </li>

                @if(Auth::check())
                    <li class="has-submenu "><a class="text-success" href="#">{{Auth::user()->name}}</a>
                        <ul class="submenu">
                            @if(Auth::user()->user_type==1)
                                <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                            @endif
                            <li><a href="{{ url('/logout') }}">Çıkış Yap</a></li>
                        </ul>
                    </li>
                @endif

            </ul>
        </nav><!-- Site Navigation End -->

        <!-- Toolbar -->
        <nav class="navbar-tools">
            <ul>

                <!-- Sign Up -->
                @if(Auth::guest())
                    <li class="signup-btn"><a href="#" data-toggle="modal" data-target="#login-modal"
                                              data-modal-form="sign-up">Kayıt Ol</a></li>

                    <!-- Login -->
                    <li class="login-btn"><a href="#" data-toggle="modal" data-target="#login-modal"
                                             data-modal-form="sign-in" class="text-success">Giriş Yap</a></li>


            @endif
            <!-- Search -->
                <li class="navbar-search cbutton cbutton--effect">
                    <a href="#" data-toggle="modal" data-target="#search-modal" class="pe-7s-search"></a>
                </li>


                <!-- Navigation Toggle -->
                <li class="nav-toggle cbutton cbutton--effect">
                    <a href="#" class="flaticon-list26" data-nav-target="#site-menu"></a>
                </li>
            </ul>
        </nav>
    </div>
</header><!-- Navbar End -->

@yield('content')

<!-- Footer -->
<!-- To switch to light version simply remove class ".footer-dark" -->
<footer class="footer footer-dark">
    <div class="container">

        <!-- Widgets Row -->
        <!-- ".widgets-row" has additional modifier classes ".widgets-row-3cols" and ".widgets-row-2cols" to create 3 and 2 columns layouts respectively. Also make sure to add ".col-1, .col-2, .col-3, .col-4" to ".widgets-col". -->
        <div class="widgets-row widgets-row-4cols">

            <!-- Widget About  -->
            <div class="widgets-col col-1">
                <div class="widget">
                <!-- Logo icon width can be adjusted trough the variable '@footer-logo-img-max-width' in less/variables.less -->
                    <a href="#" class="logo footer-logo">
                        <img src="/frontend/img/logo/logo-007aff.png" alt="iTheme">
                        <span>iTheme</span>
                    </a>
                    <p class="size-sm space-bottom">Advanced multipurpose theme with lots of components and layout
                        options. This gives endless possibilities when it comes to building websites of any type and
                        complexity. Multiple skins and elements varitions make even more versatile.</p>
                    <div class="social-buttons">
                        <a href="#" class="sb-twitter cbutton cbutton--effect"><i class="bi-twitter"></i></a>
                        <a href="#" class="sb-google-plus cbutton cbutton--effect"><i class="bi-gplus"></i></a>
                        <a href="#" class="sb-facebook cbutton cbutton--effect"><i class="bi-facebook"></i></a>
                    </div>
                </div>
            </div>

            <!-- Widget Photo Stream  -->
            <div class="widgets-col col-2">
                <div class="widget widget-photo-stream">
                    <h3 class="widget-title">Photo stream</h3>
                    <div class="photo-grid">
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/01.jpg" alt="Thumbnail"></a>
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/02.jpg" alt="Thumbnail"></a>
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/03.jpg" alt="Thumbnail"></a>
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/04.jpg" alt="Thumbnail"></a>
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/05.jpg" alt="Thumbnail"></a>
                        <a href="#"><img src="/frontend/img/widgets/photo-stream/06.jpg" alt="Thumbnail"></a>
                    </div>
                    <a href="#" class="link">Follow us on instagram</a>
                </div>
            </div>

            <!-- Widget Twitter Feed  -->
            <div class="widgets-col col-3">
                <div class="widget widget-twitter-feed">
                    <h3 class="widget-title">Recent tweets</h3>
                    <div class="w-item">
                        <div class="w-item-thumb">
                            <i class="bi-twitter"></i>
                        </div>
                        <div class="w-item-content">
                            <p>Appica 2. Special Mention! We got it, thnx! See it here! <a href="http://bit.ly/1LZwdP6"
                                                                                           target="_blank">http://bit.ly/1LZwdP6</a>
                            </p>
                        </div>
                    </div>
                    <div class="w-item">
                        <div class="w-item-thumb">
                            <i class="bi-twitter"></i>
                        </div>
                        <div class="w-item-content">
                            <p>Check out new work on my @Behance portfolio: "Appica 2" <a
                                        href="http://on.be.net/1J0ozFX" target="_blank">http://on.be.net/1J0ozFX</a></p>
                        </div>
                    </div>
                    <a href="#" class="link">Follow us on Twitter</a>
                </div>
            </div>

            <!-- Widget Subscribe -->
            <div class="widgets-col col-4">
                <div class="widget">
                    <h3 class="widget-title">Subscribe</h3>
                    <p class="size-sm space-bottom">Feel free to subscribe to our newspaper. We do not tolerate
                        spam.</p>

                    <!-- MailChimp Subscription -->
                    <form action="//8guild.us3.list-manage.com/subscribe/post?u=168a366a98d3248fbc35c0b67&amp;id=916472e71b"
                          method="post" id="subscr-widget-form2" target="_blank" novalidate autocomplete="off">
                        <div class="form-input form-input-light">
                            <input type="email" name="EMAIL" id="sw_email2" required>
                            <label for="sw_email2">Email</label>
                            <span class="error-label"></span>
                            <span class="valid-label"></span>
                        </div>

                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text"
                                                                               name="b_168a366a98d3248fbc35c0b67_916472e71b"
                                                                               tabindex="-1" value=""></div>

                        <button type="submit" class="btn btn-ghost btn-light btn-sm btn-block">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Subfooter -->
    <div class="subfooter">
        <div class="container">
            <p class="copyright">&copy; 2015 <a href="http://8guild.com/" target="_blank">8 Guild</a>. All rights
                reserved.</p>
        </div>
    </div>
</footer><!-- Footer End -->


<!-- JavaScript (jQuery) libraries and scripts -->
<script src="{{asset('frontend/js/libs/jquery-1.11.2.min.js')}}"></script>
<script src="{{asset('frontend/js/libs/jquery.easing.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/smoothscroll.js')}}"></script>
<script src="{{asset('frontend/js/plugins/velocity.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/form-plugins.js')}}"></script>
<script src="{{asset('frontend/js/plugins/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/icon-click-effect.js')}}"></script>
<script src="{{asset('frontend/js/plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('frontend/js/plugins/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/masterslider/masterslider.min.js')}}"></script>
<script src="{{asset('frontend/js/scripts.js')}}"></script>
@yield('js')
</body><!-- Body End -->

</html>
