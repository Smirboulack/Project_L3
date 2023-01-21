
function etape_suivconnex(){
  if (window.confirm("Inscription réussis ! Passer à la connexion ?")) {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'inscription.php?subscribe=oui', true);
    xhr.send();
    xhr.onreadystatechange = function () {
      if (xhr.readyState == XMLHttpRequest.DONE) {
        window.location.href = 'connexion.php';
      }
    }
  }
}

function temps_de_connexion(){
  var loginTime = new Date();
  setInterval(function() {
  var timeElapsed = (new Date() - loginTime) / 1000;
  var hours = Math.floor(timeElapsed / 3600);
  var minutes = Math.floor((timeElapsed % 3600) / 60);
  var seconds = Math.floor(timeElapsed % 60);
  document.getElementById("connex_ok").innerHTML = "Vous êtes connecté depuis : " + hours + "Heures:" + minutes + "Minutes:" + seconds + "secondes.";
  }, 1000);
}

