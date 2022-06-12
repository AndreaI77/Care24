$(document).ready(function () {

    let servicios = [];

    $("tbody > tr").each(function(){
        let el=[];
        $(this).children().each(function(i){
            let childEl = $(this).html();
            //let childEl = $(this).text();
            el.push($(this)[i]=childEl);

        });
        //servicios.push(el);
    });
    console.log(servicios);
   $('#agenda > div > p').remove();
   filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val(),$('#emp').val());

   $('#borrar').on('click', function(){
       $('form')[0].reset();
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios,$('#fecha').val(), $('#clt').val(),$('#emp').val());
    });

   $('#fecha').on('change', function(){
        $('#agenda > div > p').remove();
       filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val(), $('#emp').val());
   });

   $('#emp').on('change',function(){
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val(),$('#emp').val());
   })
   $('#clt').on('change',function(){
        $('#agenda > div > p').remove();
        filtrarAgenda(servicios, $('#fecha').val(), $('#clt').val(),$('#emp').val());
   });

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

            let mifecha= new Date(fecha);
            mifecha.setHours(0,0,0,0);
            let dat=item[1].split('/');
            let fechaI = new Date(dat[2], dat[1]-1, dat[0]);
            fechaI.setHours(0,0,0,0);
            if(mifecha.valueOf() == fechaI.valueOf()){


                if(item[6] == "Cita"){

                    texto=` <p class= 'ms-5 '><span class='me-2' >`+item[0]+`</span><span class="text-success">Hora inicio: </span>`+item[2]+`, <span class="text-success">Hora final: </span>`+item[3]+`, <span class="text-success">Cliente: </span>`+item[4]+`,
                    <span class="text-success">Empleado: </span>`+item[5]+`, <span class="text-success">Tipo: </span>`+item[6]+`, <span class="text-success">Estado: </span>`+item[7]+`,
                    <span class="text-success">Hora cita: </span>`+item[8]+`, <span class="text-success">Lugar: </span>`+item[9]+`, <span class="text-success">Especialidad: </span>`+item[10]+`</p>`;
                    // <span >`+item[0]+`</span>
                }else{

                    texto=`<p class= 'ms-5'> <span class='me-2'>`+item[0]+`</span><span class="text-success">Hora inicio: </span>`+item[2]+`, <span class="text-success">Hora final: </span>`+item[3]+`, <span class="text-success">Cliente: </span>`+item[4]+`,
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
