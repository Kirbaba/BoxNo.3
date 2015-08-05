jQuery(document).on('click', '#order', function (){
    var name = jQuery("#order_name").val();
    var mail = jQuery("#order_mail").val();
    var text = jQuery("#order_text").val();
    if(name == "" || mail == "" || text == ""){

        alert ("Заполните все поля");
    }
    else{
        jQuery.ajax({
            url: myajax.url, //url, к которому обращаемся
            type: "POST",
            data: "action=get_order&name="+name+"&mail="+mail+"&text="+text, //данные, которые передаем. Обязательно для action указываем имя нашего хука
            success: function(data){
                //возвращаемые данные попадают в переменную data
                //jQuery('#excurtions').html(data);
                alert('Ваш заказ принят. Спасибо');
            }
        });
        $('#bgprod').css('display','none');
        //$('#bgpopup').modal('hide');
        name = jQuery("#order_name").val('');
        mail = jQuery("#order_mail").val('');
        text = jQuery("#order_text").val('');
    }
});