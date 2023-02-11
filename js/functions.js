function sendForm() {
    let userName = $('#name').val();
    let surname = $('#surname').val();
    let age = $('#age').val();
	$.ajax({
		type: 'POST',
        url: 'php/sendToDB.php',
		dataType: 'html',
        data: {userName:userName, surname:surname, age:age},
		success: function(response) { 
           location.reload();   
    },
    error: function (jqXHR, exception) {
        let msg = '';
        if (jqXHR.status === 0) {
            msg = 'Проверьте соединение с сетью.';
        } else if (jqXHR.status == 404) {
            msg = 'Страница не найдена. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Внутренняя ошибка сервера [500].';
        } else if (exception === 'parsererror') {
            msg = 'Запрошенный JSON не выполнен.';
        } else if (exception === 'timeout') {
            msg = 'Ошибка тайм-аута.';
        } else if (exception === 'abort') {
            msg = 'Ajax-запрос прерван.';
        } else {
            msg = 'Неперехваченная ошибка.\n' + jqXHR.responseText;
        }
    }
}); 
}

function sendToSheets() {
    $.ajax({
		type: 'POST',
        url: 'php/googleSheets.php',
		dataType: 'html',
		success: function(response) {
           alert('Данные успешно добавлены в google sheets');     
    },
    error: function (jqXHR, exception) {
        let msg = '';
        if (jqXHR.status === 0) {
            msg = 'Проверьте соединение с сетью.';
        } else if (jqXHR.status == 404) {
            msg = 'Страница не найдена. [404]';
        } else if (jqXHR.status == 500) {
            msg = 'Внутренняя ошибка сервера [500].';
        } else if (exception === 'parsererror') {
            msg = 'Запрошенный JSON не выполнен.';
        } else if (exception === 'timeout') {
            msg = 'Ошибка тайм-аута.';
        } else if (exception === 'abort') {
            msg = 'Ajax-запрос прерван.';
        } else {
            msg = 'Неперехваченная ошибка.\n' + jqXHR.responseText;
        }
    }
}); 
}