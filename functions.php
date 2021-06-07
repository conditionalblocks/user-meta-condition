/**
 * My newly created function to determine if blocks should show.
 *
 * @return boolean true/false to show the block or not.
 */
function cb_user_meta_check( $user_meta_key = false, $expected_value = false ) {
	$current_user_id = get_current_user_id();

	if ( ! $current_user_id || ! $user_meta_key || ! $expected_value ) {
		return false;
	}

	$get_meta_value = get_user_meta( $current_user_id, $user_meta_key, true );

	if ( $get_meta_value === $expected_value ) {
		return true;
	}

	return false;
}


/**
 * Add custom functions to be used with PHP Logic conditions.
 *
 * @param array $allowed_functions
 * @return array $allowed_functions
 */
function custom_add_allowed_function_conditional_blocks( $allowed_functions ) {

	array_push( $allowed_functions, 'cb_user_meta_check' );

	return $allowed_functions;
}
add_filter( 'conditional_blocks_filter_php_logic_functions', 'custom_add_allowed_function_conditional_blocks', 10, 1 );
