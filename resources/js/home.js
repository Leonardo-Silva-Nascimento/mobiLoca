$(document).ready(function () {
    $('.dataTable').DataTable();

    $('#createRental').click(function () {
        $('#createRentalModal').modal('show');
    });

    $('#createCustomer').click(function () {
        $('#createCustomerModal').modal('show');
    });

    $('#createSeller').click(function () {
        $('#createSellerModal').modal('show');
    });

    $('#createCellPhone').click(function () {
        $('#createCellPhoneModal').modal('show');
    });

    $('#submitRental').click(function () {
        const rentalData = {
            cliente: $('#cliente').val(),
            valor: $('#valor').val(),
            celular: $('#celular').val(),
            expiration: $('#expiration').val()
        };
        $.ajax({
            url: '/WebController/createRental',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(rentalData),
            success: function (response) {
                console.log('Aluguel criado com sucesso:', response);
                $('#createRentalModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao criar aluguel:', error);
                alert('Erro ao criar aluguel.');
            }
        });
    });

    $('#submitCustomer').click(function () {
        const customerData = {
            nome: $('#nome').val(),
            sobrenome: $('#sobrenome').val(),
            email: $('#email').val(),
            senha: $('#password').val()
        };
        $.ajax({
            url: '/WebController/createCustomers',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(customerData),
            success: function (response) {
                console.log('Cliente criado com sucesso:', response);
                $('#createCustomerModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao criar cliente:', error);
                alert('Erro ao criarpassword cliente.');
            }
        });
    });

    $('#createRental').click(function () {
        $.ajax({
            url: '/WebController/getRental',
            type: 'GET',
            data: { id: rentalId },
            success: function (response) {
                $('#cliente').empty().append('<option value="" disabled selected>Selecione um cliente</option>');
                response.customers.forEach(function (customer) {
                    $('#cliente').append('<option value="' + customer.id + '">' + customer.name + '</option>');
                });

                $('#celular').empty().append('<option value="" disabled selected>Selecione um celular</option>');
                response.cellphones.forEach(function (cellphone) {
                    $('#celular').append('<option value="' + cellphone.id + '">' + cellphone.number + '</option>');
                });
            },
            error: function (error) {
                alert('Erro ao obter dados de aluguel.');
            }
        });
    });

    $('#submitSeller').click(function () {
        const sellerData = {
            nome: $('#nome').val(),
            sobrenome: $('#sobrenome').val(),
            email: $('#email').val(),
            senha: $('#password').val()
        };
        $.ajax({
            url: '/WebController/createSellers',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(sellerData),
            success: function (response) {
                console.log('Vendedor criado com sucesso:', response);
                $('#createSellerModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao criar vendedor:', error);
                alert('Erro ao criar vendedor.');
            }
        });
    });

    $('#submitCellPhone').click(function () {
        const phoneData = {
            marca: $('#marca').val(),
            modelo: $('#modelo').val(),
            lançado_em: $('#lançado_em').val()
        };
        $.ajax({
            url: '/WebController/createCellPhones',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(phoneData),
            success: function (response) {
                console.log('Celular criado com sucesso:', response);
                $('#createCellPhoneModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao criar celular:', error);
                alert('Erro ao criar celular.');
            }
        });
    });


    function showEditModal(modalId, data) {
        for (let key in data) {
            if (data.hasOwnProperty(key)) {
                $('#' + modalId + ' [id="edit_' + key + '"]').val(data[key]);
            }
        }
        $('#' + modalId).modal('show');
    }

    $('.edit-rental').click(function () {
        var rentalId = $(this).attr('rental-id');

        $.ajax({
            url: '/WebController/getInfoForEditRental',
            type: 'GET',
            data: { id: rentalId },
            success: function (response) {
                showEditModal('editRentalModal', response);
            },
            error: function (error) {
                alert('Erro ao obter dados do aluguel.');
            }
        });
    });

    $('.edit-customer').click(function () {
        var customerId = $(this).attr('customer-id');

        $.ajax({
            url: '/WebController/getInfoForEditCustomers',
            type: 'GET',
            data: { id: customerId },
            success: function (response) {
                showEditModal('editCustomerModal', response);
            },
            error: function (error) {
                alert('Erro ao obter dados do cliente.');
            }
        });
    });

    $('.edit-seller').click(function () {
        var sellerId = $(this).attr('seller-id');

        $.ajax({
            url: '/WebController/getInfoForEditSellers',
            type: 'GET',
            data: { id: sellerId },
            success: function (response) {
                showEditModal('editSellerModal', response);
            },
            error: function (error) {
                alert('Erro ao obter dados do vendedor.');
            }
        });
    });

    $('.edit-cell').click(function () {
        var phoneId = $(this).attr('phone-id');

        $.ajax({
            url: '/WebController/getInfoForEditCellPhones',
            type: 'GET',
            data: { id: phoneId },
            success: function (response) {
                showEditModal('editCellPhoneModal', response);
            },
            error: function (error) {
                alert('Erro ao obter dados do celular.');
            }
        });
    });


    function showModal(message, callback) {
        $('#alertModalBody').text(message);
        $('#alertModal').modal('show');

        $('#alertModalButton').off('click').on('click', function () {
            $('#alertModal').modal('hide');
            if (callback) callback();
        });
    }

    $('.delete-rental').click(function () {
        var rentalId = $(this).attr('rental-id');

        $.ajax({
            url: '/WebController/deleteRentals',
            type: 'POST',
            data: { id: rentalId },
            success: function (response) {
                showModal('Aluguel excluído com sucesso.', function () {
                    location.reload();
                });
            },
            error: function (error) {
                showModal('Erro ao excluir aluguel.');
            }
        });
    });

    $('.delete-customer').click(function () {
        var customerId = $(this).attr('customer-id');

        $.ajax({
            url: '/WebController/deleteCustomers',
            type: 'POST',
            data: { id: customerId },
            success: function (response) {
                showModal('Cliente excluído com sucesso.', function () {
                    location.reload();
                });
            },
            error: function (error) {
                showModal('Erro ao excluir cliente.');
            }
        });
    });

    $('.delete-seller').click(function () {
        var sellerId = $(this).attr('seller-id');

        $.ajax({
            url: '/WebController/deleteSellers',
            type: 'POST',
            data: { id: sellerId },
            success: function (response) {
                showModal('Vendedor excluído com sucesso.', function () {
                    location.reload();
                });
            },
            error: function (error) {
                showModal('Erro ao excluir vendedor.');
            }
        });
    });

    $('.delete-cell').click(function () {
        var phoneId = $(this).attr('phone-id');

        $.ajax({
            url: '/WebController/deleteCellPhones',
            type: 'POST',
            data: { id: phoneId },
            success: function (response) {
                showModal('Celular excluído com sucesso.', function () {
                    location.reload();
                });
            },
            error: function (error) {
                showModal('Erro ao excluir celular.');
            }
        });
    });

    $('#editSubmitRental').click(function () {
        const rentalData = {
            id: $('#edit_id').val(),
            cliente: $('#edit_cliente').val(),
            valor: $('#edit_valor').val(),
            celular: $('#edit_celular').val(),
            expiration: $('#edit_expiration').val()
        };
        $.ajax({
            url: '/WebController/updateRental',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(rentalData),
            success: function (response) {
                console.log('Aluguel atualizado com sucesso:', response);
                $('#editRentalModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao atualizar aluguel:', error);
                alert('Erro ao atualizar aluguel.');
            }
        });
    });

    $('#editSubmitCustomer').click(function () {
        const customerData = {
            id: $('#edit_id').val(),
            nome: $('#edit_nome').val(),
            sobrenome: $('#edit_sobrenome').val(),
            email: $('#edit_email').val(),
            password: $('#edit_password').val()
        };
        $.ajax({
            url: '/WebController/updateCustomers',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(customerData),
            success: function (response) {
                console.log('Cliente atualizado com sucesso:', response);
                $('#editCustomerModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao atualizar cliente:', error);
                alert('Erro ao atualizar cliente.');
            }
        });
    });

    $('#editSubmitSeller').click(function () {
        const sellerData = {
            id: $('#edit_id').val(),
            nome: $('#edit_nome').val(),
            sobrenome: $('#edit_sobrenome').val(),
            email: $('#edit_email').val(),
            password: $('#edit_password').val()
        };
        $.ajax({
            url: '/WebController/updateSellers',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(sellerData),
            success: function (response) {
                console.log('Vendedor atualizado com sucesso:', response);
                $('#editSellerModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao atualizar vendedor:', error);
                alert('Erro ao atualizar vendedor.');
            }
        });
    });

    $('#submitEditCellPhone').click(function () {
        const phoneData = {
            id: $('#edit_id').val(),
            marca: $('#edit_marca').val(),
            modelo: $('#edit_modelo').val(),
            lançado_em: $('#edit_lançado_em').val()
        };
        $.ajax({
            url: '/WebController/updateCellPhones',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(phoneData),
            success: function (response) {
                console.log('Celular atualizado com sucesso:', response);
                $('#editCellPhoneModal').modal('hide');
            },
            error: function (error) {
                console.error('Erro ao atualizar celular:', error);
                alert('Erro ao atualizar celular.');
            }
        });
    });


});
