function loadData(){
    alert("asd");
    jQuery.ajax({
        type: "GET",
        url: 'http://titansmora.org/Yung/BusDetails/busDetails.php',
        dataType: 'json',
        data: {Bus_Number: 'nn1111'},
        success:function (obj) {

               alert("asd");
        }
    });
}