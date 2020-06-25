<?php
	if(isset($_POST['Username']) && isset($_POST['Email']) && isset($_POST['NFTProto']) && isset($_POST['ProtoName']) && isset($_POST['ProtoOwnerAddress']) && isset($_POST['SelfSign']) && isset($_POST['TypeMime']) && isset($_POST['SchemaUri']) && isset($_POST['Transferable']) && isset($_POST['MetaEmbedded']) && isset($_POST['MetaSize'])){
	// Post inputs
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
	// Connect to VPS (Crown client)
	$curl = curl_init();
	curl_setopt_array($curl, array(
	CURLOPT_PORT => "9341",
	CURLOPT_URL => "http://RPCPASS:RPCUSER@VPSIP:9341",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	//CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "getinfo", "params": [] }',
	//CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "nftproto", "params": ["register","egx","Example X","CRWLNxC2v1imA1mZvxqnHNT2jZ2zJ9EkAHey",1,"application/data","https://YOURWEBSITE/creator-proto-user"] }',
	// Command structure
	CURLOPT_POSTFIELDS => '{"jsonrpc": "1.0", "id":"curltest", "method": "nftproto", "params": ["register","'.$nftproto.'","'.$protoname.'","'.$protoowneraddress.'","'.$selfsign.'","'.$typemime.'","'.$schemauri.'","'.$transferable.'","'.$metaembedded.'","'.$metasize.'"] }',
	CURLOPT_HTTPHEADER => array(
	"cache-control: no-cache",
	"content-type: application/json",
	"user: RPCUSER:RPCPASS"
	),
)); 
// Response or error
$response = curl_exec($curl);
echo $response;
}else{
	echo '{error:"Please enter valid method"}';
}
die;
?>