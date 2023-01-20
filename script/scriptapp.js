document.getElementById('form_insc').addEventListener('submit', function (e) {

    let username = document.getElementById('username');
    let password = document.getElementById('password');
    let passwordconfirm = document.getElementById('passwordconfirm');
    let email = document.getElementById('email');
    let date = document.getElementById('date');
    let mail_autoriser = ['outlook.com', 'gmail.com', 'hotmail.com','hotmail.fr','outlook.fr'];
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
    if (!mail_autoriser.includes(domain)){error=true;}

    if (error == false && window.confirm("Formulaire soumis ! Passer à la connexion ?")) {
        window.location.href='http://localhost/lifkiya/connexion.php';
    }
});

let pions = document.querySelector('#pions');

pions.forEach(function(pion) {
  pion.addEventListener('click', function() {
    this.innerHTML = '';
  })});