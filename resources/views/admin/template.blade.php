<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style-->
    <link rel="stylesheet" href="/src/css/bootstrap.min.css">
    <link rel="stylesheet" href="/src/admin/css/normalize.css">
    <link rel="stylesheet" href="/src/admin/css/template.css">
    @yield('style')
    <!-- end style-->
    <title>Админ панель-{{$title}}</title>
  </head>
  <body>
    <header class="header cd-main-header"><a href="#0" class="cd-nav-trigger">Menu<span></span></a></header>
    <div class="page-wrapp cd-main-content">
      <div class="sidebar cd-side-nav">
        <div class="logo-box"><a href="/"><img src="/src/images/logo_2.png" alt="logotype"></a></div>
        <div class="profile_info_box">
          <p>Вы вошли как: <span>{{$userName}}</span></p>
          <div class="logout">
            <a href="/logout">Выйти</a>
          </div>
        </div>
        <div class="main-nav-box">
          <nav> 
            <ul>
              <li class="has-children" ><a href="/admin" class="{{ Request::path() ==  'admin' ? 'active' : ''  }}">Главная</a></li>
              <li class="has-children"><a href="/admin/albom" class="{{ Request::is('admin/albom/*') ? 'active' : ''  }}{{ Request::path() ==  'admin/albom' ? 'active' : ''  }}">Альбомы</a></li>
              <li class="has-children"><a href="/admin/about" class="{{ Request::path() ==  'admin/about' ? 'active' : ''  }}" >Обо мне</a></li>
              <li class="has-children"><a href="/admin/profile" class="{{ Request::path() ==  'admin/profile' ? 'active' : ''  }}">Профиль</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="content-container">
        <div class="title-page">
          <h2>{{$title}}</h2>
        </div>
        <div class="section-content">
          @yield('content')
        </div>
        <footer class="footer">
          <div class="copyright-block">
            <p>&copy Vladislav Zharnikov 2016</p>
          </div>
          <div class="developer-block"><span>Site developer</span><a href="http://www.devsite.by">Romanov Alex</a></div>
        </footer>
      </div>
    </div>
    <!--script-->
    <script src="/src/admin/js/jquery-2.1.4.js"></script>
    <script src="/src/js/bootstrap.min.js"></script>
    <script src="/src/admin/js/jquery.menu-aim.js"></script>
    <script src="/src/admin/js/main.js"></script>
    @yield('script')
  </body>
</html>
