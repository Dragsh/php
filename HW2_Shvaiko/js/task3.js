$(document).on('change', 'input[type="file"]', function () {
    $("label").text(`Выбран файл: ${$(this).val().split('/').pop().split('\\').pop()}`);
});