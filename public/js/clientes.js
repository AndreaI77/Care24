'use strict'
$(document).ready(function () {
    $('#todos').attr('checked',true);
    $("#baja").on("click", function () {

        $(".f_b").each(function(i) {
            if ($(this).text() == "") {
                $(this).parent("tr").hide();
            }else{
                $(this).parent("tr").show();
            }
        });
    });
    $("#alta").on("click", function () {

        $(".f_b").each(function(i) {
            if ($(this).text() == "") {
                $(this).parent("tr").show();
            }else{
                $(this).parent("tr").hide();
            }

        });
    });
    $("#todos").on("click", function () {

        $(".f_b").each(function(i) {
            $(this).parent("tr").show();

        });
    });
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
    $('#sip').on('change', function(){
        if($('#sip').is(':checked')){
            $('.sip').each(function(){
                $(this).hide();
            })
        }else{
            $('.sip').each(function(){
                $(this).show();
            })
        }
    });
    $('#nacionalidad').on('change', function(){
        if($('#nacionalidad').is(':checked')){
            $('.nac').each(function(){
                $(this).hide();
            })
        }else{
            $('.nac').each(function(){
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


