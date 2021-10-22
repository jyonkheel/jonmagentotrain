define(["uiComponent"], (Component) => {
    "use strict";

    return Component.extend({
        defaults: {
            simple: "Hello World"
        },
        initialize: function () {
            this._super();
            console.log("Hello World");
        }
    })
});