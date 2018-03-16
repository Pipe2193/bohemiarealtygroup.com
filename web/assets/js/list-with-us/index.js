/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $('#list_with_us_form').formValidation({
        framework: 'foundation',
        err: {
            container: 'tooltip'
        },
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        addOns: {
            mandatoryIcon: {
                icon: 'glyphicon glyphicon-asterisk'
            }
        },
        fields: {
            "client_name": {
                validators: {
                    notEmpty: {
                        message: ' Biuilding is required'
                    }
                }
            },
            "property_type": {
                validators: {
                    notEmpty: {
                        message: 'Property type  required'
                    }
                }
            },
            "client_email": {
                validators: {
                    notEmpty: {
                        message: ' E-mail is required'
                    },
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'The value is not a valid email address'
                    }

                }
            },
        }
    });
});
