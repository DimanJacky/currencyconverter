jQuery(document).ready(function () {

    $('#avatar').change(function () {

        var str = $('#avatar').val();

        var str1 = str.substring(str.lastIndexOf('\\')+1);

        $('#subjectform-pathimg').val("images/" + str1);

    });

    /*$('#searcharticle').submit(function () {
       var search = $('#searcharticle input').val();
        $.ajax({
            url:     '/controllers/SearchController.php',
            type:     "POST",
            dataType: "html",
            data: {
                'search': search
            },
            success: function(response) {
                var result = $.parseJSON(response);
                alert('result');
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });*/

    // Поиск id зала по имени зала

    $('#hall_search').on('click', function () {
        var hall = $('#hall').val();
        $.ajax({
            url:     '/organization/index',
            type:     "POST",
            dataType: "html",
            data: {
                'hall': hall
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('#result_hall').text(result);
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

    // Поиск id пользователя по логину

    $('#login_search').on('click', function () {
        var login = $('#login').val();
        $.ajax({
            url:     '/organization/index',
            type:     "POST",
            dataType: "html",
            data: {
                'login': login
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('#result_login').text(result);
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

    // Поиск имени зала по id зала

    $('#hall_id_search').on('click', function () {
        var hall_id = $('#hall_id').val();
        $.ajax({
            url:     '/organization/index',
            type:     "POST",
            dataType: "html",
            data: {
                'hall_id': hall_id
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('#result_hall_id').text(result);
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

    // Поиск логина по id пользователя

    $('#user_id_search').on('click', function () {
        var user_id = $('#user_id').val();
        $.ajax({
            url:     '/organization/index',
            type:     "POST",
            dataType: "html",
            data: {
                'user_id': user_id
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('#result_user_id').text(result);
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

    // Смена пароля по учёткам зала

    $('#login_change_pas').on('click', function () {
        var login = $('#login').val();
        $.ajax({
            url:     '/organization/changepas',
            type:     "POST",
            dataType: "html",
            data: {
                'login': login
            },
            success: function(response) {
                var result = $.parseJSON(response);

                // Определяем случайные числа и буквы для пароля

                var result_str = "";
                var i = 0;
                var pas = "";
                var randomIndex1 = 1;
                var randomIndex2 = 1;
                var randomIndex3 = 1;
                var randomIndex4 = 1;
                var randchislo1 = 1;
                var randchislo2 = 1;
                var randchislo3 = 1;
                var randomLetter1 = "";
                var randomLetter2 = "";
                var randomLetter3 = "";
                var randomLetter4 = "";

                var alphabet = "abcdefghijklmnopqrstuvwxyz";

                for(i = 0; i < result.length; i++) {
                    randchislo1 = Math.floor(Math.random() * (10 - 1)) + 1;
                    randchislo2 = Math.floor(Math.random() * (10 - 1)) + 1;
                    randchislo3 = Math.floor(Math.random() * (10 - 1)) + 1;

                    randomIndex1 = Math.floor(Math.random() * alphabet .length);
                    randomIndex2 = Math.floor(Math.random() * alphabet .length);
                    randomIndex3 = Math.floor(Math.random() * alphabet .length);
                    randomIndex4 = Math.floor(Math.random() * alphabet .length);

                    randomLetter1 = alphabet[randomIndex1];
                    randomLetter2 = alphabet[randomIndex2];
                    randomLetter3 = alphabet[randomIndex3];
                    randomLetter4 = alphabet[randomIndex4];

                    pas = randomLetter1 + "" + randchislo1 + "" + randomLetter2 + "" + randchislo2 + "" + randomLetter3 + "" + randchislo3 + randomLetter4;
                    result_str = result_str + "<br>Логин: " + result[i];
                    result_str = result_str + "<br>Пароль: " + pas;
                }
                $('#result_login').html(result_str);
            },
            error: function(response) { // Данные не отправлены
                $('#result_form').html('Ошибка. Данные не отправлены.');
            }
        });
    });

    $( ".datepicker" ).datepicker({dateFormat: 'dd/mm/yy'});

    $('#submitdate').on('click', function () {

        var date = $('#date').val();
//alert(date);
        $.ajax({
            url: "/currency/ajax",
            type: "POST",
            dataType: "html",
            data: {
                'date': date
            },
            success: function(response) {
                var result = $.parseJSON(response);
                $('#response').css({'display':'block'});
                $('p span.date').text(result.date);
                $('p span.usd').text(result.usd);
                $('p span.eur').text(result.eur);
                $('p span.aud').text(result.aud);
                $('p span.gbr').text(result.gbr);
                $('p span.brl').text(result.brl);
                $('p span.hkd').text(result.hkd);
                $('p span.jpy').text(result.jpy);
                //alert(result.usd);
            },
            error: function() { // Данные не отправлены
                alert('Ошибка');
            }
        });
    });

    $('#convertCurrency').on('click', function () {

        var from = $('#from').val();
        var to = $('#to').val();
        var amountfrom = $('#amountfrom').val();
        var date = $('#date').val();

        //alert("from " + from + ", to " + to + ", amountfrom " + amountfrom + ", date " + date);
        $.ajax({
            url: "/currency/convert",
            type: "POST",
            dataType: "html",
            data: {
                'from': from,
                'to': to,
                'amountfrom': amountfrom,
                'date': date,
                'convert': 'convert'
            },
            success: function(response) {
                var result = $.parseJSON(response);

                $('#amountto').text(result + " " + to);
            },
            error: function() { // Данные не отправлены
                alert('Ошибка');
            }
        });
    });

    $('#kind').on('change', function () {
        if(typeof $("#to").attr('multiple') === "undefined"){
            $('#to').attr('multiple', '' );
        } else {
            $('#to').removeAttr('multiple');
        }
    });

    $('#compareCurrency').on('click', function () {

        var from = $('#from').val();
        var to = $('#to').val();
        var date = $('#date').val();

        //alert("from " + from + ", to " + to + ", kind " + kind + ", date " + date);
        $.ajax({
            url: "/currency/compare",
            type: "POST",
            dataType: "html",
            data: {
                'from': from,
                'to': to,
                'date': date,
                'compare': 'compare'
            },
            success: function(response) {
                var result = $.parseJSON(response);

                $('#rcompare').html(result);
            },
            error: function() { // Данные не отправлены
                alert('Ошибка');
            }
        });
    });

});