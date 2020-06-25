<?php
/*plugin name: crown-protocol-generator
Plugin URI:  https://developer.wordpress.org/
Description: Generate A NFT Protocol on the Crown blockchain using shortcode [crw_registration1]
Version:     2.0
Author:      Defunctec*/
function plugin_css1() {
    wp_enqueue_style( 'css-handle', plugin_dir_url( __FILE__ ) . 'css/bootstrap.min.css' );
    wp_enqueue_style( 'css-handle', plugin_dir_url( __FILE__ ) . 'css/jquery.dataTables.css' );
    wp_enqueue_style( 'custom', plugin_dir_url( __FILE__ ) . 'css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'plugin_css1' );
function plugin_javascript1() {
    // enqueue the script
    //wp_enqueue_script( 'jquery-1.8.2.min', plugin_dir_url( __FILE__ ) . 'js/jquery-1.8.2.min.js' );
    wp_enqueue_script( 'jquery.min', plugin_dir_url( __FILE__ ) . 'js/jquery.min.js' );
    wp_enqueue_script( 'bootstrap.min', plugin_dir_url( __FILE__ ) . 'js/bootstrap.min.js' );
    wp_enqueue_script( 'popper.min', plugin_dir_url( __FILE__ ) . 'js/popper.min.js' );
    wp_enqueue_script( 'jquery.dataTables', plugin_dir_url( __FILE__ ) . 'js/jquery.dataTables.min.js' );
    wp_enqueue_script( 'custom', plugin_dir_url( __FILE__ ) . 'js/custom.js' );
}
add_action( 'wp_enqueue_scripts', 'plugin_javascript1' );
global $jal_db_version;
$jal_db_version = '1.0';
function jal_install1() {
    global $wpdb;
    global $jal_db_version;
    $table_name = "wp_crownform1";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
		id mediumint(13) NOT NULL AUTO_INCREMENT,
		Username tinytext NOT NULL,
		Email varchar(512) NOT NULL,
		NFTProto varchar(512) NOT NULL,
		ProtoName varchar(512) NOT NULL,
		ProtoOwnerAddress varchar(512) NOT NULL,
		SelfSign varchar(512) NOT NULL,
		TypeMime varchar(512) NOT NULL,
		SchemaUri varchar(512) NOT NULL,
		Transferable varchar(512) NOT NULL,
		MetaEmbedded varchar(512) NOT NULL,
		MetaSize varchar(512) NOT NULL,
		ProtoHash varchar(512) NOT NULL,
		created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
		PRIMARY KEY  (id)
	) $charset_collate;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
	add_option( 'jal_db_version', $jal_db_version );
}
register_activation_hook( __FILE__, 'jal_install1' );
register_activation_hook( __FILE__, 'registration_form1' );
//register_activation_hook( __FILE__, 'jal_install1_data' );
function registration_form1()
{
echo'<div class="container">
<div class="row">
	<div class="col-md-12">
		<div id="contact-form" class="crown-form">
			<form id="form" action="../wp-content/plugins/crown-protocol-generator/ajaxform.php" method="post" name="form">
				<div class="form-group" style="display:none">
					<label for="username">Username<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" id="Username" value="YOURUSERNAME" name="Username" readonly required>
				</div>
				<div class="form-group" style="display:none">
					<label for="email">Email Address<span style="color:red;font-size: 15px;">*</span></label>
					<input type="email" class="form-control" name="Email" value="YOUREMAIL" id="Email" readonly required>
				</div>
				<div class="form-group">
					<label for="nftproto">Protocol name(Abbreviation)<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="NFTProto" value="" placeholder="Enter your protocol name, short" id="NFTProto" required>
				</div>
				<div class="form-group">
					<label for="protoname">Protocol full name. Eg AnBeCould<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="ProtoName" placeholder="Enter your protocol name, full" id="ProtoName" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="protoowneraddress">Protocol owner address<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="ProtoOwnerAddress" value="MUST-BE-VPS-CLIENT-CROWN-ADDRESS" placeholder="Your address" id="ProtoOwnerAddress" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="selfsign">selfsign <span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="SelfSign" value="1" placeholder="" id="SelfSign" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="typemime">Mime Type <span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="TypeMime" value="application/json" id="TypeMime" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="schemauri">schemauri <span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="SchemaUri" value="http://" id="SchemaUri" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="transferable">transferable <span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="Transferable" value="true" id="Transferable" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="metaembedded">metaembedded <span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="MetaEmbedded" value="false" id="MetaEmbedded" required>
				</div>
				<div class="form-group" style="display:none">
					<label for="metasize">metasize<span style="color:red;font-size: 15px;">*</span></label>
					<input type="text" class="form-control" name="MetaSize" value="255" id="MetaSize" required>
				</div>

				<div class="form-group submit_btnn">
					<input name="submitbtn" type="submit" class="btn btn-primary" value="Submit" id="submit_form1"/>
					<a  class="btn btn-danger" href="../wp-content/plugins/crown-protocol-generator/response.php'.@$_GET['page_id'].'" id="submit_form1">Get All list</a>
				</div>
			</form>
			<span class="hidden"></span>
			<img src="" id="loading-img" style="display:none">
			<div class="response_msg"></div>
			</div>
		</div>
	</div>
</div>
<div class="selected_from"></div>';
return @$_GET['crw_registration1'];
//	echo @$_GET['crw_registration1'];
}
add_action( 'register_form', 'registration_form1' );
add_shortcode('crw_registration1','registration_form1');
?>