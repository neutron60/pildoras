$(document).ready(function () {

    $("#confirmar_borrar").click(function () { // valida los botones de borrar registro
        var eliminar = confirm("confirme si desea eliminar este registro");

        if (eliminar == true) {
            return true;
        } else {
            return false;
        }
    });


    $("#borrar_id").click(function () { // oculta registrar id en el menu de nav mis datos, cuando este campo ha sido registrado

        var a = $("#ocultar_id").attr("value");
        var b = parseInt(a)

        if (b > 0) {
            $("#ocultar_id").hide();
        }
    });

    $("#validar_forma").validate(); // valida un form de create_order_basic, create en aside-advertising, create y
    //  edit de section, create y edit de section, edit-order-requested de purchase,
    //edit-order-payment-details de purchase, edit-order-assign-invoice de purchase
    //edit-order-verified-payment de purchase

    $("#validar_forma1").validate(); // valida un form de create_order_basic, edit-order-requested de purchase
    ////edit-order-payment-details de purchase

    $("#validar_forma4").validate(); // valida un form de edit-order-payment-details edit-order-requested de purchase, valida un form de create_order_basic

    $("#validar_forma5").validate(); // valida un form de edit-order-payment-details de purchase



    $("#validar_forma2").validate({ // valida el form de create, edit en department

        rules: {
            name: "required",
            title: "required",
            description: {
                required: true,
                rangelength: [2, 2000]
            }
        }

    });

    $("#validar_forma3").validate({ // valida el form de create, edit en article

        rules: {

            name: "required",
            code: "required",


            stock: {
                required: true,
                range: [0, 100],
            },

            description: {
                required: true,
                rangelength: [2, 2000],
            },

            price: {
                required: true,
                range: [0, 100000000],
        }
    }

    });

    $("#validar_forma6").validate({
        // verifica en form de create_order_basic que esten los datos
        rules: {

            name: "required",

        }
    });

    $("#validar_forma7").validate({ // verifica en form de purchase/edit-order-payment

        rules: {

            payment_day: "required",

            amount_paid: {
                required: true,
                range: [0, 100000000],
            }
        }
    });

    $("#validar_forma8").validate({ // verifica en form de purchase/edit-order-payment

        rules: {

            payment_day: "required",
            issuing_bank: "required",

            amount_paid: {
                required: true,
                range: [0, 100000000],
            }
        }
    });

    $("#validar_forma9").validate({ // verifica en form de purchase/edit-order-payment

        rules: {

            payment_day: "required",
            issuing_bank: "required",
            receiving_bank: "required",

            amount_paid: {
                required: true,
                range: [0, 100000000],
            }
        }
    });

    $("#validar_forma10").validate({ // verifica en form de purchase/edit-order-payment

        rules: {

            payment_day: "required",
            issuing_bank: "required",
            receiving_bank: "required",

            amount_paid: {
                required: true,
                range: [0, 100000000],
            }
        }
    });






    $("#validar_forma20").submit(function () { // oculta registrar id en el menu de nav mis datos, cuando este campo ha sido registrado

        var fecha = new Date($('#payment_day1').val());
        var dia = fecha.getDate();
        if (dia > 1) {
            alert('soy mayor que 1');
        }

        var b = $("#amount_paid1").val();

        alert(dia);

        if (b == "") {
            if (b == "") {
                $("#amount_paid1").after("<p> el monto pagado es requerido </p>")
            };
            if (!dia) {
                $("#payment_day1").after("<p> la fecha de pago es requerida  </p>")
            };
            return false;
        }


    });

    $("#validar_forma21").submit(function () { // oculta registrar id en el menu de nav mis datos, cuando este campo ha sido registrado
        var a = $(":text").each(function () {
            alert($(this).val());
        });
        return false

    });




})



//var b = $("#amount_paid1").val();


// var date = new Date($('#payment_day1').val());
// var day = date.getDate();
// var month = date.getMonth() + 1;
//  var year = date.getFullYear();
//alert([day, month, year].join('/'));
//var c = parseInt(day)





//if(b ==""){
// if(b ==""){$("#amount_paid1").after("<p> el monto pagado es requerido </p>")};

//
//   return false;}

/* if(!day){

    if(!day){  $("#payment_day1").after("<p> la fecha de pago es requerida  </p>")};
return false;}*/
