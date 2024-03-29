<?php

/**
 * A class to manage admin notices
 * displayed only to admin, based on 'manage_options' capability
 * and only on dashboard, plugins and Polylang admin pages
 *
 * @since 2.3.9
 */
class PLL_Admin_Notices {
	private static $notices = array();

	/**
	 * Constructor
	 * Setup actions
	 *
	 * @since 2.3.9
	 *
	 * @param object $polylang
	 */
	public function __construct( $polylang ) {
		$this->options = &$polylang->options;

		add_action( 'admin_init', array( $this, 'hide_notice' ) );
		add_action( 'admin_notices', array( $this, 'display_notices' ) );
	}

	/**
	 * Add a custom notice
	 *
	 * @since 2.3.9
	 *
	 * @param string $name Notice name
	 * @param string $html Content of the notice
	 */
	public static function add_notice( $name, $html ) {
		self::$notices[ $name ] = $html;
	}

	/**
	 * Get custom notices
	 *
	 * @since 2.3.9
	 *
	 * @return array
	 */
	public static function get_notices() {
		return self::$notices;
	}

	/**
	 * Has a notice been dismissed?
	 *
	 * @since 2.3.9
	 *
	 * @param string $notice Notice name
	 * @return bool
	 */
	public static function is_dismissed( $notice ) {
		$dismissed = get_user_meta( get_current_user_id(), 'pll_dismissed_notices', true );
		return is_array( $dismissed ) && in_array( $notice, $dismissed );
	}

	/**
	 * Should we display notices on this screen?
	 *
	 * @since 2.3.9
	 *
	 * @return bool
	 */
	protected function can_display_notice() {
		$screen = get_current_screen();
		$screen_id = sanitize_title( __( 'Languages', 'polylang' ) );

		return in_array(
			$screen->id,
			array(
				'dashboard',
				'plugins',
				'toplevel_page_mlang',
				$screen_id . '_page_mlang_strings',
				$screen_id . '_page_mlang_settings',
			)
		);
	}

	/**
	 * Stores a dismissed notice in database
	 *
	 * @since 2.3.9
	 *
	 * @param string $notice
	 */
	public static function dismiss( $notice ) {
		if ( ! $dismissed = get_user_meta( get_current_user_id(), 'pll_dismissed_notices', true ) ) {
			$dismissed = array();
		}

		if ( ! in_array( $notice, $dismissed ) ) {
			$dismissed[] = $notice;
			update_user_meta( get_current_user_id(), 'pll_dismissed_notices', array_unique( $dismissed ) );
		}
	}

	/**
	 * Handle a click on the dismiss button
	 *
	 * @since 2.3.9
	 */
	public function hide_notice() {
		if ( isset( $_GET['pll-hide-notice'], $_GET['_pll_notice_nonce'] ) ) {
			$notice = sanitize_key( $_GET['pll-hide-notice'] );
			check_admin_referer( $notice, '_pll_notice_nonce' );
			self::dismiss( $notice );
			wp_safe_redirect( remove_query_arg( array( 'pll-hide-notice', '_pll_notice_nonce' ), wp_get_referer() ) );
			exit;
		}
	}

	/**
	 * Displays notices
	 *
	 * @since 2.3.9
	 */
	public function display_notices() {
		if ( current_user_can( 'manage_options' ) && $this->can_display_notice() ) {
			// Core notices
			$this->pllwc_notice();
			$this->review_notice();

			// Custom notices
			foreach ( $this->get_notices() as $notice => $html ) {
				if ( ! $this->is_dismissed( $notice ) ) {
					?>
					<div class="pll-notice notice notice-info">
						<?php
						$this->dismiss_button( $notice );
						echo wp_kses_post( $html );
						?>
					</div>
					<?php
				}
			}
		}
	}

	/**
	 * Displays a dismiss button
	 *
	 * @since 2.3.9
	 *
	 * @param string $name Notice name
	 */
	public function dismiss_button( $name ) {
		printf(
			'<a class="notice-dismiss" href="%s"><span class="screen-reader-text">%s</span></a>',
			esc_url( wp_nonce_url( add_query_arg( 'pll-hide-notice', $name ), $name, '_pll_notice_nonce' ) ),
			/* translators: accessibility text */
			esc_html__( 'Dismiss this notice.', 'polylang' )
		);
	}

	/**
	 * Displays a notice if WooCommerce is activated without Polylang for WooCommerce
	 *
	 * @since 2.3.9
	 */
	private function pllwc_notice() {
		if ( defined( 'WOOCOMMERCE_VERSION' ) && ! defined( 'PLLWC_VERSION' ) && ! $this->is_dismissed( 'pllwc' ) ) {
			?>
			<div class="pll-notice notice notice-warning">
			<?php $this->dismiss_button( 'pllwc' ); ?>
				<p>
					<?php
					printf(
						/* translators: %1$s is link start tag, %2$s is link end tag. */
						esc_html__( 'We have noticed that you are using Polylang with WooCommerce. To ensure compatibility, we recommend you use %1$sPolylang for WooCommerce%2$s.', 'polylang' ),
						'<a href="http://polylang.pro/downloads/polylang-for-woocommerce/">',
						'</a>'
					);
					?>
				</p>
			</div>
			<?php
		}
	}

	/**
	 * Displays a notice asking for a review
	 *
	 * @since 2.3.9
	 */
	private function review_notice() {
		if ( ! defined( 'POLYLANG_PRO' ) && ! $this->is_dismissed( 'review' ) && ! empty( $this->options['first_activation'] ) && time() > $this->options['first_activation'] + 15 * DAY_IN_SECONDS ) {
			?>
			<div class="pll-notice notice notice-info">
			<?php $this->dismiss_button( 'review' ); ?>
				<p>
					<?php
					printf(
						/* translators: %1$s is link start tag, %2$s is link end tag. */
						esc_html__( 'We have noticed that you have been using Polylang for some time. We hope you love it, and we would really appreciate it if you would %1$sgive us a 5 stars rating%2$s.', 'polylang' ),
						'<a href="http://wordpress.org/support/plugin/polylang/reviews/?rate=5#new-post">',
						'</a>'
					);
					?>
				</p>
			</div>
			<?php
		}
	}
}
