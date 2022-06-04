"use strict";
let comentarios = document.getElementsByClassName('tarjeta');
let total = comentarios.length;
let cinco= 0;
let cuatro=0;
let tres = 0;
let dos = 0;
let uno = 0;
for(let item of comentarios){
    if(item.value == 5){
        cinco++;
    }else if(item.value == 4){
        cuatro++;
    }else if(item.value == 3){
        tres++;
    }else if(item.value == 2){
        dos++;
    }else if(item.value == 1){
        uno++;
    }

}
console.log(total);
console.log(cinco);
console.log(cuatro);
console.log(tres);
console.log(dos);

let cinco1= 0;
let cuatro1=0;
let tres1 = 0;
let dos1 = 0;
let uno1 = 0;
if(total != 0){
    cinco1= cinco/total*100;
    cuatro1= cuatro/total*100;
    tres1 = tres/total*100;
    dos1 = dos/total*100;
    uno1 = uno/total*100;
}

const labels = ["Muy satisfecho", "Satisfecho", "Bien", "Insatisfecho", "Muy insatisfecho"];
let porcentajes=[cinco1, cuatro1, tres1, dos1, uno1];


let data = {
  labels: labels,
  datasets: [
    {
        label: "% sobre total de comentarios",
      backgroundColor: "#198754",
      borderColor: "#198754",
      data: porcentajes,
    },

  ],
};

const config = {
  type: "bar",
  data: data,
  options: {
      indexAxis: 'y',

    responsive: true,
    scales: {
        y: {
            gridlines: {
                display: false
            }
        },
        x: {
            suggestedMin:0,
            suggestedMax:100
        }

        },
    plugins: {
      legend: {
        position: "top",
      },
      title: {
        display: true,
        text: "Valoración",
      },
    },
  },
};

let myChart = new Chart(document.getElementById("myChart"), config);
