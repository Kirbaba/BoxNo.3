jQuery(document).on('click', '#sentReq', function (){
    var name = jQuery("#inputname").val();
    var mail = jQuery("#inputmail").val();
    var text = jQuery("#inputtext").val();
    if(name == "" || mail == "" || text == ""){

        alert ("Заполните все поля");
    }
    else{
        jQuery.ajax({
            url: myajax.url, //url, к которому обращаемся
            type: "POST",
            data: "action=get_mail&name="+name+"&mail="+mail+"&text="+text, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                //возвращаемые данные попадают в переменную data
                //jQuery('#excurtions').html(data);
                alert('Сообщение отправлено. Спасибо');
            }
        });
        $('#bgpopup').css('display','none');
        //$('#bgpopup').modal('hide');
        name = jQuery("#inputname").val('');
        mail = jQuery("#inputmail").val('');
        text = jQuery("#inputtext").val('');
    }
});