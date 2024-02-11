"use strict";
var KTSignupGeneral = function () {
    var e;
    var t; 
    var a; 
    var s;

    var r = function () {
        return 100 === s.getScore()
    };

    return {
        init: function () {
            e = document.querySelector("#kt_sign_up_form");
            t = document.querySelector("#kt_sign_up_submit");
            s = KTPasswordMeter.getInstance(e.querySelector('[data-kt-password-meter="true"]'));
            a = FormValidation.formValidation(e, {
                fields: {
                    "first-name": {
                        validators: { notEmpty: { message: "First Name is required" } }
                    }, "last-name": {
                        validators: { notEmpty: { message: "Last Name is required" } }
                    }, email: {
                        validators: {
                            notEmpty: { message: "Email address is required" },
                            emailAddress: {
                                message: "The value is not a valid email address"
                            }
                        }
                    }, password: {
                        validators: { notEmpty: { message: "The password is required" }, callback: { message: "Please enter valid password", callback: function (e) { if (e.value.length > 0) return r() } } }
                    }, "confirm-password": {
                        validators: {
                            notEmpty: {
                                message: "The password confirmation is required"
                            }, identical: { compare: function () { return e.querySelector('[name="password"]').value }, message: "The password and its confirm are not the same" }
                        }
                    }, toc: {
                        validators: { notEmpty: { message: "You must accept the terms and conditions" } }
                    }
                }, plugins: { trigger: new FormValidation.plugins.Trigger({ event: { password: !1 } }), bootstrap: new FormValidation.plugins.Bootstrap5({ rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: "" }) }
            });

            t.addEventListener("click", (function (r) {
                r.preventDefault();
                a.revalidateField("password");
                a.validate().then((function (a) {

                    if (a == 'Valid') {

                        t.setAttribute("data-kt-indicator", "on");
                        t.disabled = !0;

                        axios({
                            method: 'post',
                            url: routeSignUp,
                            data: {
                                first_name: document.getElementById('first_name').value,
                                last_name: document.getElementById('last_name').value,
                                email: document.getElementById('email').value,
                                password: document.getElementById('password').value
                            }
                        }).then((response) => {

                            t.setAttribute("data-kt-indicator", "off");
                            t.disabled = !1;

                           if (response.data.status == 'success') {
                            
                                Swal.fire({
                                    text: response.data.message,
                                    icon: response.data.status,
                                    buttonsStyling: !1,
                                    confirmButtonText: "OK",
                                    customClass: { confirmButton: "btn btn-primary" }
                                }).then((function (t) {
                                    window.location.href = routeSignIn;
                                }))

                           } else {

                                Swal.fire({
                                    text: response.data.message,
                                    icon: response.data.status,
                                    buttonsStyling: !1,
                                    confirmButtonText: "OK",
                                    customClass: { confirmButton: "btn btn-primary" }
                                })

                           }

                        });

                    } else {

                        Swal.fire({
                            text: "Verifique o formulário",
                            icon: "warning",
                            buttonsStyling: !1,
                            confirmButtonText: "OK",
                            customClass: { confirmButton: "btn btn-primary" }
                        })

                    }

                }))
            }));

            e.querySelector('input[name="password"]').addEventListener("input", (function () {
                this.value.length > 0 && a.updateFieldStatus("password", "NotValidated")
            }))
        }
    }
}(); KTUtil.onDOMContentLoaded((function () { KTSignupGeneral.init() }));