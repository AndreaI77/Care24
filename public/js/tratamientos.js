'use strict'
$(document).ready(function () {

    let servicios = [];

    $("tbody > tr").each(function(){
        let el=[];
        $(this).children().each(function(i){

            let childEl = $(this).html();

            el.push($(this)[i]=childEl + "");
            //console.log(childEl);
        });
        servicios.push(el);
    });

   $('#agenda  p').remove();
   filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val());

   $('#borrar').on('click', function(){
       $('form')[0].reset();
        $('#agenda  p').remove();
        filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val());
    });

   $('#fecha').on('change', function(){
        $('#agenda  p').remove();
        filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val());
   });

   $('#clt').on('change',function(){
        $('#agenda   p').remove();
        filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val());
   });

   function filtrarAgenda(filas, fecha, cl){
       let row=[];

        let servicios=[];
        for( let item of filas){
            if(cl != "" ){
                if(cl == item[1]){
                    servicios.push(item);
                }
            }
        }

        if(servicios.length>0){
            row = servicios;
        }else{
            row = filas;
        }

        for( let item of row){
            let texto = null;
            let fecha1=item[3].split('/');

            let fechaI= new Date(fecha1[2], fecha1[1]-1, fecha1[0]);
            fechaI.setHours(0,0,0,0);
            let fechaF="";

            if(item[4] != "" && item[4] != null){
                let fecha2=item[4].split('/');

                fechaF = new Date(fecha2[2], fecha2[1]-1, fecha2[0]);
                fechaF.setHours(0,0,0,0);
            }
            let fecha3= new Date(fecha);
            fecha3.setHours(0,0,0,0);
            if(fecha3.valueOf()>= fechaI.valueOf()){
                if(fechaF !=""){

                    if(fecha3.valueOf() <= fechaF.valueOf()){
                        texto=`<p class= 'ms-5'><span class='me-2' >`+item[0]+`</span><span class="text-success">Hora: </span>`+item[6]+`, <span class="text-success">Medicamento: </span>`+item[2]+`,
                    <span class="text-success">Cantidad: </span>`+item[5]+`, <span class="text-success">Cliente: </span>`+item[1]+` </p>`;
                    }
                }else{
                    texto=`<p class= 'ms-5'><span class='me-2' >`+item[0]+`</span><span class="text-success">Hora: </span>`+item[6]+`, <span class="text-success">Medicamento: </span>`+item[2]+`,
                    <span class="text-success">Cantidad: </span>`+item[5]+`, <span class="text-success">Cliente: </span>`+item[1]+` </p>`;
                }
            }
            let hora= item[6].split(':');
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
                    if(hora[0] < 8 || hora[0] == '00'){
                        $('#antes').append(texto);
                    }else if(hora[0] > 21 ){
                        $('#despues').append(texto);
                    }
                    break;
            }
        }
    }

});
