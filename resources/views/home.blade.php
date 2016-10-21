<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <!-- style-->
    <link rel="stylesheet" href="/src/css/normalize.css">
    <!--<link rel="stylesheet" href="/src/css/foundation.css">-->
    <link rel="stylesheet" href="/src/css/result.css">
    <link rel="stylesheet" href="/src/css/slick.css">
    <!-- end style-->
    <!-- begin script-->
    <!--script(src="//localhost:35729/livereload.js")-->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <!--script(type="text/javascript" src="src/js/script.js")-->
    <!-- end script-->
    @include('include/preloader')
    <title>{{$title}}</title>
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
    <div class="page-wrapp">
      <header class="header">
        <div class="header__logo-box"><a href="/"><img src="/src/images/logo_2.png" alt="logotype"></a></div>
        <div class="header__hero"></div>
      </header>
      <section class="photo-box">
        <section class="center slider">
        @foreach($photoList as $photo)
          <div>
            <div class="box-img">
              <img src="gellery/{{$photo->name}}" alt="{{$photo->name}}">
            </div>
          </div>
        @endforeach
        </section>
      </section>
      <div class="view_work"><a href="/portfolio"><span>больше работ<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 36.1 25.8" enable-background="new 0 0 36.1 25.8" xml:space="preserve">
        <g>
          <line fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" x1="0" y1="12.9" x2="34" y2="12.9"></line>
          <polyline fill="none" stroke="#FFFFFF" stroke-width="3" stroke-miterlimit="10" points="22.2,1.1 34,12.9 22.2,24.7   "></polyline>
        </g>
      </svg></span><i></i></a></div>
      <section class="main-menu-box">
        <ul class="nav">
          <li class="nav_item nav_item-left"><a href="/about">Обо мне</a></li>
          <li class="nav_item nav_item-right"> <a href="/contact">Контакты</a></li>
        </ul>
      </section>
      <footer class="footer">
        <div class="footer-block copyright">
          <p>&copy Vladislav Zharnikov {{date('Y')}}</p>
        </div>
        <div class="footer-block contacts_info">
          <div class="phone"><a href="tel:+375295118190">+375 29 511 81 90</a></div>
          <div class="footer-block social-block">
            <ul>
              <li><a href="#">vk</a></li>
              <li><a href="#">facebook</a></li>
              <li><a href="#">twitter</a></li>
            </ul>
          </div>
        </div>
        <div class="footer-block create">
          <div class="create-box"><span>Site developer</span><a href="http://www.devsite.by">Romanov Alex</a></div>
        </div>
      </footer>
    </div>
  </body>
</html>
<script src="/src/js/slick.js"></script>

<script>
$(document).on('ready', function() {
      $(".center").slick({
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        centerPadding: '60px',
        pauseOnFocus:false,
        pauseOnHover:false,
        arrows:false,
        cssEase:'linear',
        centerMode: true,
        variableWidth: true,
        lazyLoad:'ondemand',
        autoplay: true,
        autoplaySpeed: 4500,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 3
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: false,
              centerMode: true,
              centerPadding: '40px',
              slidesToShow: 1
            }
          }
        ]
      });
      $(".slick-slide").click(function(){
        var idSlide=$(this).attr('data-slick-index');
        $('.center').slick('slickGoTo',idSlide);
      })
});
      $(window).load(function() {
        $("#loading").delay(2000).fadeOut(500);
        $("#loading-center").click(function() {
          $("#loading").fadeOut(500);
        })
      })
</script>
