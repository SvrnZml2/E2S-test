// Asynchrony and APIs in JavaScript Making API Calls with jQuery

$(document).ready(function() {
  $('#weatherLocation').click(function() {
    let city = $('#location').val();
    $('#location').val("");
    $.ajax({
      url: `http://api.openweathermap.org/data/2.5/weather?q=${city}&appid=a2ef1a674feb2e76847bcb3a22879fc5`,
      type: 'GET',
      data: {
        format: 'json'
      },
      success: function(response) {
        $('.showHumidity').text(`L'humidité à ${city} est de ${response.main.humidity}%`);
        $('.showTemp').text(`La température en Kelvins est de ${response.main.temp}.`);
      },
      error: function() {
        $('.errors').text("Il y a eu une erreur lors du traitement de votre demande. Veuillez réessayer.")
      }
    });
  });
});