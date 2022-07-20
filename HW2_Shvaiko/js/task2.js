window.onload = function(){
    setBodyTypeImgs('input[name=bodyType]:checked');
    setInputs('input[name=bodyType]:checked');
    setMaterialType('#materialType :selected');
}

$(function () {
    $('input[name=bodyType]').click(function(){
        setBodyTypeImgs(this);
        setInputs(this);
    });

    $('#materialType').change(function(){
        setMaterialType(this);
    });
})

// изменение изрбражения
// при выборе пользователем типа тела
function setBodyTypeImgs(elem) {
    let bodyType = $(elem).val();
    $('#bodyTypeImg').attr('src', `../imgs/${bodyType}.png`);
}

// изменение изрбражения
// при выборе пользователем типа материала
function setMaterialType(elem) {
    let materialType = $(elem).val();
    $('#materialTypeImg').attr('src', `../imgs/${materialType}.jpg`);
}

// изменение доступности полей ввода
// при выборе пользователем типа тела
function setInputs(elem) {
    switch ($(elem).attr("value")) {
        case "cone":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            break;

        case "sphere":
            $("[for='b']").attr("readonly", "true");
            $("#b").attr("readonly", "true");
            break;

        case "cylinder":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            break;

        case "pyramid":
            $("[for='b']").removeAttr("readonly");
            $("#b").removeAttr("readonly");
            break;
    }
}