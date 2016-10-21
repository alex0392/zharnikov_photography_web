<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-->
    <link rel="stylesheet" href="/src/css/normalize.css">
    <link rel="stylesheet" href="/src/css/template.css">
    <script src="/src/js/jquery-2.1.4.js"></script>
    @yield('style')
    @include('include/preloader')
    <!-- end style-->
    <title>Vladislav Zharnikov - @yield('title')</title>
  </head>
  <body>
    <div id="loading">
      <div id="loading-center">
        <div id="loading-center-absolute">
          <div class="object" id="object_one"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_four"></div>
          <div class="object" id="object_big"></div>
        </div>
      </div>
    </div>
    <header class="header cd-main-header"><a href="#0" class="cd-nav-trigger">Menu<span></span></a></header>
    <div class="page-wrapp cd-main-content">
      <div class="sidebar cd-side-nav">
        <div class="logo-box"><a href="/"><img src="/src/images/logo_2.png" alt="logotype"></a></div>
        <div class="main-nav-box">
          <nav> 
            <ul>
              <li class="has-children"><a href="/">Главная</a></li>
              <li class="has-children"><a href="/portfolio" class="{{ Request::is('portfolio/*/*') ? 'active' : ''  }}{{ Request::is('portfolio/*') ? ' active' : null  }}{{ Request::path() ==  'portfolio' ? 'active' : ''  }}">Альбомы</a>
                <ul>
                  @foreach($albomTypeList as $type)
                    <li><a href="/portfolio/{{explode('/',$type->link)[0]}}" class="{{ Request::is('portfolio/'.explode('/',$type->link)[0].'/*') ? 'active' : ''  }}{{ Request::is('portfolio/'.explode('/',$type->link)[0].'') ? 'active' : ''  }}">{{$type->albom_type}}</a></li>   
                  @endforeach
                </ul>
              </li>
              <li class="has-children"><a href="/about" class="{{ Request::path() ==  'about' ? 'active' : ''  }}">Обо мне</a></li>
              <li class="has-children"><a href="/contact" class="{{ Request::path() ==  'contact' ? 'active' : ''  }}">Контакты</a></li>
            </ul>
          </nav>
        </div>
        <div class="contact-box">
          <div class="phone">
            <p>+375 29 511 81 90</p>
          </div>
          <div class="social-area">
            <div class="social"><a href="#">vk</a></div>
            <div class="social"><a href="#">facebook</a></div>
            <div class="social"><a href="#">twitter</a></div>
          </div>
        </div>
      </div>
      <div class="content-container">
        <div class="section-content">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="copyright-block">
            <p>&copy Vladislav Zharnikov {{date('Y')}}</p>
          </div>
          <div class="developer-block"><span>Site developer</span><a href="http://www.devsite.by">Romanov Alex</a></div>
        </footer>
      </div>
    </div>
    <!--navigation-->
    <script src="/src/js/jquery.menu-aim.js"></script>
    <script src="/src/js/main.js"></script>
    @yield('script')
    <script type="text/javascript">
      $(window).load(function() {
        $("#loading").delay(2000).fadeOut(500);
        $("#loading-center").click(function() {
          $("#loading").fadeOut(500);
        })
      })
    </script>
  </body>
</html>