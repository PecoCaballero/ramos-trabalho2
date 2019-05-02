function deleta_usuario(user) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "./logica/deleta_usuario.php?user=" + user, true);
    xhttp.send(location.reload());
}