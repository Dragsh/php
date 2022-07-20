window.onload = function(){
    setInputs('input[name=figureType]:checked');
}

$(function () {
    $('input[name="figureType"]').click(function(){
        setInputs(this);
    });
});

// изменение доступности полей ввода
// при выборе пользователем типа фигуры
function setInputs(elem) {
    switch ($(elem).attr("value")) {
        case "Прямоугольник":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            $("[for='c']").attr("readonly", "true");
            $("#c").attr("readonly", "true");
            $('#a').val($.cookie('$a'));
            $('#b').val($.cookie('$b'));
            break;

        case "Квадрат":
            $("[for='b']").attr("readonly", "true");
            $("#b").attr("readonly", "true");
            $("[for='c']").attr("readonly", "true");
            $("#c").attr("readonly", "true");
            $('#a').val($.cookie('$a'));
            break;

        case "Треугольник":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            $("[for='c']").removeAttr("readonly");
            $("#c").removeAttr("readonly");
            $('#a').val($.cookie('$a'));
            $('#b').val($.cookie('$b'));
            $('#c').val($.cookie('$c'));
            break;

        case "Прямоугольная трапеция":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            $("[for='c']").removeAttr("readonly");
            $("#c").removeAttr("readonly");
            $('#a').val($.cookie('$a'));
            $('#b').val($.cookie('$b'));
            $('#c').val($.cookie('$c'));
            break;
    }
}
