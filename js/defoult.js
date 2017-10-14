
$(document).ready(function(){

    $("#smsSender").on("change",function(){

        var obj = this;
        var id =  $(obj).val();
        if(id > 0){
            alert(id);
            $.post("controller.php",
            {
              id: id,
              submit: "getSms"
              
            },
            function(data,status){
                var data = JSON.parse(data);
                 $("#sms").empty();
                for(var i = 0; i < data.length ; i++){
                    console.log(data[i].sms);
                    $("#sms").append(data[i].sms);
                }
               
            });
        }
    });
});
