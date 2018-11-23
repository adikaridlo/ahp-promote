var type = $("#users").val();
// console.log(type);
if (type == 'aggregator' || type == 'executor') {
    // $(".grid").addClass("col-xs-12 col-sm-6 col-md-6 col-lg-6");
    // display
    $("#box-4").css("display","none");
    $("#box-5").css("display","none");
    $("#box-6").css("display","none");
    $("#box-7").css("display","none");
    $("#box-8").css("display","none");
    $("#box-9").css("display","none");
    $("#box-10").css("display","block");
}else{
    $("#box-10").css("display","none");
}   

if (type == 'merchant' || type == 'sub_merchant') {

    $("#box-4").css("display","none");
    $("#box-5").css("display","none");
    $("#box-6").css("display","none");
    $("#box-7").css("display","none");
    $("#box-8").css("display","none");
    $("#box-9").css("display","none");
}