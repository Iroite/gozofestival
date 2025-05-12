// Fecha objetivo para la cuenta regresiva
const fechaObjetivo = new Date("2025-07-06T23:59:59").getTime();

// Actualizar el contador cada segundo
const intervalo = setInterval(() => {
  const ahora = new Date().getTime();
  const diferencia = fechaObjetivo - ahora;

  // Calcular días, horas, minutos y segundos restantes
  const dias = Math.floor(diferencia / (1000 * 60 * 60 * 24));
  const horas = Math.floor((diferencia % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutos = Math.floor((diferencia % (1000 * 60 * 60)) / (1000 * 60));
  const segundos = Math.floor((diferencia % (1000 * 60)) / 1000);

  // Mostrar el resultado
  document.getElementById("dia").innerHTML = dias;
    document.getElementById("hora").innerHTML = horas;
    document.getElementById("minuto").innerHTML = minutos;
    document.getElementById("segundos").innerHTML = segundos;
  // Detener el contador cuando llegue a 0
  if (diferencia < 0) {
    clearInterval(intervalo);
    document.getElementById("contador").innerHTML = "Comeza o Festival";
  }
}, 1000);


//modal
const modal = document.getElementById('modal')
const abrirModal = document.getElementById('abrirModal')
// const pecharModal = document.getElementById('pecharModal')

function showModal() {
  modal.classList.toggle('show')
}

document.addEventListener('click', function(event) {
  if (!abrirModal.contains(event.target) && !modal.contains(event.target)) {
    modal.classList.remove('show');
  }
});


// abrirModal.addEvenListener('click', showModal)