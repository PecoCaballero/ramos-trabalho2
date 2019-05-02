

function deleta_usuario(user) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "/pw2/trabalho2/logica/deleta_usuario.php?user=" + user, true);
    xhttp.send(location.reload());
}