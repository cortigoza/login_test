postData = (path, method, request) => {
    const result = $.ajax({
        method: method,
        url: path,
        dataType: "json",
        data: request
    })
    return result;
}

$("form#login").submit((event) => {
    event.preventDefault();
    data = { "username": $("input#username").val(), "password": $("input#password").val() }
    postData("controllers/controller.php?login", "POST", $("form#login").serialize()).done(json => {
        if (json.resp) {
            window.location = "views/dashboard.php"
        } else {
            alert("usuario incorrecto")
        }
    });
});

$("form#signup").submit((event) => {
    event.preventDefault();
    postData("../controllers/controller.php?signup", "POST", $("form#signup").serialize()).done(json => {
        if (json.resp) {
            alert("Usuario Registrado");
            location.reload();
        } else {
            alert("No fue posible agregar usuario intentalo de nuevo");
        }
    });
});


$("form#editUser").submit((event) => {
    event.preventDefault();
    postData("../controllers/controller.php?editUser", "POST", $("form#editUser").serialize()).done(json => {
        if (json.resp) {
            alert("Usuario Editado");
            location.reload();
        } else {
            alert("No fue posible editar usuario intentalo de nuevo");
        }
    });
});

searchUsers = () => {
    postData("../controllers/controller.php?users", "GET").done(json => {
        json.resp.forEach(element => {
            $("#table_users").append(
                '<tr><td class="id_user">' + element.id + '</td><td>' + element.user_name + '</td><td>' + element.email + '</td><td>' + element.name +
                '</td><td>' + element.profile + '</td><td>' + element.status +
                '</td><td><button class="btn btn-warning editUser" id=' + element.id + '>Editar</button></td><td><button class="btn btn-danger deleteUser" id=' + element.id + '>Borrar</button></td></tr>')
        });
    });
}


$("table#table_users").on("click", ".deleteUser", (element) => {
    data = { "id": element.target.id }
    postData("../controllers/controller.php?delete", "POST", data).done(json => {
        if (json.resp) {
            alert("Usuario Ha sido removido");
            location.reload();
        } else {
            alert("No fue posible elimar usuario intentalo de nuevo");
        }
    });
});

$("table#table_users").on("click", ".editUser", (element) => {
    data = { "id": element.target.id }
    postData("../controllers/controller.php?user", "POST", data).done(json => {
        if (json.resp) {
            $("#miModal").modal("show");
            formEdit = $("form#editUser");
            formEdit.find("#editName").val(json.resp.name)
            formEdit.find("#editUsername").val(json.resp.user_name)
            formEdit.find("#editEmail").val(json.resp.email)
            formEdit.find("#editProfile").val(json.resp.profile)
            formEdit.find("#editStatus").val(json.resp.status)
            formEdit.find("#editPassword").val(json.resp.password)
            formEdit.find("#idUser").val(json.resp.id)
            
        }
    });
    
});

$("#closeModal").click(() => {
    $("#miModal").modal("hide");
})