<!DOCTYPE html>
<html>
<head>
	<title>Vladislav Zharnikov - Страница не найдена</title>
	<style type="text/css">
		@font-face {
  			font-family: YanoneKaffeesatz;
  			src: url(/src/fonts/YanoneKaffeesatz/YanoneKaffeesatz.otf);
		}
		body{
			margin:0;
			padding: 0;
		}
		.container{
			width: 100%;
			height: 100vh;
			background-color: #2a2b30;
		}
		.content{
			position: absolute;
			top:40%;
			width: 100%;
		}
		h1{
			text-align: center;
			color:#fff;
			font-family: YanoneKaffeesatz;
			font-size: 30px;
		}
		p{
			text-align: center;
			color:#fff;
			font-family: YanoneKaffeesatz;
			font-size: 20px;
		}
		.btn-box{
			text-align: center;
			margin: 20px auto;
		}
		.btn-box a{
			color:#757575;
			text-decoration: none;
			font-size: 20px;
			position: relative;
			padding: 10px 5px;
			font-family: YanoneKaffeesatz;
			font-weight: bold;
		}
		.btn-box a:before{
			content: "";
			position: absolute;
			z-index: -1;
			left: 0;
			right: 0;
			bottom: 0;
			background: #757575;
			height: 2px;
			-webkit-transform: translateY(4px);
			transform: translateY(4px);
			-webkit-transition-property: transform;
			transition-property: transform;
			-webkit-transition-duration: 0.3s;
			transition-duration: 0.3s;
			-webkit-transition-timing-function: ease-out;
			transition-timing-function: ease-out;
		}
		.btn-box a:hover:before{
			z-index: 1;
			-webkit-transform: translateY(0);
  			transform: translateY(0);
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="content">
			<h1>Упс... Страница не найдена</h1>
			<p>page not found (404 error )</p>
			<div class="btn-box">
				<a href="/" >вернуться на главную</a>
			</div>	
		</div>
	</div>
	
</body>
</html>