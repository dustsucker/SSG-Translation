panel.plugin("symcon/textareaButtons", {
    textareaButtons: {
        dothings: {
            label: "Do Something",
            icon: "check",
            click: function () {
                console.log("Something to do");
                this.command("insert", "blub");
            }
        }
    }
});