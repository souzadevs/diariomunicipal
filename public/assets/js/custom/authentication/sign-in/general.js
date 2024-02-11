"use strict";
var KTSigninGeneral = function () {
    var formElement, btnSubmitElement, formValidator;
    return {
        init: function () {

            formElement = document.querySelector("#kt_sign_in_form");
            btnSubmitElement = document.querySelector("#kt_sign_in_submit");

            formValidator = FormValidation.formValidation(formElement, {
                fields: {
                    email: {
                        validators: {
                            notEmpty: { message: "Email obrigatório" },
                            emailAddress: { message: "Formato de email inválido" }
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: { message: "Senha obrigatória" }
                        }
                    }
                },
                plugins: { trigger: new FormValidation.plugins.Trigger, bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row" }) }
            });

            btnSubmitElement.addEventListener("click", (function (e) {

                e.preventDefault();

                formValidator.validate().then((function (i) {

                    if (i == 'Valid') {

                        // Fazer consulta ajax com as credenciai

                        btnSubmitElement.setAttribute("data-kt-indicator", "on");

                        axios({
                            method: 'post',
                            url: routeSignIn,
                            data: {
                                email: document.getElementById('email').value,
                                password: document.getElementById('password').value
                            }
                        }).then((response) => {

                            btnSubmitElement.setAttribute("data-kt-indicator", "off");

                            if (response.data.status == 'error') {

                                Swal.fire({
                                    text: response.data.message,
                                    icon: response.data.status,
                                    buttonsStyling: !1,
                                    confirmButtonText: "OK",
                                    customClass: { confirmButton: "btn btn-primary" }
                                })

                            } else {
                                btnSubmitElement.removeAttribute("data-kt-indicator");
                                btnSubmitElement.disabled = !1;
                                Swal.fire({
                                    text: "Você foi autênticado com sucesso!",
                                    icon: "success",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, vamos lá!",
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then(
                                    (function (e) {
                                        e.isConfirmed && (formElement.querySelector('[name="email"]').value = "",
                                            formElement.querySelector('[name="password"]').value = "")

                                        window.location.href = '/';
                                    }))
                            }
                        })

                        btnSubmitElement.setAttribute("data-kt-indicator", "off");
                        // btnSubmitElement.disabled = !0;

                    } else {

                        Swal.fire({
                            text: "Verifique o formulário.",
                            icon: "warning",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok!",
                            customClass: { confirmButton: "btn btn-primary" }
                        })

                    }

                }))
            }))
        }
    }
}();
KTUtil.onDOMContentLoaded((function () { KTSigninGeneral.init() }));