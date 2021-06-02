$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover();

    jQuery.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "Campo obrigatório!",
        remote: "Por favor, corrija este campo.",
        email: "Por favor, forneça um e-mail válido.",
        url: "Por favor, forneça uma URL válida.",
        date: "Por favor, forneça uma data válida.",
        dateISO: "Por favor, forneça uma data válida (ISO).",
        number: "Por favor, forneça um número válido.",
        digits: "Por favor, forneça somente dígitos.",
        creditcard: "Por favor, forneça um cartão de crédito válido.",
        equalTo: "Por favor, forneça o mesmo valor novamente.",
        accept: "Por favor, forneça um valor com uma extensão válida.",
        maxlength: jQuery.validator.format("Por favor, forneça não mais que {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, forneça ao menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, forneça um valor entre {0} e {1} caracteres de comprimento."),
        range: jQuery.validator.format("Por favor, forneça um valor entre {0} e {1}."),
        max: jQuery.validator.format("Por favor, forneça um valor menor ou igual a {0}."),
        min: jQuery.validator.format("Por favor, forneça um valor maior ou igual a {0}.")
    });

    $("#form_register").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            cpf_cnpj: {
                cpfBR: true,
                require: false
            },
            password: {
                minlength: 8
            },
            password_confirmation: {
                minlength: 8,
                equalTo: "#password"
            }

        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("#form_password_reset").validate({
        rules: {
            user_password_old: {
                required: true,
                minlength: 8
            },
            user_password_new: {
                required: true,
                minlength: 8
            },
            user_password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#user_password_new"
            }

        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $("#form_password_link").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $("#form_password_update").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            }

        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    $('#birth_date').mask("00/00/0000", { placeholder: "__/__/____" });
    $('#cpf_cnpj').mask('000.000.000-00', { reverse: true });

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('#mobile').mask(SPMaskBehavior, spOptions);
    $('#zipcode').mask('00000-000');
    $('#phone').mask('(00) 0000-0000');
    $('#rg').mask('00.000.000-0');

    $('[name="gender"]').on('change', function (e) {
        switch (parseInt(e.target.value)) {
            case 1:
            case 2:
            default:
                $('[for="name"]').text('Nome Completo');
                $('[for="cpf_cnpj"]').text('Cpf');
                $('#rg').parent('.form-group').show();
                $('#birth_date').parent('.form-group').show();
                $('#cpf_cnpj').rules('remove');
                $('#cpf_cnpj').rules('add', {
                    cpfBR: true
                });
                $('#cpf_cnpj').mask('000.000.000-00', { reverse: true });
                break;
            case 3:
                $('[for="name"]').text('Razão Social');
                $('[for="cpf_cnpj"]').text('Cnpj');
                $('#rg').val(null);
                $('#rg').parent('.form-group').hide();
                $('#birth_date').val(null);
                $('#birth_date').parent('.form-group').hide();
                $('#cpf_cnpj').val(null);
                $('#cpf_cnpj').rules('remove');
                $('#cpf_cnpj').rules('add', {
                    cnpjBR: true
                });
                $("#cpf_cnpj").mask("00.000.000/0000-00", { reverse: true });
                break;
        }
    });

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#address").val(null);
        $("#district").val(null);
        $("#city").val(null);
        $("#state").val(null);
        $('#zipcode').nextAll('span').remove();
    }

    //Quando o campo cep perde o foco.
    $("#zipcode").blur(function () {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if (validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#address").val("...");
                $("#district").val("...");
                $("#city").val("...");
                $("#state").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#address").val(dados.logradouro);
                        $("#district").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#state").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        $('#zipcode').after(`
                            <span class="error invalid-feedback">Cep não encontrado.</span>
                        `);
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                $('#zipcode').after(`
                    <span class="error invalid-feedback">Formato de cep inválido.</span>
                `);
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
