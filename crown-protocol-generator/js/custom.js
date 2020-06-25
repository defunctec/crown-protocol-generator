$(document).ready(function() {
$('#submit_form1').click(function(e) {
    e.preventDefault();

$('.hidden1').html('');

  var Username = $('#Username').val();
  var Email = $('#Email').val();
  var NFTProto = $('#NFTProto').val();
  var ProtoName = $('#ProtoName').val();
  var ProtoOwnerAddress = $('#ProtoOwnerAddress').val();
  var SelfSign = $('#SelfSign').val();
  var TypeMime = $('#TypeMime').val();
  var SchemaUri = $('#SchemaUri').val();
  var Transferable = $('#Transferable').val();
  var MetaEmbedded = $('#MetaEmbedded').val();
  var MetaSize = $('#MetaSize').val();
  var result_matc = /^[a-z1-5.()]*$/;
  var lower = ProtoOwnerAddress.substring(0, 3);
  var ProtoOwnerlowercase = ProtoOwnerAddress.toLowerCase();
  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var data = $("#form1").serialize();

// Error messages
$(".error_r").remove();
if (Username=="")
{
  $("#Username").parent(".form-group").append("<span class='error_r'>Username Name is Required</span>");
    $(".error_r").fadeOut(10000);
  $(".hidden1").show();
  return false;
}
if (!Username)
{
  $("#Username").parent(".form-group").append("<span class='error_r'>Please fill username</span>");
    $(".error_r").fadeOut(10000);
     return false;
}
if (Email=="")
{
  $("#Email").parent(".form-group").append("<span class='error_r'>Email Name is Required</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
 if (!regex.test(Email)) {
     $("#Email").parent(".form-group").append("<span class='error_r'>Please fill validate email</span>");
    $(".error_r").fadeOut(10000);
     return false;
}
if (NFTProto=="")
{
  $("#NFTProto").parent(".form-group").append("<span class='error_r'>Protocol Name, short is Required, Eg(abc)</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (NFTProto.length < 3 || NFTProto.length > 12){
  //alert(NFTProto.length);
    $("#NFTProto").parent(".form-group").append("<span class='error_r'>Please Enter a Correct protocol </span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (!NFTProto.match(result_matc)){
    $("#NFTProto").parent(".form-group").append("<span class='error_r'>Please Enter Correct NFT Name </span>");
    $(".error_r").fadeOut(10000);
       return false;
}
if (ProtoName=="")
{
  $("#ProtoName").parent(".form-group").append("<span class='error_r'>Protocol name, full is required</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (ProtoName.length < 3 || ProtoName.length > 80){
    $("#ProtoName").parent(".form-group").append("<span class='error_r'>Please Enter a Correct protocol name, full</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (ProtoOwnerAddress=="")
{
  $("#ProtoOwnerAddress").parent(".form-group").append("<span class='error_r'>Protocol Owner Address is Required</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (ProtoOwnerAddress.length<32 || ProtoOwnerAddress.length>70)
{
  $("#ProtoOwnerAddress").parent(".form-group").append("<span class='error_r'>Please Enter a Correct Protocol Owner Address</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (SelfSign=="")
{
  $("#SelfSign").parent(".form-group").append("<span class='error_r'>Must equal 1</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (TypeMime=="")
{
  $("#TypeMime").parent(".form-group").append("<span class='error_r'>TypeMime equals application/json</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (SchemaUri=="")
{
  $("#SchemaUri").parent(".form-group").append("<span class='error_r'>Empty</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (Transferable=="")
{
  $("#Transferable").parent(".form-group").append("<span class='error_r'>true</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (MetaEmbedded=="")
{
  $("#MetaEmbedded").parent(".form-group").append("<span class='error_r'>true</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (MetaSize=="")
{
  $("#MetaSize").parent(".form-group").append("<span class='error_r'>Please use less than 255 characters</span>");
    $(".error_r").fadeOut(10000);
    return false;
}
if (!MetaSize.length > 255){
  //alert(MetaSize.length);
    $("#MetaSize").parent(".form-group").append("<span class='error_r'>Please use less than 255 characters</span>");
    $(".error_r").fadeOut(10000);
    return false;
}

else {
        $.ajax({

      type: 'POST',
      url: '/wp-content/plugins/crown-protocol-generator/ajaxform.php',
      data: data,

      success: function(data) {
        $(".hidden1").html(data);
        $(".hidden1").show();
      },
      error: function() {
        console.log("Protocol generation failed at the .js level");
        console.log(submit_form1);
        console.log(data);
      }
    });
   }
});

});