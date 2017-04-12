function loadData(){
    alert("asd");
    jQuery.ajax({
        type: "GET",
        url: 'http://titansmora.org/Yung/BusDetails/busDetails.php',
        dataType: 'text/html',
        data: {Bus_Number: 'nn1111'},
        success:function (obj) {

               alert("asd");
        }
    });
}