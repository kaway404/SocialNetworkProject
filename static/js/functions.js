$(document).ready(function() {
    $("#cadastrar").click(function() {
        var email = $("#email");
        var emailPost = email.val();
        var senha = $("#senha");
        var senhaPost = senha.val();
        var usuario = $("#usuario");
        var usuarioPost = usuario.val();
        var nome = $("#nome");
        var nomePost = nome.val();
        var sobrenome = $("#sobrenome");
        var sobPost = sobrenome.val();
        $.post("/static/php/register.php", {email: emailPost, senha: senhaPost, usuario: usuarioPost, nome: nomePost, sobrenome: sobPost},
        function(data){
         $("#error").html(data);
         }
         , "html");
         return false;
    });
});

$(document).ready(function() {
    $("#login").click(function() {
        var email = $("#email-h");
        var emailPost = email.val();
        var senha = $("#senha-h");
        var senhaPost = senha.val();
        $.post("/static/php/login.php", {email: emailPost, senha: senhaPost},
        function(data){
         $("#errorlogin").html(data);
         }
         , "html");
         return false;
    });
});