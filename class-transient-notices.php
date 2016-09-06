<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
/**
 * Iconic_Transient_Notices.
 *
 * Easily handle notices across screens
 *
 * @class    Iconic_Transient_Notices
 * @version  1.0.0
 * @author   Iconic
 */
class Iconic_Transient_Notices {

    /**
     * Transient name
     *
     * @since 1.0.0
     * @access protected
     * @var str $transient_name
     */
    protected $transient_name = 'iconic_transient_notices';

    /**
     * Construct the transient notices class
     */
    public function __construct() {

        add_action( 'admin_notices', array( $this, 'display_notices' ) );

    }

    /**
     * Display notices
     *
     * @since 1.0.0
     */
    public function display_notices() {

        if ( $notices = get_transient( $this->transient_name ) ) { ?>

            <?php foreach( $notices as $notice ) { ?>

                <?php $error_code = str_replace( 'iconic-transient-notice-', '', $notice->get_error_code() ); ?>

                <div class="notice notice-<?php echo $error_code; ?>">
                    <p><?php echo $notice->get_error_message(); ?></p>
                </div>

            <?php } ?>

            <?php delete_transient( $this->transient_name );

        }

    }

    /**
     * Add notice
     *
     * @since 1.0.0
     * @param str $type info|error|warning
     * @param str $message
     */
    public function add_notice( $type = false, $message = false ) {

        if( !$code || !$message )
            return;

        $notices = get_transient( $this->transient_name );
        $notices = $notices ? $notices : array();

        $notices[] = new WP_Error( 'iconic-transient-notice-'.$type, $message );

        set_transient( $this->transient_name, $notices, 45 );

    }

}
