'use strict'
$(document).ready(function () {
    // $('#todos').attr('checked',true);

    // let clientes = [];

    // $("tbody > tr").each(function(){
    //     let el=[];
    //     $(this).children().each(function(i){
    //         let childEl = $(this).html();
    //         //let childEl = $(this).text();
    //         //el.push($(this)[i]=childEl);
    //         el.push(childEl);
    //     });
    //     clientes.push(el);
    // });
    // console.log(clientes);
    // $('tbody > tr').remove();
    // crearTabla(clientes);

    // function crearTabla(filas){
    //     for(let item of filas){
    //         let texto=`<tr class="text-center">
    //         <td>`+item[0]+`</td>
    //         <td class= "nombre">`+item[1]+`</td>
    //         <td class= "apellido">`+item[2]+`</td>
    //         <td class= "domicilio">`+item[3]+`</td>
    //         <td class= "dni">`+item[4]+`</td>
    //         <td class= " f_nac">`+item[5]+`</td>
    //         <td class= "email">`+item[6]+`</td>
    //         <td class= "tel">`+item[7]+`</td>
    //         <td class= "puesto">`+item[8]+`</td>
    //         <td class= "idioma">`+item[9]+`</td>
    //         <td class= " f-a">`+item[10]+`</td>
    //         <td class= "text-center f-b f_b">`+item[11]+`</td>
    //     </tr>`;
    //     $('tbody').append(texto);
    //     }
    // }
    // $("#baja").on("click", function () {
    //     let baja=[];
    //     for(let item of clientes){
    //         if(item[12]=""){
    //             baja.push(item);
    //         }

    //     }
    //     $('tbody > tr').remove();
    //     crearTabla(baja);
    //     $('#borrar').trigger('click');
    //     // $(".f_ba").each(function(i) {

    //     //     if ($(this).text() == "") {
    //     //         $(this).parent("tr").hide();
    //     //     }else{
    //     //         $(this).parent("tr").show();
    //     //     }
    //     // });
    // });
    // $("#alta").on("click", function () {
    //     let alta=[];
    //     for(let item of clientes){
    //         if(item[12]!=""){
    //             alta.push(item);
    //         }
    //     }
    //     $('tbody > tr').remove();
    //     crearTabla(alta);
    //     $('#borrar').trigger('click');
    //     // $(".f_ba").each(function (i) {
    //     //     if ($(this).text() == "") {
    //     //         $(this).parent("tr").show();
    //     //     }else{
    //     //         $(this).parent("tr").hide();
    //     //     }
    //     // });
    // });
    // $("#todos").on("click", function () {
    //     $('tbody > tr').remove();
    //     crearTabla(clientes);
    //     $('#borrar').trigger('click');

    //     // $(".f_ba").each(function(i) {
    //     //     $(this).parent("tr").show();
    //     // });
    // });
    $('#nombre').on('change', function(){
        if($('#nombre').is(':checked')){
            $('.nombre').each(function(){
                $(this).hide();
            })
        }else{
            $('.nombre').each(function(){
                $(this).show();
            })
        }
    });
    $('#apellido').on('change', function(){
        if($('#apellido').is(':checked')){
            $('.apellido').each(function(){
                $(this).hide();
            })
        }else{
            $('.apellido').each(function(){
                $(this).show();
            })
        }
    });
    $('#domicilio').on('change', function(){
        if($('#domicilio').is(':checked')){
            $('.domicilio').each(function(){
                $(this).hide();
            })
        }else{
            $('.domicilio').each(function(){
                $(this).show();
            })
        }
    });
    $('#dni').on('change', function(){
        if($('#dni').is(':checked')){
            $('.dni').each(function(){
                $(this).hide();
            })
        }else{
            $('.dni').each(function(){
                $(this).show();
            })
        }
    });
    $('#fnac').on('change', function(){
        if($('#fnac').is(':checked')){
            $('.f_nac').each(function(){
                $(this).hide();
            })
        }else{
            $('.f_nac').each(function(){
                $(this).show();
            })
        }
    });
    $('#puesto').on('change', function(){
        if($('#puesto').is(':checked')){
            $('.puesto').each(function(){
                $(this).hide();
            })
        }else{
            $('.puesto').each(function(){
                $(this).show();
            })
        }
    });

    $('#idioma').on('change', function(){
        if($('#idioma').is(':checked')){
            $('.idioma').each(function(){
                $(this).hide();
            })
        }else{
            $('.idioma').each(function(){
                $(this).show();
            })
        }
    });
    $('#tel').on('change', function(){
        if($('#tel').is(':checked')){
            $('.tel').each(function(){
                $(this).hide();
            })
        }else{
            $('.tel').each(function(){
                $(this).show();
            })
        }
    });
    $('#email').on('change', function(){
        if($('#email').is(':checked')){
            $('.email').each(function(){
                $(this).hide();
            })
        }else{
            $('.email').each(function(){
                $(this).show();
            })
        }
    });
    $('#f_alta').on('change', function(){
        if($('#f_alta').is(':checked')){
            $('.f-a').each(function(){
                $(this).hide();
            })
        }else{
            $('.f-a').each(function(){
                $(this).show();
            })
        }
    });
    $('#f_baja').on('change', function(){
        if($('#f_baja').is(':checked')){
            $('.f-b').each(function(){
                $(this).hide();
            })
        }else{
            $('.f-b').each(function(){
                $(this).show();
            })
        }
    });
    $('#borrar').on('click',function(){
        $('#filtros input[type=checkbox').each(function(){
            if($(this).is(':checked')){
                $(this).trigger('click');
            }
        });
    })
});


