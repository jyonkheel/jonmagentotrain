define(["uiComponent"], (Component) => {
    "use strict";

    return Component.extend({
        defaults: {
            imports: {
                _list: '${$.provider}:data.list'
            },
            tracks: {
                list: true,
                output: true
            },
            list: [],
            output: [],
        },

        initialize: function () {
            this._super();
            this.add();
        },

        add: function () {
            this.output.push({text: "name"});
            this.output.push({text: "lastname"});
        },

        _list: function (list) {
            for (let i in list) {
                list[i].output = this.output;
                this.list.push(list[i]);
            }
        }
    });
});