<!DOCTYPE HTML>
<html>
	<head>
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<title>API Wordpress dengan PHP</title>
	</head>
	<body>
		<div>
			<?php
			$url = 'https://www.pudin.my.id/wp-json/wp/v2/posts';
			$contents = file_get_contents($url);
			$contents = utf8_encode($contents);
			$reults = json_decode($contents, true);
			$no = 0;
			foreach ($reults as $result){
				$no++;
				echo '<h1>'.$no.'. <a href="'.$result['link'].'" target="_blank">'.$result['title']['rendered'].'</a></h1>';
				//echo '<content>'.$result['content']['rendered'].'</content>';
				echo '<content>'.$result['excerpt']['rendered'].'</content>';
			}
			?>
		</div>
	</body>
</html>
