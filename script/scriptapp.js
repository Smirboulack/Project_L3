if (window.location.href == "http://www.monsite.com/page_specifique.html") {
  document.getElementById('form_insc').addEventListener('submit', function (e) {

    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let passwordconfirm = document.getElementById('passwordconfirm');
    let email = document.getElementById('email');
    let date = document.getElementById('date');
    let mail_autoriser = ['outlook.com', 'gmail.com', 'hotmail.com', 'hotmail.fr', 'outlook.fr'];
    let domain = email.value.toLowerCase();
    domain = domain.substr(domain.lastIndexOf('@') + 1);
    let error = false;

    if (username.value === "" || password.value === "" || passwordconfirm.value === "" || email.value === "" || date.value === "") { error = true; }
    if (username.value.length < 5 || username.value.length > 15) { error = true; }
    if (password.value.length < 10) { error = true; }
    if (!/[A-Z]/.test(password.value)) { error = true; }
    if (!/[0-9]/.test(password.value)) { error = true; }
    if (password.value !== passwordconfirm.value) { error = true; }
    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) { error = true; }
    if (!/^\d{4}-\d{2}-\d{2}$/.test(date.value)) { error = true; }
    if (!mail_autoriser.includes(domain)) { error = true; }
    if (error == false && window.confirm("Inscription réussis ! Passer à la connexion ?")) {
      let xhr = new XMLHttpRequest();
      xhr.open('GET', 'inscription.php?subscribe=oui', true);
      xhr.send();
      xhr.onreadystatechange = function () {
        if (xhr.readyState == XMLHttpRequest.DONE) {
          window.location.href = 'connexion.php';
        }
      }
    }
  });
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

