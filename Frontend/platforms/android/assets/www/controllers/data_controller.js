function loadData(){

    openModal();
    jQuery.ajax({
        type: "POST",
        url: 'http://foody.6te.net/Model/DataAccess/like_Model.php',
        dataType: 'json',
        data: {id: dishid},
        success:function (obj) {
            if(obj==null){
                closeModal();
                document.getElementById('log1').innerHTML +='<center>No likes</center>';
            }
            for (i = 0; i < obj.length; i++) {
                document.getElementById('log1').innerHTML +=
                    '<li class="message-left animated fadeinup delay-2">'+
                    '<img alt="" src="'+obj[i].photo+'">'+
                    '<div class="message first">'+
                    '<b><p>'+obj[i].first_name+" "+ obj[i].last_name+'</p></b>'+
                    '</div>'+
                    '</li>';
            }
            closeModal();
        }
    });
}