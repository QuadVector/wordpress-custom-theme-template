<?php

namespace QuadVector\CustomTheme;

final class Theme
{
	/**
	 * Theme initialization
	 */
	public static function init()
	{
		add_action("after_setup_theme", function (): void {
			self::afterSetupTheme();
		});

		add_action("init", static function (): void {
			self::enqueueAssets();
		});

		add_action("acf/init", static function (): void {
			self::initOptionsPage();
		});

		add_filter("get_the_archive_title", function ($title) {
			return self::processArchiveTitle($title);
		});
	}

	/**
	 * Remove archive title prefix
	 * @param mixed $title
	 * @return string
	 */
	private static function processArchiveTitle(string $title): string
	{
		if (is_post_type_archive()) {
			$title = post_type_archive_title('', false);
		} elseif (is_category()) {
			$title = single_cat_title('', false);
		} elseif (is_tag()) {
			$title = single_tag_title('', false);
		} elseif (is_tax()) {
			$title = single_term_title('', false);
		}
		return $title;
	}

	/**
	 * After setum theme hook callback
	 * @return void
	 */
	private static function afterSetupTheme(): void
	{
		// enable post thumbnails
		add_theme_support("post-thumbnails");
		add_theme_support("custom-logo");

		// регистрация меню
		register_nav_menus(
			[
				'header-menu' => __("Header menu", "wordpress-custom-theme"),
			]
		);
	}

	/**
	 * Enqueue assets
	 * @return void
	 */
	private static function enqueueAssets(): void
	{
		// Frontend assets
		add_action('wp_enqueue_scripts', static function (): void {
			$uri = QV_TEMPLATE_DIRECTORY_URI;
			$dir = QV_TEMPLATE_DIRECTORY;

			// styles
			wp_enqueue_style(
				'style-vendor-bootstrap',
				$uri . '/assets/vendor/bootstrap/bootstrap.min.css',
				[],
				filemtime($dir . '/assets/vendor/bootstrap/bootstrap.min.css')
			);

			wp_enqueue_style(
				'style-main',
				$uri . '/assets/css/main.css',
				['style-vendor-bootstrap'],
				filemtime($dir . '/assets/css/main.css')
			);

			// scripts
			wp_enqueue_script(
				'script-vendor-bootstrap',
				$uri . '/assets/vendor/bootstrap/bootstrap.min.js',
				['jquery'],
				filemtime($dir . '/assets/vendor/bootstrap/bootstrap.min.js'),
				true
			);

			wp_enqueue_script(
				'script-main',
				$uri . '/assets/js/main.js',
				['script-vendor-bootstrap'],
				filemtime($dir . '/assets/js/main.js'),
				true
			);
		});

		// Admin assets
		add_action('admin_enqueue_scripts', static function (): void {
			$uri = QV_TEMPLATE_DIRECTORY_URI;
			$dir = QV_TEMPLATE_DIRECTORY;

			// styles
			wp_enqueue_style(
				'style-admin',
				$uri . '/assets/css/admin.css',
				[],
				filemtime($dir . '/assets/css/admin.css')
			);

			// scripts
			wp_enqueue_script(
				'script-admin',
				$uri . '/assets/js/admin.js',
				['jquery'],
				filemtime($dir . '/assets/js/admin.js'),
				true
			);
		});
	}
}
