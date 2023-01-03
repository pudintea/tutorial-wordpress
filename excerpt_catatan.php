<?
/*
* Pudin Saepudin
* https://www.pdn.my.id
* https://t.me/pudin_ira
* https://instagram.com/pudin.ira
*/
echo '<p class="excerpt">'.get_the_excerpt().'</p>'; // custom tag <p>

the_excerpt(); // otomatis akan ada tag <p> sebagai pembuka dan penutup.


// Excerpt function

function new_excerpt_length($length) {
	return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');
	 
	// Changing excerpt more
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

