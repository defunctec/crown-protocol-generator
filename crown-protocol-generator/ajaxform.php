<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-config.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/wp-includes/wp-db.php';
    global $wpdb;
    // Check form input
    if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['NFTProto']) && isset($_POST['ProtoName']) && isset($_POST['ProtoOwnerAddress']) && isset($_POST['SelfSign']) && isset($_POST['TypeMime']) && isset($_POST['SchemaUri']) && isset($_POST['Transferable']) && isset($_POST['MetaEmbedded']) && isset($_POST['MetaSize'])){
    // If checks pass, then
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $nftproto = $_POST['NFTProto'];
    $protoname = $_POST['ProtoName'];
    $protoowneraddress = $_POST['ProtoOwnerAddress'];
    $selfsign = $_POST['SelfSign'];
    $typemime = $_POST['TypeMime'];
    $schemauri = $_POST['SchemaUri'];
    $transferable = $_POST['Transferable'];
    $metaembedded = $_POST['MetaEmbedded'];
    $metasize = $_POST['MetaSize'];
    // curl to private file
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://YOURWEBSITEURL/crown_de1/crown.php");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$_POST);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec($ch);
    $nft_proto = '0';
    $result_arr = json_decode($server_output,true);

    if($result_arr['result']!='' && $result_arr['result']!='null'){
        // Content to send to VPS (Crown client)
        $nft_proto  =  $result_arr['result'];
        $table_name = 'wp_crownform1';
        $insert=$wpdb->insert(
            $table_name,
            array(
                'Username' => $username,
                'Email' => $email,
                'NFTProto' => $nftproto,
                'ProtoName'=> $protoname,
                'ProtoOwnerAddress'=> $protoowneraddress,
                'SelfSign'=> $selfsign,
                'TypeMime'=> $typemime,
                'SchemaUri'=> $schemauri,
                'Transferable'=> $transferable,
                'MetaEmbedded'=> $metaembedded,
                'MetaSize'=> $metasize,
                'ProtoHash' => $nft_proto));

        echo $nft_proto."<br>Protocol generated successfully";
        die;

    }else{

        if($result_arr['error']['message'] =='18: spec-tx-dup'){
            echo "Protocol is conflicted, please try again or contact support.";

        }

        elseif(isset($result_arr['error']['message'])){
            echo $result_arr['error']['message'];
        }
        
        else {
            echo " Null return : Check CURLOPT_URL is correct";
        }

    }

    curl_close ($ch);

?>
<?php
}

else {
    echo "An error occured !!.";
    exit;
}
?>