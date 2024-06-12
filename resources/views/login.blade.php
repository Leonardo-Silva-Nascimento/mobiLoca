<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-login">
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row justify-content-center">
                            <div class="col-xl-10 col-lg-12 col-md-9">
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <?= $this->Flash->render() ?>

                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                            <div class="col-lg-6">
                                                <div class="p-5">
                                                    <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                                                    </div>
                                                    <form id="loginForm" class="user" method="post"
                                                        action="/users/login">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control form-control-user"
                                                                name="email" id="email" aria-describedby="emailHelp"
                                                                placeholder="nome@email.com">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="password"
                                                                class="form-control form-control-user" name="password"
                                                                id="senha" placeholder="Digite a senha">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-user btn-block">
                                                            <?= __('Login') ?>
                                                        </button>
                                                        <span id="forgotPass"
                                                            class="d-flex justify-content-center mt-2 forgot"
                                                            data-toggle="modal" data-target="#forgotPassword">
                                                            <?=__('Esqueci minha senha')?>
                                                        </span>
                                                        <span id="firstAcess"
                                                            class="d-flex justify-content-center mt-2 forgot"
                                                            data-toggle="modal" data-target="#createAcount">
                                                            <?=__('Primeiro acesso')?>
                                                        </span>
                                                        <hr>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <i class="fas fa-key"></i><span id='titleMessage'>
                                                            <?= __('Redefinir senha') ?>
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form id='form-forgotPassword' accept-charset="utf-8">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">
                                                                        <label for="forgotMail"
                                                                            id="messageFirstAcess">Informe
                                                                            abaixo seu e-mail cadastrado</label>
                                                                        <input type="email" id="forgotMail"
                                                                            name="forgotMail" class="form-control"
                                                                            #createAcount="required" value=''
                                                                            placeholder="Email">

                                                                        <small
                                                                            class="d-none text-danger helper-msg"></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="btn-forgotPassword" class="btn btn-primary">
                                                                <?= __('Redefinir') ?></a>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="createAcount" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title">
                                                        <i class="fas fa-key"></i><span id='titleMessage'>
                                                            <?= __('Criar uma conta de vendedor') ?>
                                                        </span>
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <form id='form-createAcount' accept-charset="utf-8">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <div class="form-label-group">

                                                                        <label for="newName">Nome</label>
                                                                        <input type="text" id="newName" name="newName"
                                                                            class="form-control" required="required"
                                                                            value='' placeholder="Digite seu nome">

                                                                        <label for="newSecondName">Sobrenome</label>
                                                                        <input type="text" id="newSecondName"
                                                                            name="newSecondName" class="form-control"
                                                                            required="required" value=''
                                                                            placeholder="Digite seu sobrenome">

                                                                        <label for="newEmail">email</label>
                                                                        <input type="email" id="newEmail"
                                                                            name="newEmail" class="form-control"
                                                                            required="required" value=''
                                                                            placeholder="Digite seu email">

                                                                        <label for="newPassword">Senha</label>
                                                                        <input type="password" id="newPassword"
                                                                            name="newPassword" class="form-control"
                                                                            required="required" value=''
                                                                            placeholder="Digite sua senha">

                                                                        <label for="confirmNewPassword">Confirme sua
                                                                            senha</label>
                                                                        <input type="password" id="confirmNewPassword"
                                                                            name="confirmNewPassword"
                                                                            class="form-control" required="required"
                                                                            value=''
                                                                            placeholder="Digite novamente sua senha">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button id="btn-createAcount" class="btn btn-primary">
                                                                <?= __('Cria conta!') ?></a>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>