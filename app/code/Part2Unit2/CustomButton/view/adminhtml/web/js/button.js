define([
    "Magento_Ui/js/form/components/button",
    "Magento_Ui/js/modal/confirm",
    "jquery"
], (Component, modalConfirm, $) => {
    "use strict";

    return Component.extend({

    action: function () {
        modalConfirm({
            content: "Hello World",
            opened: function() {
                $('body').trigger('contentUpdated');
            },
            buttons: [{
                text: 'Cancel',
                class: 'action-primary action-dismiss',
                click: function (event) {
                    this.closeModal(event);
                }
            }]
        });
    }
    });
});