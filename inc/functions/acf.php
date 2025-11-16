<?php

define('MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/');
include_once(MY_ACF_PATH . 'acf.php');

add_filter('acf/settings/url', function ($url) {
	return MY_ACF_URL;
});
add_filter('acf/settings/show_updates', '__return_false', 100);
// add_filter('acf/settings/show_admin', '__return_false');

function register_acf()
{
	if (!function_exists('acf_add_local_field_group')) {
		return;
	}
	register_acf_homepage_settings();
	register_acf_homepage_FAQ();
	register_acf_single_product_cards();
	register_acf_about_us();
	register_acf_contact_us();
 
	register_single_product();
	register_acf_rug_cat();
	register_single_product_Specifications();
	register_single_product_PALET();
	register_collection_product();
	 register_single_product_faq();
}



function  register_acf_homepage_settings()
{
	$fields = [
		acf_add_tab('  head sections'),
		acf_add_text('section1_titr', 'First section title ', '', '15', 'ARSIN'),
		acf_add_text('section1_text', 'First section text ', '', '35','Curated rugs for discerning spaces'),
		acf_add_url('section1_link', 'First section link ', '', '30'),
		acf_add_text('section1_link_txt', 'First section link text ', '', '20', 'Login / Sign up'),

		acf_add_text('section2_titr', 'Second section title ', '', '15', 'Visit Us'),
		acf_add_text('section2_text', 'Second section text ', '', '35',  'Schedule a private consultation By appointment only'),
		acf_add_url('section2_link', 'Second section link ', '', '30'),
		acf_add_text('section2_link_txt', 'Second section link text ', '', '20','Book Appointment'),
		acf_add_text('section3_titr', 'Third section title ', '', '15','Our Story'),
		acf_add_text('section3_text', 'Third section text ', '', '35','Three generations of expertise in Persian and Oriental textiles'),
		acf_add_url('section3_link', 'Third section link ', '', '30'),
		acf_add_text('section3_link_txt', 'Third section link text ', '', '20','Read our story'),

		 
 	];
 
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/front-page.php',
			],
		],
	];
	register_acf_group('home set', $fields, $location);
}
function register_acf_homepage_FAQ()
{
	$fields = [

		acf_add_tab(' سوالات متداول '),
	];
	$FAQ = [];
	for ($i = 0; $i < 6; $i++) {
		array_push(
			$FAQ,
			acf_add_group("FAQ_$i", ' ', [
				acf_add_text("FAQ_ask", '  سوال', '', '30'),
				acf_add_text("FAQ_answer", ' پاسخ', '', '30'),
				acf_add_text("FAQ_link", ' لینک', '', '30'),
				acf_add_text("FAQ_text", ' متن دکمه', '', '30'),

			]),
		);
	}
	$fields = array_merge($fields, $FAQ);

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/homepage.php',
			],
		],
	];
	register_acf_group('سوالات  متداول', $fields, $location);
}


function register_acf_about_us()
{
	$fields = [
		acf_add_tab('بنر صفحه  '),
		acf_add_image('about_hero', 'بنر صفحه درباره ما '),
		acf_add_text('about_title', 'تیتر صفحه درباره ما '),
		acf_add_tab('گالری صفحه درباره ما  '),
		acf_add_image('gallery_pic1', 'عکس گالری اول'),
		acf_add_image('gallery_pic2', 'عکس گالری دوم'),
		acf_add_image('gallery_pic3', 'عکس گالری سوم'),
		acf_add_image('gallery_pic4', 'عکس گالری چهار'),
		acf_add_image('gallery_pic5', 'عکس گالری پنج'),
		acf_add_image('gallery_pic6', 'عکس گالری شش'),
	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/about-us.php',
			],
		],
	];
	register_acf_group('  اطلاعات صفحه درباره ما', $fields, $location);
}
function register_acf_single_product_cards()
{
	$fields = [
		acf_add_text('single_product_parts', 'تیتر کارت محصولات'),
		acf_add_post_object('single_product_part_select', 'انتخاب محصولات کارت ', 'product', '', '1'),
	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/single/product.php',
			],
		],
	];
	register_acf_group(' انتخاب اجزا', $fields, $location);
}
function register_acf_contact_us()
{

	$fields = [
		acf_add_text('contact_us_form_title', 'تیتر فرم تماس با ما '),
		acf_add_google_map('contact_us_map', '  آدرس گوگل مپ'),


	];
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/contact-us.php',
			],
		],
	];
	register_acf_group('   صفحه تماس با ما', $fields, $location);
}
 
