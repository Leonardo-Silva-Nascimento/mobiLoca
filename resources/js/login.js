$(document).ready(function () {

    $('#forgotPass').on('click', function () {
        $('#forgotPassword').modal('show');
    });

    $('#firstAcess').on('click', function () {
        $('#createAcount').modal('show');
    });

    $('#loginForm').on('submit', function (event) {
        event.preventDefault();
        let email = $('#email').val();
        let password = $('#senha').val();

        $.ajax({
            url: '/WebController/actionLogin',
            method: 'POST',
            data: {
                email: email,
                password: password,
            },
            success: function (response) {
                alert('Login realizado com sucesso');
                window.location.href = '/home';
            },
            error: function (error) {
                alert('Erro ao realizar login');
            }
        });
    });

    $('#btn-forgotPassword').on('click', function (event) {
        event.preventDefault();
        let email = $('#forgotMail').val();

        if (validateEmail(email)) {
            $.ajax({
                url: '/WebController/forgotPassword',
                method: 'POST',
                data: {
                    email: email,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    alert('Solicitação de redefinição de senha enviada');
                    window.location.href = '/'
                },
                error: function (error) {
                    alert('Erro ao enviar solicitação');
                }
            });
        } else {
            alert('Por favor, insira um email válido.');
        }
    });

    $('#btn-createAcount').on('click', function (event) {
        event.preventDefault();
        let name = $('#newName').val();
        let secondName = $('#newSecondName').val();
        let email = $('#newEmail').val();
        let password = $('#newPassword').val();
        let confirmPassword = $('#confirmNewPassword').val();

        if (name && secondName && validateEmail(email) && password && password === confirmPassword) {
            $.ajax({
                url: '/WebController/createSeller',
                method: 'POST',
                data: {
                    nome: name,
                    sobrenome: secondName,
                    email: email,
                    senha: password,
                },
                success: function (response) {
                    alert('Conta criada com sucesso');
                    window.location.href = '/login';
                },
                error: function (error) {
                    alert('Erro ao criar conta');
                }
            });
        } else {
            alert('Por favor, preencha todos os campos corretamente.');
        }
    });

    function validateEmail(email) {
        let regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        return regex.test(email);
    }
});