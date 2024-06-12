<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MobiLoca</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Minha Aplicação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#rentalsTable">Aluguéis <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#customersTable">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sellersTable">Vendedores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#cellphoneTable">Celulares</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5">
        <h2 class="mb-4">Aluguéis <button class="btn btn-primary" id="createRental">Criar Novo Aluguel</button></h2>
        <table class="dataTable" id="rentalsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th>Celular</th>
                    <th>Status</th>
                    <th>Data de Início</th>
                    <th>Data de Término</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rentals as $rental)
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ $rental->cliente->nome . ' ' . $rental->cliente->sobrenome}}</td>
                        <td>{{ $rental->valor }}</td>
                        <td>{{ $rental->phone->modelo }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>{{ $rental->data_inicio }}</td>
                        <td>{{ $rental->data_termino }}</td>
                        <td><i class="bi bi-pencil edit-rental" rental-id="{{ $rental->id }}"></i> <i
                                class="bi bi-trash delete-rental" rental-id="{{ $rental->id }}"></i> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h2 class="mb-4">Clientes <button class="btn btn-primary" id="createCustomer">Criar Novo Cliente</button></h2>
        <table class="dataTable" id="customersTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nome</th>
                    <th>Email</th>
                    <th>Criado</th>
                    <th>Atualizado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->nome . ' ' . $customer->sobrenome}}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->created }}</td>
                        <td>{{ $customer->updated }}</td>
                        <td><i class="bi bi-pencil edit-customer" customer-id="{{ $customer->id }}"></i> <i
                                class="bi bi-trash delete-customer" customer-id="{{ $customer->id }}"></i> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h2 class="mb-4">Vendedores <button class="btn btn-primary" id="createSeller">Criar Novo Vendedor</button></h2>
        <table class="dataTable" id="sellersTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>nome</th>
                    <th>Email</th>
                    <th>Criado</th>
                    <th>Atualizado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sellers as $seller)
                    <tr>
                        <td>{{ $seller->id }}</td>
                        <td>{{ $seller->nome . ' ' . $seller->sobrenome}}</td>
                        <td>{{ $seller->email }}</td>
                        <td>{{ $seller->created }}</td>
                        <td>{{ $seller->updated }}</td>
                        <td><i class="bi bi-pencil edit-seller" seller-id="{{ $seller->id }}"></i> <i
                                class="bi bi-trash delete seller" seller-id="{{ $seller->id }}"></i> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h2 class="mb-4">Celulares <button class="btn btn-primary" id="createCellphone">Criar Novo Celular</button></h2>
        <table class="dataTable" id="cellphoneTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Status</th>
                    <th>Lançado em</th>
                    <th>Adicionado</th>
                    <th>Atualizado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cellphones as $cellphone)
                    <tr>
                        <td>{{ $cellphone->id }}</td>
                        <td>{{ $cellphone->marca }}</td>
                        <td>{{ $cellphone->modelo }}</td>
                        <td>{{ $cellphone->status }}</td>
                        <td>{{ $cellphone->lancado_em }}</td>
                        <td>{{ $cellphone->created }}</td>
                        <td>{{ $cellphone->updated }}</td>
                        <td> <i class="bi bi-pencil edit-cell" phone-id="{{ $cellphone->id }}"></i> <i
                                class="bi bi-trash delete cell" phone-id="{{ $cellphone->id }}"></i> </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal para criar novo aluguel -->
    <div class="modal fade" id="createRentalModal" tabindex="-1" role="dialog" aria-labelledby="createRentalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createRentalModalLabel">Criar Novo Aluguel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para criar um novo aluguel -->
                    <div class="form-group">
                        <label for="cliente">Cliente</label>
                        <select class="form-control" id="cliente">
                            <option value="" disabled selected>Selecione um cliente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input type="text" class="form-control" id="valor">
                    </div>
                    <div class="form-group">
                        <label for="celular">Celular</label>
                        <select class="form-control" id="celular">
                            <option value="" disabled selected>Selecione um celular</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="expiration">Expira em</label>
                        <input type="text" class="form-control" id="expiration">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitRental">Salvar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal para criar novo Cliente -->
    <div class="modal fade" id="createCustomerModal" tabindex="-1" role="dialog"
        aria-labelledby="createCustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCustomerModalLabel">Criar Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para criar um novo Cliente -->
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitCustomer">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para criar novo vendedor -->
    <div class="modal fade" id="createSellerModal" tabindex="-1" role="dialog" aria-labelledby="createSellerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSellerModalLabel">Criar Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para criar um novo Vendedor -->
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" id="nome">
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitSeller">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para criar novo celular -->
    <div class="modal fade" id="createCellPhoneModal" tabindex="-1" role="dialog"
        aria-labelledby="createCellPhoneModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCellPhoneModalLabel">Criar Novo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para criar um novo Vendedor -->
                    <div class="form-group">
                        <label for="marca">Marca</label>
                        <input type="text" class="form-control" id="marca">
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo</label>
                        <input type="text" class="form-control" id="modelo">
                    </div>
                    <div class="form-group">
                        <label for="lançado_em">Lançado Em</label>
                        <input type="date" class="form-control" id="lançado_em">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitCellPhone">Salvar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- ############## 
                    
                    
                         MODAL DE EDIÇÃO A PARTIR DAQUI  
                         
                         
    ############## -->

    <!-- Modal para editar aluguel -->
    <div class="modal fade" id="editRentalModal" tabindex="-1" role="dialog" aria-labelledby="editRentalModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRentalModalLabel">Editar Aluguel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para editar aluguel -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="edit_id">
                        <label for="edit_cliente">Cliente</label>
                        <input type="text" class="form-control" id="edit_cliente">
                    </div>
                    <div class="form-group">
                        <label for="edit_valor">Valor</label>
                        <input type="text" class="form-control" id="edit_valor">
                    </div>
                    <div class="form-group">
                        <label for="edit_celular">Celular</label>
                        <input type="text" class="form-control" id="edit_celular">
                    </div>
                    <div class="form-group">
                        <label for="edit_expiration">Expira em</label>
                        <input type="date" class="form-control" id="edit_expiration">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="editSubmitRental">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar Cliente -->
    <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Editar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para editar Cliente -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="edit_id">
                        <label for="edit_nome">Nome</label>
                        <input type="text" class="form-control" id="edit_nome">
                    </div>
                    <div class="form-group">
                        <label for="edit_sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="edit_sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email">
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Senha</label>
                        <input type="password" class="form-control" id="edit_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="editSubmitCustomer">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar vendedor -->
    <div class="modal fade" id="editSellerModal" tabindex="-1" role="dialog" aria-labelledby="editSellerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSellerModalLabel">Editar Vendedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para editar Vendedor -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="edit_id">
                        <label for="edit_nome">Nome</label>
                        <input type="text" class="form-control" id="edit_nome">
                    </div>
                    <div class="form-group">
                        <label for="edit_sobrenome">Sobrenome</label>
                        <input type="text" class="form-control" id="edit_sobrenome">
                    </div>
                    <div class="form-group">
                        <label for="edit_email">Email</label>
                        <input type="email" class="form-control" id="edit_email">
                    </div>
                    <div class="form-group">
                        <label for="edit_password">Senha</label>
                        <input type="password" class="form-control" id="edit_password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="editSubmitSeller">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar celular -->
    <div class="modal fade" id="editCellPhoneModal" tabindex="-1" role="dialog"
        aria-labelledby="editCellPhoneModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCellPhoneModalLabel">Editar Celular</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Inputs para editar um celular -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="edit_id">
                        <label for="edit_marca">Marca</label>
                        <input type="text" class="form-control" id="edit_marca">
                    </div>
                    <div class="form-group">
                        <label for="edit_modelo">Modelo</label>
                        <input type="text" class="form-control" id="edit_modelo">
                    </div>
                    <div class="form-group">
                        <label for="edit_lançado_em">Lançado Em</label>
                        <input type="date" class="form-control" id="edit_lançado_em">
                    </div>
                    <div class="form-group">
                        <label for="edit_status">Status</label>
                        <input type="date" class="form-control" id="edit_status">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" id="submitEditCellPhone">Salvar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal de alertas -->
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="alertModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="alertModalLabel">Aviso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="alertModalBody">
                    <!-- Mensagem será inserida aqui -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="alertModalButton">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
</body>

</html>