function register_single_product()
{
	$fields = [
		acf_add_tab('  rug property'),

		acf_add_text('rug-sku', 'sku', '', '20'),
		acf_add_number('rug-price', 'Price', '', '20', '','1000'),
				acf_add_url('rug-catalog', 'catalog', '', '40'),

		acf_add_number('rug-width', 'Width', '', '20'),
		acf_add_number('rug-height', 'Height', '', '20'),
		acf_add_text('rug-material', 'Material', '', '30'),
		acf_add_text('rug-origin', 'Origin', '', '30'),
		acf_add_text('rug-age', 'Age', '', '30'),
		acf_add_text('rug-condition', 'Condition', '', '100'),
		acf_add_tab('  rug gallery'),
	];
	$array = [];
	for ($i = 0; $i < 12; $i++) {
		array_push(
			$array,
			acf_add_url("img_$i", 'image' . $i, '', '30'),

		);
	}
	$fields = array_merge($fields, $array);
	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'rug',
			],
		],
	];
	register_acf_group('Rug Details', $fields, $location);
}





function register_single_product_PALET()
{
	$fields = [
		
 	];
	$array = [];
	for ($i =1; $i < 9
	; $i++) {
		array_push(
			$array,
					acf_add_tab('rug Pallet '.$i),
					acf_add_color("color$i", 'Color'),
 		acf_add_number("rug-percent-color-$i", 'Color Percent', '', '15'),

		);
	}
	$fields = array_merge($fields, $array);
	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'rug',
			],
		],
	];
	register_acf_group('Rug PALLET', $fields, $location);
}


function register_single_product_Specifications()
{
	$fields = [

		acf_add_tab('Construction'),
		acf_add_text('Technique', 'Technique', '', '33', '', ''),
		acf_add_text('knot-density', 'Knot density', '', '33', '', ''),
		acf_add_text('pile-height', 'Pile height', '', '33', '', ''),
		acf_add_tab('Materials'),
		acf_add_text('foundation', 'Foundation', '', '33', '', ''),
		acf_add_text('pile', 'Pile', '', '33', '', ''),
		acf_add_text('dyes', 'Dyes', '', '33', '', ''),
		acf_add_tab('Dimensions'),
		acf_add_text('Dimensions-Length', 'Technique', '', '33', '', ''),
		acf_add_text('Dimensions-Width', 'Knot density', '', '33', '', ''),
		acf_add_text('Dimensions-Tolerance', 'Pile height', '', '33', '', ''),
		acf_add_tab('Weight & Care'),
		acf_add_text('Care-Weight', 'Technique', '', '33', '', ''),
		acf_add_text('Care-Cleaning', 'Knot density', '', '33', '', ''),
		acf_add_text('Care-Rotation', 'Pile height', '', '33', '', ''),

	];

	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'rug',
			],
		],
	];
	register_acf_group('Rug Specifications', $fields, $location);
}






function register_single_product_faq()
{
	$fields = [
		
 	];
	$array = [];
	for ($i =1; $i < 5; $i++) {
		array_push(
			$array,
					acf_add_tab('faq1 '.$i),
					acf_add_text("question$i", 'FAQ Question '.$i , '', '100'),
					acf_add_text("response-$i", 'FAQ Response'.$i, '', '100'),

		);
	}
	$fields = array_merge($fields, $array);
	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'rug',
			],
		],
	];
	register_acf_group('Rug FAQ', $fields, $location);
}


function register_acf_rug_cat()
{
	$fields = [

 		acf_add_text('about-cat', 'About Rug Cat'),
		acf_add_text('cat-property1', 'Rug Cat property 1', '', '30'),
		acf_add_text('cat-property2', 'Rug Cat property 2', '', '30'),
		acf_add_text('cat-property3', 'Rug Cat property 3', '', '30'),
		acf_add_text('cat-property4', 'Rug Cat property 4', '', '30'),

		acf_add_text('story-cat', 'story of Rug Cat'),

		acf_add_post_object('select-rug', 'select rug', 'rug', '', 1)


	];


	$location = [
		[
					[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/collection.php',
			],
		],
	];
	register_acf_group('rug cat', $fields, $location);
}




function register_collection_product()
{
	$fields = [
		acf_add_tab('  rug property'),
 		acf_add_text('cat-property1', 'Rug Cat property 1', '', '30'),
		acf_add_tab('  rug gallery'),
	];
	$array = [];
	for ($i = 0; $i < 15; $i++) {
		array_push(
			$array,
			acf_add_url("img_col_$i", 'image' . $i, '', '30'),

		);
	}
	$fields = array_merge($fields, $array);
	$location = [
		[
				[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/collection.php',
			],
		],
	];
	register_acf_group('Rug collection Details', $fields, $location);
}

