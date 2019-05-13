function deleta_usuario(user) {
    document.body.style.cursor = 'wait';
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./logica/deleta_usuario.php?user=" + user, true);
    xhttp.send(location.reload());
}

function edita_usuario(user) {
    location.href = "./edita-usuario.php?user=" + user;
}