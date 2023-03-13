<?php
/**
 * Product
 *
 * Create a Product in WPBakery
 *
 * @since      Class available since Release 1.0.0
 * @category   Wordpress
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! class_exists( 'VcZShProduct' ) ) {

	class VcZShProduct extends WPBakeryShortCode {

		function __construct() {
			add_action( 'init', [ $this, 'create_shortcode' ], 999 );
			add_shortcode( 'vc_zsh_Product', [ $this, 'render_shortcode' ] );
		}

		public function create_shortcode() {
			// Stop all if VC is not enabled
			if ( ! defined( 'WPB_VC_VERSION' ) ) {
				return;
			}

			// Map Product with vc_map()
			vc_map( [
				'name'        => __( 'Product', 'shyvarbidze' ),
				'base'        => 'vc_zsh_Product',
				'description' => __( '', 'shyvarbidze' ),
				'category'    => __( 'Shyvarbidze Pro', 'shyvarbidze' ),
				'params'      => [

					[
						'type'        => 'attach_image',
						'holder'      => 'div',
						'heading'     => __( 'Изображение', 'shyvarbidze' ),
						'param_name'  => 'product_image',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте изображение товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'holder'      => 'div',
						'heading'     => __( 'Заголовок', 'shyvarbidze' ),
						'param_name'  => 'product_title',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте заголовок товара', 'shyvarbidze' ),
					],

//					[
//						'type'        => 'textfield',
//						'holder'      => 'div',
//						'heading'     => __( 'Лейба товара', 'shyvarbidze' ),
//						'param_name'  => 'product_label',
//						'value'       => __( '', 'shyvarbidze' ),
//						'description' => __( 'Добавьте заголовок товара', 'shyvarbidze' ),
//					],

					[
						"type"        => "textarea_html",
						"holder"      => "div",
						"class"       => "",
						"heading"     => __( "Описание товара", 'shyvarbidze' ),
						"param_name"  => "content",
						// Important: Only one textarea_html param per content element allowed and it should have "content" as a "param_name"
						"value"       => __( "<p>lorem</p>", 'shyvarbidze' ),
						"description" => __( "Введите текст", 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'holder'      => 'div',
						'heading'     => __( 'Форма товара', 'shyvarbidze' ),
						'param_name'  => 'product_form',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте форму товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'holder'      => 'div',
						'heading'     => __( 'Ширина товара', 'shyvarbidze' ),
						'param_name'  => 'product_weight',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте ширину товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'holder'      => 'div',
						'heading'     => __( 'Высота товара', 'shyvarbidze' ),
						'param_name'  => 'product_height',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте ширину товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'holder'      => 'div',
						'heading'     => __( 'Каркас', 'shyvarbidze' ),
						'param_name'  => 'product_karkas',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Добавьте каркас товара', 'shyvarbidze' ),
					],

//					[
//						'type'        => 'textarea',
//						'holder'      => 'div',
//						'heading'     => __( 'Производитель', 'shyvarbidze' ),
//						'param_name'  => 'product_manufacturer',
//						'value'       => __( '', 'shyvarbidze' ),
//						'description' => __( 'Добавьте производителя товара', 'shyvarbidze' ),
//					],

//					[
//						'type'        => 'textarea',
//						'holder'      => 'div',
//						'heading'     => __( 'Место нахождения', 'shyvarbidze' ),
//						'param_name'  => 'product_place',
//						'value'       => __( '', 'shyvarbidze' ),
//						'description' => __( 'Добавьте место нахождения', 'shyvarbidze' ),
//					],

//					[
//						'type'        => 'textfield',
//						'holder'      => 'div',
//						'heading'     => __( 'Гарантийный срок', 'shyvarbidze' ),
//						'param_name'  => 'product_varanty',
//						'value'       => __( '', 'shyvarbidze' ),
//						'description' => __( 'Добавьте гарантийный срок товара', 'shyvarbidze' ),
//					],

					[
						'type'        => 'param_group',
						'value'       => '',
						'heading'     => esc_html__( 'Длина', 'elem' ),
						'param_name'  => 'product_length_list',
						'params'      => [
							[
								'type'       => 'textfield',
								'value'      => '',
								'heading'    => esc_html__( 'Размер', 'elem' ),
								'param_name' => 'size',
							],
						],
						'description' => __( 'Добавьте список длин товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'param_group',
						'value'       => '',
						'heading'     => esc_html__( 'Шаг', 'elem' ),
						'param_name'  => 'product_step_list',
						'params'      => [
							[
								'type'       => 'textfield',
								'value'      => '',
								'heading'    => esc_html__( 'Размер', 'elem' ),
								'param_name' => 'size',
							],
						],
						'description' => __( 'Добавьте список шагов товара', 'shyvarbidze' ),
					],

					[
						'type'        => 'param_group',
						'value'       => '',
						'heading'     => esc_html__( 'Поликарбонат', 'elem' ),
						'param_name'  => 'product_material_list',
						'params'      => [
							[
								'type'       => 'textfield',
								'value'      => '',
								'heading'    => esc_html__( 'Тип', 'elem' ),
								'param_name' => 'size',
							],
						],
						'description' => __( 'Добавьте типы поликарбоната', 'shyvarbidze' ),
					],


					// Price
					// 2
					[
						'type'        => 'textfield',
						'heading'     => __( '2*3', 'shyvarbidze' ),
						'param_name'  => 'size_2_3',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 2м, Тепличный 3мм' ),
						'group'       => 'Цена материала',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '2*4', 'shyvarbidze' ),
						'param_name'  => 'size_2_4',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 2м, Усиленный 4мм' ),
						'group'       => 'Цена материала',
					],
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '2*1', 'shyvarbidze' ),
//						'param_name'  => 'size_2_1',
//						'admin_label' => false,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 2м, Шаг 1м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '2*0.67', 'shyvarbidze' ),
//						'param_name'  => 'size_2_067',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 2м, Шаг 0.67м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '2*0.5', 'shyvarbidze' ),
//						'param_name'  => 'size_2_05',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 2м, Шаг 0.5м' ),
//						'group'       => 'Цена',
//					],


					// 4
					[
						'type'        => 'textfield',
						'heading'     => __( '4*3', 'shyvarbidze' ),
						'param_name'  => 'size_4_3',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 4м, Тепличный 3мм' ),
						'group'       => 'Цена материала',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '4*4', 'shyvarbidze' ),
						'param_name'  => 'size_4_4',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 4м, Усиленный 4мм' ),
						'group'       => 'Цена материала',
					],

//					[
//						'type'        => 'textfield',
//						'heading'     => __( '4*1', 'shyvarbidze' ),
//						'param_name'  => 'size_4_1',
//						'admin_label' => false,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 4м, Шаг 1м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '4*0.67', 'shyvarbidze' ),
//						'param_name'  => 'size_4_067',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 4м, Шаг 0.67м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '4*0.5', 'shyvarbidze' ),
//						'param_name'  => 'size_4_05',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 4м, Шаг 0.5м' ),
//						'group'       => 'Цена',
//					],


					// 6
					[
						'type'        => 'textfield',
						'heading'     => __( '6*3', 'shyvarbidze' ),
						'param_name'  => 'size_6_3',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 6м, Тепличный 3мм' ),
						'group'       => 'Цена материала',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '6*4', 'shyvarbidze' ),
						'param_name'  => 'size_6_4',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 6м, Усиленный 4мм' ),
						'group'       => 'Цена материала',
					],

//					[
//						'type'        => 'textfield',
//						'heading'     => __( '6*1', 'shyvarbidze' ),
//						'param_name'  => 'size_6_1',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 6м, Шаг 1м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '6*0.67', 'shyvarbidze' ),
//						'param_name'  => 'size_6_067',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 6м, Шаг 0.67м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '6*0.5', 'shyvarbidze' ),
//						'param_name'  => 'size_6_05',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 6м, Шаг 0.5м' ),
//						'group'       => 'Цена',
//					],

					// 8
					[
						'type'        => 'textfield',
						'heading'     => __( '8*3', 'shyvarbidze' ),
						'param_name'  => 'size_8_3',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 8м, Тепличный 3мм' ),
						'group'       => 'Цена материала',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '8*4', 'shyvarbidze' ),
						'param_name'  => 'size_8_4',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 8м, Усиленный 4мм' ),
						'group'       => 'Цена материала',
					],

//					[
//						'type'        => 'textfield',
//						'heading'     => __( '8*1', 'shyvarbidze' ),
//						'param_name'  => 'size_8_1',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 8м, Шаг 1м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '8*0.67', 'shyvarbidze' ),
//						'param_name'  => 'size_8_067',
//						'admin_label' => true,
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 8м, Шаг 0.67м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '8*0.5', 'shyvarbidze' ),
//						'param_name'  => 'size_8_05',
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 8м, Шаг 0.5м' ),
//						'group'       => 'Цена',
//					],

					// 10
					[
						'type'        => 'textfield',
						'heading'     => __( '10*3', 'shyvarbidze' ),
						'param_name'  => 'size_10_3',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 10м, Тепличный 3мм' ),
						'group'       => 'Цена материала',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '10*4', 'shyvarbidze' ),
						'param_name'  => 'size_10_4',
						'admin_label' => false,
						'std'         => '', // Your default value
						'description' => __( 'Длина 10м, Усиленный 4мм' ),
						'group'       => 'Цена материала',
					],

//					[
//						'type'        => 'textfield',
//						'heading'     => __( '10*1', 'shyvarbidze' ),
//						'param_name'  => 'size_10_1',
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 10м, Шаг 1м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '10*0.67', 'shyvarbidze' ),
//						'param_name'  => 'size_10_067',
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 10м, Шаг 0.67м' ),
//						'group'       => 'Цена',
//					],
//
//					[
//						'type'        => 'textfield',
//						'heading'     => __( '10*0.5', 'shyvarbidze' ),
//						'param_name'  => 'size_10_05',
//						'std'         => '', // Your default value
//						'description' => __( 'Длина 10м, Шаг 0.5м' ),
//						'group'       => 'Цена',
//					],


					// Таб Цена
					//2
					[
						'type'        => 'textfield',
						'heading'     => __( '2*1', 'shyvarbidze' ),
						'param_name'  => 'step_size_2_1',
						'std'         => '', // Your default value
						'description' => __( 'Длина 2м, Шаг 1м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '2*0.67', 'shyvarbidze' ),
						'param_name'  => 'step_size_2_067',
						'std'         => '', // Your default value
						'description' => __( 'Длина 2м, Шаг 0.67м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '2*0.5', 'shyvarbidze' ),
						'param_name'  => 'step_size_2_05',
						'std'         => '', // Your default value
						'description' => __( 'Длина 2м, Шаг 0.5м' ),
						'group'       => 'Цена шага',
					],
					//4
					[
						'type'        => 'textfield',
						'heading'     => __( '4*1', 'shyvarbidze' ),
						'param_name'  => 'step_size_4_1',
						'std'         => '', // Your default value
						'description' => __( 'Длина 4м, Шаг 1м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '4*0.67', 'shyvarbidze' ),
						'param_name'  => 'step_size_4_067',
						'std'         => '', // Your default value
						'description' => __( 'Длина 4м, Шаг 0.67м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '4*0.5', 'shyvarbidze' ),
						'param_name'  => 'step_size_4_05',
						'std'         => '', // Your default value
						'description' => __( 'Длина 4м, Шаг 0.5м' ),
						'group'       => 'Цена шага',
					],
					//6
					[
						'type'        => 'textfield',
						'heading'     => __( '6*1', 'shyvarbidze' ),
						'param_name'  => 'step_size_6_1',
						'std'         => '', // Your default value
						'description' => __( 'Длина 6м, Шаг 1м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '6*0.67', 'shyvarbidze' ),
						'param_name'  => 'step_size_6_067',
						'std'         => '', // Your default value
						'description' => __( 'Длина 6м, Шаг 0.67м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '6*0.5', 'shyvarbidze' ),
						'param_name'  => 'step_size_6_05',
						'std'         => '', // Your default value
						'description' => __( 'Длина 6м, Шаг 0.5м' ),
						'group'       => 'Цена шага',
					],
					//8
					[
						'type'        => 'textfield',
						'heading'     => __( '8*1', 'shyvarbidze' ),
						'param_name'  => 'step_size_8_1',
						'std'         => '', // Your default value
						'description' => __( 'Длина 8м, Шаг 1м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '8*0.67', 'shyvarbidze' ),
						'param_name'  => 'step_size_8_067',
						'std'         => '', // Your default value
						'description' => __( 'Длина 8м, Шаг 0.67м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '8*0.5', 'shyvarbidze' ),
						'param_name'  => 'step_size_8_05',
						'std'         => '', // Your default value
						'description' => __( 'Длина 8м, Шаг 0.5м' ),
						'group'       => 'Цена шага',
					],
					// 10
					[
						'type'        => 'textfield',
						'heading'     => __( '10*1', 'shyvarbidze' ),
						'param_name'  => 'step_size_10_1',
						'std'         => '', // Your default value
						'description' => __( 'Длина 10м, Шаг 1м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '10*0.67', 'shyvarbidze' ),
						'param_name'  => 'step_size_10_067',
						'std'         => '', // Your default value
						'description' => __( 'Длина 10м, Шаг 0.67м' ),
						'group'       => 'Цена шага',
					],
					[
						'type'        => 'textfield',
						'heading'     => __( '10*0.5', 'shyvarbidze' ),
						'param_name'  => 'step_size_10_05',
						'std'         => '', // Your default value
						'description' => __( 'Длина 10м, Шаг 0.5м' ),
						'group'       => 'Цена шага',
					],


					// class & id
					[
						'type'        => 'textfield',
						'heading'     => __( 'Element ID', 'shyvarbidze' ),
						'param_name'  => 'element_id',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Enter element ID (Note: make sure it is unique and valid).', 'shyvarbidze' ),
						'group'       => __( 'Extra', 'shyvarbidze' ),
					],

					[
						'type'        => 'textfield',
						'heading'     => __( 'Extra class name', 'shyvarbidze' ),
						'param_name'  => 'extra_class',
						'value'       => __( '', 'shyvarbidze' ),
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'shyvarbidze' ),
						'group'       => __( 'Extra', 'shyvarbidze' ),
					],

					[
						'type'        => 'checkbox',
						'param_name'  => 'label',
						'value'       => [ ' "Рассрочек временно нет" - видимость' => true ],
						'admin_label' => false,
						'weight'      => 0,
					],

				],
			] );

		}

		public function render_shortcode( $atts, $content, $tag ) {
			$atts = ( shortcode_atts( [
				'product_title'         => '',
//				'product_label'        => '',
				'product_image'         => '',
				'product_form'          => '',
				'product_weight'        => '',
				'product_height'        => '',
				'product_karkas'        => '',
//				'product_manufacturer' => '',
//				'product_place'        => '',
//				'product_varanty'      => '',
				'product_price'         => '',
				'product_length_list'   => '',
				'product_step_list'     => '',
				'product_material_list' => '',
				'size_2_3'              => '',
				'size_2_4'              => '',
				'size_4_3'              => '',
				'size_4_4'              => '',
				'size_6_3'              => '',
				'size_6_4'              => '',
				'size_8_3'              => '',
				'size_8_4'              => '',
				'size_10_3'             => '',
				'size_10_4'             => '',


				'step_size_2_1'   => '',
				'step_size_2_067' => '',
				'step_size_2_05'  => '',

				'step_size_4_1'   => '',
				'step_size_4_067' => '',
				'step_size_4_05'  => '',

				'step_size_6_1'   => '',
				'step_size_6_067' => '',
				'step_size_6_05'  => '',

				'step_size_8_1'   => '',
				'step_size_8_067' => '',
				'step_size_8_05'  => '',

				'step_size_10_1'   => '',
				'step_size_10_067' => '',
				'step_size_10_05'  => '',


//				'size_2_1'    => '',
//				'size_2_067'  => '',
//				'size_2_05'   => '',
//				'size_4_1'    => '',
//				'size_4_067'  => '',
//				'size_4_05'   => '',
//				'size_6_1'    => '',
//				'size_6_067'  => '',
//				'size_6_05'   => '',
//				'size_8_1'    => '',
//				'size_8_067'  => '',
//				'size_8_05'   => '',
//				'size_10_1'   => '',
//				'size_10_067' => '',
//				'size_10_05'  => '',

				'label' => '',

				'extra_class' => '',
				'element_id'  => '',
			], $atts ) );


			//Content
			$content       = wpb_js_remove_wpautop( $content, true );
			$product_title = esc_html( $atts['product_title'] );
			$product_image = esc_html( $atts['product_image'] );
//			$product_label        = esc_html( $atts['product_label'] );
			$product_form   = esc_html( $atts['product_form'] );
			$product_weight = esc_html( $atts['product_weight'] );
			$product_height = esc_html( $atts['product_height'] );
			$product_karkas = esc_html( $atts['product_karkas'] );
//			$product_manufacturer = esc_html( $atts['product_manufacturer'] );
//			$product_place       = esc_html( $atts['product_place'] );
//			$product_varanty     = esc_html( $atts['product_varanty'] );
			$product_length_list   = vc_param_group_parse_atts( $atts['product_length_list'] );
			$product_step_list     = vc_param_group_parse_atts( $atts['product_step_list'] );
			$product_material_list = vc_param_group_parse_atts( $atts['product_material_list'] );


			$size_2_3  = esc_html( $atts['size_2_3'] );
			$size_2_4  = esc_html( $atts['size_2_4'] );
			$size_4_3  = esc_html( $atts['size_4_3'] );
			$size_4_4  = esc_html( $atts['size_4_4'] );
			$size_6_3  = esc_html( $atts['size_6_3'] );
			$size_6_4  = esc_html( $atts['size_6_4'] );
			$size_8_3  = esc_html( $atts['size_8_3'] );
			$size_8_4  = esc_html( $atts['size_8_4'] );
			$size_10_3 = esc_html( $atts['size_10_3'] );
			$size_10_4 = esc_html( $atts['size_10_4'] );


			$step_size_2_1    = esc_html( $atts['step_size_2_1'] );
			$step_size_2_067  = esc_html( $atts['step_size_2_067'] );
			$step_size_2_05   = esc_html( $atts['step_size_2_05'] );
			$step_size_4_1    = esc_html( $atts['step_size_4_1'] );
			$step_size_4_067  = esc_html( $atts['step_size_4_067'] );
			$step_size_4_05   = esc_html( $atts['step_size_4_05'] );
			$step_size_6_1    = esc_html( $atts['step_size_6_1'] );
			$step_size_6_067  = esc_html( $atts['step_size_6_067'] );
			$step_size_6_05   = esc_html( $atts['step_size_6_05'] );
			$step_size_8_1    = esc_html( $atts['step_size_8_1'] );
			$step_size_8_067  = esc_html( $atts['step_size_8_067'] );
			$step_size_8_05   = esc_html( $atts['step_size_8_05'] );
			$step_size_10_1   = esc_html( $atts['step_size_10_1'] );
			$step_size_10_067 = esc_html( $atts['step_size_10_067'] );
			$step_size_10_05  = esc_html( $atts['step_size_10_05'] );

//			$size_2_1   = esc_html( $atts['size_2_1'] );
//			$size_2_067 = esc_html( $atts['size_2_067'] );
//			$size_2_05  = esc_html( $atts['size_2_05'] );
//
//			$size_4_1   = esc_html( $atts['size_4_1'] );
//			$size_4_067 = esc_html( $atts['size_4_067'] );
//			$size_4_05  = esc_html( $atts['size_4_05'] );
//
//			$size_6_1   = esc_html( $atts['size_6_1'] );
//			$size_6_067 = esc_html( $atts['size_6_067'] );
//			$size_6_05  = esc_html( $atts['size_6_05'] );
//
//			$size_8_1   = esc_html( $atts['size_8_1'] );
//			$size_8_067 = esc_html( $atts['size_8_067'] );
//			$size_8_05  = esc_html( $atts['size_8_05'] );
//
//			$size_10_1   = esc_html( $atts['size_10_1'] );
//			$size_10_067 = esc_html( $atts['size_10_067'] );
//			$size_10_05  = esc_html( $atts['size_10_05'] );

			//Class and Id
			$extra_class = esc_attr( $atts['extra_class'] );
			$element_id  = esc_attr( $atts['element_id'] );

			// Label
			$label = esc_attr( $atts['label'] );

			// Image
			$img = wp_get_attachment_image( $product_image, 'full' );


			// Rand
			$str    = rand( 1, 1000 );
			$result = md5( $str );


			// OutPut
			ob_start(); ?>

			<div class="card-item" id="product-<?php echo $result; ?>">
				<div class="catalog__card">
					<div class="catalog__card__img catalog__card-top"><?php echo $img; ?></div>
					<div class="catalog__card__body card-body">
						<?php if ( $product_title ) { ?>
							<h5 class="card-title"><?php echo $product_title; ?></h5>
						<?php } ?>
						<!--						--><?php //if ( $product_label ) { ?>
						<?php if ( 0 ) { ?>
							<!--							<div class="card-label">--><?php //echo $product_label; ?><!--</div>-->
						<?php } ?>
						<!--						--><?php //if ( $content ) { ?>
						<?php if ( 0 ) { ?>
							<div class="card-text"><?php echo $content; ?></div>
						<?php } ?>

						<div class="card-info">
							<div class="card-info-characteristics">
								<div class="card-info-characteristics-item">
						<span class="card-info-characteristics-item-icon">
							<svg class="svg-inline--fa fa-igloo fa-w-18" aria-hidden="true"
								 focusable="false" data-prefix="fas" data-icon="igloo" role="img"
								 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
								 data-fa-i2svg=""><path fill="currentColor"
														d="M320 33.9c-10.5-1.2-21.2-1.9-32-1.9-99.8 0-187.8 50.8-239.4 128H320V33.9zM96 192H30.3C11.1 230.6 0 274 0 320h96V192zM352 39.4V160h175.4C487.2 99.9 424.8 55.9 352 39.4zM480 320h96c0-46-11.1-89.4-30.3-128H480v128zm-64 64v96h128c17.7 0 32-14.3 32-32v-96H411.5c2.6 10.3 4.5 20.9 4.5 32zm32-192H128v128h49.8c22.2-38.1 63-64 110.2-64s88 25.9 110.2 64H448V192zM0 448c0 17.7 14.3 32 32 32h128v-96c0-11.1 1.9-21.7 4.5-32H0v96zm288-160c-53 0-96 43-96 96v96h192v-96c0-53-43-96-96-96z"></path></svg>
							<?php if ( $product_form ) { ?>
								<span>Форма: <?php echo $product_form; ?></span>
							<?php } ?>
								</div>
								<div class="card-info-characteristics-item">
							<span class="card-info-characteristics-item-icon">
								<svg class="svg-inline--fa fa-arrows-alt-h fa-w-16" aria-hidden="true"
									 focusable="false" data-prefix="fas" data-icon="arrows-alt-h"
									 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
									 data-fa-i2svg=""><path fill="currentColor"
															d="M377.941 169.941V216H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.568 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296h243.882v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.568 0-33.941l-86.059-86.059c-15.119-15.12-40.971-4.412-40.971 16.97z"></path></svg>
							</span>
									<?php if ( $product_form ) { ?>
										<span>Ширина: <?php echo $product_weight; ?>м</span>
									<?php } ?>
								</div>
								<div class="card-info-characteristics-item">
							<span class="card-info-characteristics-item-icon">
								<svg class="svg-inline--fa fa-arrows-alt-v fa-w-8" aria-hidden="true"
									 focusable="false" data-prefix="fas" data-icon="arrows-alt-v"
									 role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"
									 data-fa-i2svg=""><path fill="currentColor"
															d="M214.059 377.941H168V134.059h46.059c21.382 0 32.09-25.851 16.971-40.971L144.971 7.029c-9.373-9.373-24.568-9.373-33.941 0L24.971 93.088c-15.119 15.119-4.411 40.971 16.971 40.971H88v243.882H41.941c-21.382 0-32.09 25.851-16.971 40.971l86.059 86.059c9.373 9.373 24.568 9.373 33.941 0l86.059-86.059c15.12-15.119 4.412-40.971-16.97-40.971z"></path></svg>
							</span>
									<span>Высота: <?php echo $product_height; ?>м</span>
								</div>
							</div>
							<div class="card-info-carcass">
								<?php if ( $product_karkas ) { ?>
									<p>Каркас: <?php echo $product_karkas; ?></p>
								<?php } ?>

								<button type="button" class="all_attributes">Все характеристики</button>

								<div class="catalog__card__price">
									<?php if ( $size_2_3 ) { ?>
										<span class="calculator-price" id="size_2_3"><?php echo $size_2_3; ?></span>
									<?php } ?>
									<?php if ( $size_2_4 ) { ?>
										<span class="calculator-price" id="size_2_4"><?php echo $size_2_4; ?></span>
									<?php } ?>
									<?php if ( $size_4_3 ) { ?>
										<span class="calculator-price" id="size_4_3"><?php echo $size_4_3; ?></span>
									<?php } ?>
									<?php if ( $size_4_4 ) { ?>
										<span class="calculator-price" id="size_4_4"><?php echo $size_4_4; ?></span>
									<?php } ?>
									<?php if ( $size_6_3 ) { ?>
										<span class="calculator-price" id="size_6_3"><?php echo $size_6_3; ?></span>
									<?php } ?>
									<?php if ( $size_6_4 ) { ?>
										<span class="calculator-price" id="size_6_4"><?php echo $size_6_4; ?></span>
									<?php } ?>
									<?php if ( $size_8_3 ) { ?>
										<span class="calculator-price" id="size_8_3"><?php echo $size_8_3; ?></span>
									<?php } ?>
									<?php if ( $size_8_4 ) { ?>
										<span class="calculator-price" id="size_8_4"><?php echo $size_8_4; ?></span>
									<?php } ?>
									<?php if ( $size_10_3 ) { ?>
										<span class="calculator-price" id="size_10_3"><?php echo $size_10_3; ?></span>
									<?php } ?>
									<?php if ( $size_10_4 ) { ?>
										<span class="calculator-price" id="size_10_4"><?php echo $size_10_4; ?></span>
									<?php } ?>



									<?php if ( $step_size_2_1 ) { ?>
										<span class="calculator-price"
											  id="step_size_2_1"><?php echo $step_size_2_1; ?></span>
									<?php } ?>
									<?php if ( $step_size_2_067 ) { ?>
										<span class="calculator-price"
											  id="step_size_2_067"><?php echo $step_size_2_067; ?></span>
									<?php } ?>
									<?php if ( $step_size_2_05 ) { ?>
										<span class="calculator-price"
											  id="step_size_2_5"><?php echo $step_size_2_05; ?></span>
									<?php } ?>


									<?php if ( $step_size_4_1 ) { ?>
										<span class="calculator-price"
											  id="step_size_4_1"><?php echo $step_size_4_1; ?></span>
									<?php } ?>
									<?php if ( $step_size_4_067 ) { ?>
										<span class="calculator-price"
											  id="step_size_4_067"><?php echo $step_size_4_067; ?></span>
									<?php } ?>
									<?php if ( $step_size_4_05 ) { ?>
										<span class="calculator-price"
											  id="step_size_4_5"><?php echo $step_size_4_05; ?></span>
									<?php } ?>


									<?php if ( $step_size_6_1 ) { ?>
										<span class="calculator-price"
											  id="step_size_6_1"><?php echo $step_size_6_1; ?></span>
									<?php } ?>
									<?php if ( $step_size_6_067 ) { ?>
										<span class="calculator-price"
											  id="step_size_6_067"><?php echo $step_size_6_067; ?></span>
									<?php } ?>
									<?php if ( $step_size_6_05 ) { ?>
										<span class="calculator-price"
											  id="step_size_6_5"><?php echo $step_size_6_05; ?></span>
									<?php } ?>


									<?php if ( $step_size_8_1 ) { ?>
										<span class="calculator-price"
											  id="step_size_8_1"><?php echo $step_size_8_1; ?></span>
									<?php } ?>
									<?php if ( $step_size_8_067 ) { ?>
										<span class="calculator-price"
											  id="step_size_8_067"><?php echo $step_size_8_067; ?></span>
									<?php } ?>
									<?php if ( $step_size_8_05 ) { ?>
										<span class="calculator-price"
											  id="step_size_8_5"><?php echo $step_size_8_05; ?></span>
									<?php } ?>


									<?php if ( $step_size_10_1 ) { ?>
										<span class="calculator-price"
											  id="step_size_10_1"><?php echo $step_size_10_1; ?></span>
									<?php } ?>
									<?php if ( $step_size_10_067 ) { ?>
										<span class="calculator-price"
											  id="step_size_10_067"><?php echo $step_size_10_067; ?></span>
									<?php } ?>
									<?php if ( $step_size_10_05 ) { ?>
										<span class="calculator-price"
											  id="step_size_10_5"><?php echo $step_size_10_05; ?></span>
									<?php } ?>


									<?php if ( 0 ) { ?>
										<!--										--><?php //if ( $size_2_1 ) { ?>
										<!--											<span class="calculator-price" id="size_2_1">--><?php //echo $size_2_1; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_2_067 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_2_067">--><?php //echo $size_2_067; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_2_05 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_2_05">--><?php //echo $size_2_05; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!---->
										<!--										--><?php //if ( $size_4_1 ) { ?>
										<!--											<span class="calculator-price" id="size_4_1">--><?php //echo $size_4_1; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_4_067 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_4_067">--><?php //echo $size_4_067; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_4_05 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_4_05">--><?php //echo $size_4_05; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!---->
										<!--										--><?php //if ( $size_6_1 ) { ?>
										<!--											<span class="calculator-price" id="size_6_1">--><?php //echo $size_6_1; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_6_067 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_6_067">--><?php //echo $size_6_067; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_6_05 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_6_05">--><?php //echo $size_6_05; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!---->
										<!--										--><?php //if ( $size_8_1 ) { ?>
										<!--											<span class="calculator-price" id="size_8_1">--><?php //echo $size_8_1; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_8_067 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_8_067">--><?php //echo $size_8_067; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_8_05 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_8_05">--><?php //echo $size_8_05; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!---->
										<!--										--><?php //if ( $size_10_1 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_10_1">--><?php //echo $size_10_1; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_10_067 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_10_067">--><?php //echo $size_10_067; ?><!--</span>-->
										<!--										--><?php //} ?>
										<!--										--><?php //if ( $size_10_05 ) { ?>
										<!--											<span class="calculator-price"-->
										<!--												  id="size_10_05">--><?php //echo $size_10_05; ?><!--</span>-->
										<!--										--><?php //} ?>
									<?php } ?>
									руб.
								</div>

								<p>
									<!--									--><?php //if ( $product_manufacturer ) { ?>
									<?php if ( 0 ) { ?>
										<!--										Производитель: --><?php //echo $product_manufacturer; ?><!--<br>-->
									<?php } ?>

									<!--									--><?php //if ( $product_place ) { ?>
									<?php if ( 0 ) { ?>
										<!--										место нахождения: --><?php //echo $product_place; ?><!--<br>-->
									<?php } ?>

									<!--									--><?php //if ( $product_varanty ) { ?>
									<?php if ( 0 ) { ?>
										<!--										Гарантийный срок: --><?php //echo $product_varanty; ?>
									<?php } ?>
								</p>
							</div>
						</div>

						<?php if ( $product_length_list ) { ?>
							<div class="catalog__parameter-name">
								<strong>Длина:</strong>
							</div>
							<div class="catalog__parameter catalog__parameter--length">

								<?php foreach ( $product_length_list as $i => $item ) { ?>
									<label class="catalog__input">
										<input type="radio" name="length<?php echo $result; ?>"
											   value="<?php echo $item['size']; ?>" <?php if ( $i == 0 ) {
											echo 'checked="checked"';
										} ?>>
										<div class="catalog__input__label">
											<span><?php echo $item['size']; ?>м</span>
										</div>
									</label>
								<?php } ?>

							</div>
						<?php } ?>


						<?php $productsList = is_array($product_step_list) ? count($product_step_list) : 0;
						if( $productsList > 1) {
							?>							<div class="catalog__parameter-name">
								<strong>Шаг:</strong>
							</div>
							<div class="catalog__parameter catalog__parameter--step">

								<?php foreach ( $product_step_list as $j => $item ) { ?>
									<label class="catalog__input">
										<input type="radio" name="step<?php echo $result; ?>"
											   value="<?php echo $item['size']; ?>" <?php if ( $j == 0 ) {
											echo 'checked="checked"';
										} ?>>
										<div class="catalog__input__label">
											<span><?php echo $item['size']; ?>м</span>
										</div>
									</label>
								<?php } ?>
							</div>
						<?php } ?>


						<?php $materialsList = is_array($product_material_list) ? count($product_material_list) : 0;
						if( $materialsList > 1) {
						?>
							<div class="catalog__parameter-name">
								<strong>Поликарбонат:</strong>
							</div>
							<div class="catalog__parameter catalog__parameter--material">
								<?php foreach ( $product_material_list as $k => $item ) { ?>
									<label class="catalog__input">
										<input type="radio" name="material<?php echo $result; ?>"
											   value="<?php echo $item['size']; ?>" <?php if ( $k == 0 ) {
											echo 'checked="checked"';
										} ?>>
										<div class="catalog__input__label">
											<span><?php echo $item['size']; ?></span>
										</div>
									</label>
								<?php } ?>
							</div>
						<?php } ?>

						<div class="price-wrapp">
							<div class="catalog__card__bottom">
								<!-- Trigger/Open The Modal -->
								<button class="myBtn" type="button" data-bs-toggle="modal"
										data-bs-target="#saleModal">
									Как купить
								</button>

								<a href="#rassrochka" class="pulse">Рассрочка</a>
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- The Modal -->
			<div id="saleModal" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>

					<div class="modal__title">
						<b>Оставьте заявку и получите гарантированный подарок</b></div>
					<hr>
					<div class="fw-bold fs-3">
						<a href="tel:<?php the_field( "modal_phone_link", "option" ); ?>"
						   class="phone_link"><?php the_field( "modal_phone_text", "option" ) ?></a>
					</div>

					<?php echo do_shortcode( '[contact-form-7 id="323" title="Карточка товара"]' ); ?>
				</div>
			</div>

			<div id="attributesModal" class="modal">

				<!-- Modal content -->
				<div class="modal-content">
					<span class="close">&times;</span>

					<div class="modal__title"><b>Все характеристики</b></div>

					<hr>

					<?php echo $content; ?>

					<a href="#podarok" class="get_present">Получить подарок</a>
				</div>
			</div>

			<?php
			return ob_get_clean();
		}
	}

	new VcZShProduct();

}
