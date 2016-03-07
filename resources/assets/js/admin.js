/**
 * Created by root on 2/7/16.
 */
(function ($) {
    $(function () {
        if (document.getElementById("javascript-editor") && document.getElementById("style-editor")) {
            var js = document.getElementById("javascript-editor");
            var css = document.getElementById("style-editor");

            var div = document.createElement("div");
            div.setAttribute('id', 'js-e');
            div.setAttribute('style', 'height:600px');
            js.parentElement.appendChild(div);

            var div1 = document.createElement("div");
            div1.setAttribute('id', 'css-e');
            div1.setAttribute('style', 'height:600px');
            css.parentElement.appendChild(div1);

            var editor = ace.edit("js-e");
            var editor1 = ace.edit("css-e");

            editor.setTheme("ace/theme/monokai");
            editor1.setTheme("ace/theme/monokai");

            editor.getSession().setMode("ace/mode/javascript");
            editor1.getSession().setMode("ace/mode/css");

            editor.getSession().setValue(js.value);
            editor1.getSession().setValue(css.value);

            editor.getSession().on('change', function(){
                js.value = editor.getSession().getValue();
            });

            editor1.getSession().on('change', function(){
                css.value = editor1.getSession().getValue();
            });
        }
    });

})(jQuery); // end of jQuery name space