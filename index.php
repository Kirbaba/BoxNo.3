<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE">
    </script>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    	<nav>
		<img src="<?php bloginfo('template_directory'); ?>/img/logo.png">
		<div id='navig' class='lightgray roman'>
			<h3 id='navhome'>ГЛАВНАЯ</h3>
			<h3 id='navworks'>РАБОТЫ</h3>
			<h3 id='navprices'>ЦЕНЫ</h3>
			<h3 id='navcontacts'>КОНТАКТЫ</h3>
		</div>
	</nav>
	<header>
		<h1>8 (495) 761-12-90</h1>
		<h2 class='yellow'>Клубный автосервис</h2>
		<p class='gray ul'><br>Главное задачей сервиса «Бокс №3» - это<br>
			комплексный подход<br>
			к ремонту Вашего автомобиля</p>
		<button class='white thin' id='writeus'>НАПИСАТЬ НАМ</button>
		<p class='white thin' id='p-bottom'>Это специализированный <b><span class='green'>клубный автосервис</span></b>,<br>который занимается ремонтом и техническим обслуживанием японских<br><b><span class='green'>автомобилей марки Honda</span></b>.</p>
	</header>
	<section id='s2'><!-- 
		--><article id='a1'>
			<h2 class='bold darkyellow'>Prelude 4</h2>
			<p class='medium white'><br>Первый в мире Свап в Prelude 4gen на J32A<br>
			<span class='thin'>Мотор</span> - 3.2 литра Втек V6 от<br>
			Honda Saber TypeS 260 л.сил<br>
			<span class='thin'>Трансмиссия</span> - Honda odyssey j30a 4wd
			</p>
		</article><!--
		--><article><img src="<?php bloginfo('template_directory'); ?>/img/works/w1.jpg" id='mw1'></article><!--
		--><article><img src="<?php bloginfo('template_directory'); ?>/img/works/w2.jpg" id='mw2'></article><!--
		--><article id='a2'>
			<h2 class='bold darkyellow'>Honda Civic</h2>
			<p class='medium white'><br>Свап с d15b на B16Avtec<br>
			Розовое подкапотное - выбор хозяина<br>
			Свап на H22A
			</p>
		</article><!--
 -->

		<div class='white roman' id='moreworks'>Смотреть больше работ</div>
	</section>

	        <?php do_shortcode('[price]');?>
    <section id = 's25'>
        <?php do_shortcode('[product]');?>
    </section>
	<section id='s4'>
		 	<center><script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=sdyns3AOOFVDt8T1fkHK9Y7GpPwyZV3T&width=1200&height=450"></script></center>
		 	<div id='contacts'>
		 		<p class='yellow'>Москва, 2я Фрезерная дом 3а<br><br>
		 			8 (495) 761-12-90<br>
		 			ICQ: 326790<br><br>
		 			E-mail: boks3@prelude.ru<br>
		 			График работы - ежедневно с 11 до 21</p>
		 	</div>
	</section>
	<footer>
 			<img id='shade' src="<?php bloginfo('template_directory'); ?>/img/shade.png">
		 	<center><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"></center>
	</footer>
	<div id='bgpopup'><div id='popup'>
		<form method="POST" id="feedback-form" role="form">
			<div class="form-group">
				<input id="inputname" class="form-control white" type="text" name="nameF" required placeholder="Ваше имя" x-autocompletetype="name">
			</div>
			<div class="form-group">
				<input id="inputmail" class="form-control white" type="email" name="contactF" required placeholder="Ваш E-mail" x-autocompletetype="email">
			</div>
			<div class="form-group">
				<textarea id="inputtext" class="form-control white" type="text" name="textF" required placeholder="Введите сообщение" x-autocompletetype="text"></textarea>
			</div>
			<div class="form-group">
				<button id="sentReq" type="submit" class='white'>НАПИСАТЬ НАМ</button>
			</div>
		</form>
	</div></div>
<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>