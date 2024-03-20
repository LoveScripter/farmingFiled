function dropdown(evt) {
    var class_list = evt.currentTarget.classList;
    if (class_list.contains("fa-caret-right")) {
        class_list.remove("fa-caret-right");
        class_list.add("fa-caret-down");
    } else {
        class_list.remove("fa-caret-down");
        class_list.add("fa-caret-right");
    }
}