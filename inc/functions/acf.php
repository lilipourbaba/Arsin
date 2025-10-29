<?php

define('MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/');
include_once (MY_ACF_PATH . 'acf.php');

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
	register_guide_page();
	register_size_guide();
	register_single_product();
}

 

function  register_acf_homepage_settings()
{
	$fields = [
		acf_add_tab(' بنر ها'),
		acf_add_image('home_hero', 'بنر'),
		acf_add_image('home_hero_mobile', ' بنر موبایل'),
		acf_add_image('home_poster', 'پوستر'),

		acf_add_image('home_poster_mb', 'پوستر موبایل'),
		acf_add_url('poster_customize', 'لینک سفارش سازی پوستر ', '', '30'),
		acf_add_tab(' مینیمال ها '),
		acf_add_image('minimal_img_1', 'مینیمال اول '),
		acf_add_text('minimal_title_1', 'تیتر مینیمال اول ', '', '30'),
		acf_add_text('minimal_text_1', 'متن مینیمال اول '),
	 
		acf_add_tab(' سوالات متداول '),
		acf_add_tab(' ویژگی ها '),
	];
	$array = [];
	for ($i = 1; $i < 15; $i++) {
		array_push(
			$array,
			acf_add_text("attr_$i", 'ویژگی ', '', '30'),


		);
	}
	$fields = array_merge($fields, $array);

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/homepage.php',
			],
		],
	];
	register_acf_group('تنظیمات صفحه اصلی', $fields, $location);
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

function register_guide_page()
{
	$fields = [
		acf_add_tab('تیتر صفحه  '),
		acf_add_text('guide_page_title', 'تیتر صفحه راهنما ', '1', '20'),
		acf_add_text('guide_page_subtitle', 'بالای تیتر صفحه راهنما ', '', '20'),
		acf_add_tab(' سکشن اول '),
		acf_add_text('guide_first_section_title', 'تیتر اول ', '', ' 20'),
		acf_add_text('guide_first_section_text', 'متن بخش اول '),
		acf_add_text('guide_second_section_title', 'تیتر دوم ', '', ' 20'),
		acf_add_text('guide_second_section_text', 'متن بخش دوم '),
		acf_add_tab(' پوستر'),
		acf_add_image('guide_poster', 'پوستر'),
		acf_add_tab(' سکشن دوم '),
		acf_add_text('guide_third_section_title', 'تیتر بخش اول ', '', ' 20'),
		acf_add_text('guide_third_section_text', 'متن بخش اول '),
		acf_add_text('guide_third_section_text_2', 'متن بخش اول - قسمت دوم '),
		acf_add_text('guide_fourth_section_title', 'تیتر بخش دوم ', '', ' 20'),
		acf_add_text('guide_fourth_section_subtitle', 'پایین تیتر بخش دوم ', '', '20'),
		acf_add_text('guide_fourth_section_text', 'متن بخش دوم '),
		acf_add_tab(' پوستر'),
		acf_add_image('second_guide_poster', 'پوستر'),
		acf_add_text('second_guide_poster_subtitle', 'کپشن ', '', '30'),
	];

	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/guide.php',
			],
		],
	];
	register_acf_group('تنظیمات صفحه راهنما', $fields, $location);
}

function register_size_guide()
{
	$fields = [
		acf_add_tab(' تیتر جداول'),

		acf_add_text("measure_table_title", 'تیتر ستون اول   ', '', ' 50'),
		acf_add_text('size_table_title', 'تیتر ستون دوم   ', '', ' 50'),
		acf_add_text("measure_table_title2", 'تیتر ستون اول   ', '', '50'),
		acf_add_text('size_table_title2', 'تیتر ستون دوم   ', '', ' 50'),
		acf_add_text("measure_table_title3", 'تیتر ستون سوم   ', '', '50'),
		acf_add_text('size_table_title3', 'تیتر ستون سوم   ', '', ' 50'),
	];
	$arr = [];
	for ($i = 0; $i < 14; $i++) {
		array_push(
			$arr,
			acf_add_group("size_guide_table_$i", ' ', [
				acf_add_text("measure_$i", 'اندازه به میلیمتر', '', '30'),
				acf_add_text("measure_cm_$i", 'اندازه به سانتیمتر', '', '30'),
				acf_add_number("size_$i", 'سایز', '', '30'),

			]),
		);
	}
	$fields = array_merge($fields, $arr);
	$location = [
		[
			[
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'templates/guide.php',
			],
		],
	];
	register_acf_group('   راهنمای انتخاب سایز ', $fields, $location);
}




function register_single_product()
{

	$fields = [
	 
 		acf_add_text('rug-sku', 'SKU', '', '50'),
 		acf_add_text('rug-size', 'Size', '', '50'),
 		acf_add_text('rug-price', 'price', '', '50'),

 
	];
	// $array = [];
	// for ($i = 0; $i < 6; $i++) {
	// 	array_push(
	// 		$array,
	// 		acf_add_text("tablename_$i", 'دسته بندی سنگ ها', '', '30'),
	// 		acf_add_text("name_$i", 'نام', '', '30'),
	// 		acf_add_number("numbers_$i", 'تعداد', '', '20'),
	// 		acf_add_number("weight_$i", 'مجموع وزن(قیراط)', '', '20'),
	// 	);
	// }
	// $fields = array_merge($fields, $array);
	$location = [
		[
			[
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'rug',
			],
		],
	];
	register_acf_group(' تنظیمات محصول', $fields, $location);
}