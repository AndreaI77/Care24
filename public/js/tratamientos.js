'use strict'
$(document).ready(function () {

    let servicios = [];

    $("tbody > tr").each(function(){
        let el=[];
        $(this).children().each(function(i){
            let childEl = $(this).text();
            el.push($(this)[i]=childEl + "");

        });
        servicios.push(el);
    });



   $('#agenda > div > p').remove();
   filtrarAgenda(servicios, crearFecha($('#fecha').val()), $('#clt').val(),$('#emp').val());


   $('#borrar').on('click', function(){
       $('form')[0].reset();
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios, crearFecha($('#fecha').val()), $('#clt').val(),$('#emp').val());
    });

   $('#fecha').on('change', function(){
        $('#agenda > div > p').remove();
       filtrarAgenda(servicios, crearFecha($('#fecha').val()), $('#clt').val(), $('#emp').val());
   });

   $('#emp').on('change',function(){
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios, crearFecha($('#fecha').val()), $('#clt').val(),$('#emp').val());
   })
   $('#clt').on('change',function(){
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios, crearFecha($('#fecha').val()), $('#clt').val(),$('#emp').val());
   });

   function crearFecha(fecha2){
    let myDate = new Date(fecha2);
    let mes = myDate.getMonth()+1;
    let mes1=0;
    if(mes < 10){
        mes1 ='0'+mes;
    }else{
        mes1 = mes;
    }

    let dia= myDate.getDate();

    let dia1=0;
    if(dia < 10){
        dia1 ='0'+dia;
    }else{
        dia1 = dia;
    }

    let mifecha = dia1 + '/' + mes1 + '/' +
        myDate.getFullYear();
    return mifecha;
}
   function filtrarAgenda(filas, fecha, cl, em){
       let row=[];

;        let servicios=[];
        for( let item of filas){
            if(cl != "" ){
                if(cl == item[4]){
                    servicios.push(item);
                }
            }
        }

        if(servicios.length>0){
            row = servicios;
        }else{
            row = filas;
        }

        let empleados=[];
        for( let item of row){
            if(em != "" ){
                if(em == item[5]){
                    empleados.push(item);
                }
            }
        }
        if(empleados.length>0){
            row=[];
            row=empleados;
        }

        for( let item of row){
            let texto = null;

            let datos=fecha.split('/');
            let dat=item[1].split('/');
            //if(new Date(fecha).valueOf() == new Date(item[1]).valueOf()){
            if(datos[0].trim() == dat[0].trim() && datos[1].trim() == dat[1].trim() && datos[2].trim() == dat[2].trim()){

                if(item[6] == "Cita médica"){
                    texto=`<p class= 'ms-5'><span class="text-success">Hora inicio: </span>`+item[2]+`, <span class="text-success">Hora final: </span>`+item[3]+`, <span class="text-success">Cliente: </span>`+item[4]+`,
                    <span class="text-success">Empleado: </span>`+item[5]+`, <span class="text-success">Tipo: </span>`+item[6]+`, <span class="text-success">Estado: </span>`+item[7]+`,
                    <span class="text-success">Hora cita: </span>`+item[7]+`, <span class="text-success">Lugar: </span>`+item[8]+`, <span class="text-success">Especialidad: </span>`+item[9]+`</p>`;

                }else{

                    texto=`<p class= 'ms-5'><span class="text-success">Hora inicio: </span>`+item[2]+`, <span class="text-success">Hora final: </span>`+item[3]+`, <span class="text-success">Cliente: </span>`+item[4]+`,
                    <span class="text-success">Empleado: </span>`+item[5]+`, <span class="text-success">Tipo: </span>`+item[6]+`, <span class="text-success">Estado: </span>`+item[7]+` </p>`;
                }

            }
            let hora= item[2].split(':');
            switch(hora[0]){
                case '08':
                    $('#8').append(texto);
                    break;
                case '09':
                    $('#9').append(texto);
                    break;
                case '10':
                    $('#10').append(texto);
                    break;
                case '11':
                    $('#11').append(texto);
                    break;
                case '12':
                    $('#12').append(texto);
                    break;
                case '13':
                    $('#13').append(texto);
                    break;
                case '14':
                    $('#14').append(texto);
                    break;
                case '15':
                    $('#15').append(texto);
                    break;
                case '16':
                    $('#16').append(texto);
                    break;
                case '17':
                    $('#17').append(texto);
                    break;
                case '18':
                    $('#18').append(texto);
                    break;
                case '19':
                    $('#19').append(texto);
                    break;
                case '20':
                    $('#20').append(texto);
                    break;
                case '21':
                    $('#21').append(texto);
                    break;
                default:
                    if(hora[0]< 8){
                        $('#antes').append(texto);
                    }else if(hora[0] > '21'){
                        $('#despues').append(texto);
                    }
                    break;
            }
        }
    }

});
