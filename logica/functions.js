function deleta_usuario(user) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./logica/deleta_usuario.php?user=" + user, true);
    xhttp.send(location.reload());
}

function edita_usuario(user) {
    location.href = "/pw2/trabalho2/edita_usuario.php?user=" + user;
}