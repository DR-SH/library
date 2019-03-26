$(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Исчезновение флэш-сообщения после совершения действия админом

    $('.flashMess').delay(3000).slideUp();

    // Выбор авторов при создании или редактировании книг

    $('#formAuthors').select2({
        placeholder: 'Выберите автора',
        maximumSelectionLength: 3,
        tags: false,
        language: {
            noResults: function () {
                return "Результатов не найдено";
            },
            maximumSelected: function () {
                return "Вы не можете выбрать более трех авторов";
            }
        }
    });

    // Выбор жанров при создании или редактировании книг

    $('#formGenre').select2({
         placeholder: 'Выберите жанр',
         tags: false,
         language: {
             noResults: function () {
                 return "Результатов не найдено";
             }
         }
    });

    // Асинхронное отвязывание обложек от книг

    $("#app").on('click', '#delCover', function(e){
        e.preventDefault();
        var ajaxId = $(this).attr('data-id');
        var ajaxFilename = $(this).attr('data-filename');
        $.ajax({
            type:'post',
            url:'/admin/cover/delete',
            dataType: 'html',
            data: {id: ajaxId, filename: ajaxFilename},
            success:function(msg){
                if(msg){
                    $('.showCover').css('display', 'none');
                    $('.uploadCover').css('display', 'block');
                };
            }
        });
    });

    // Асинхронное отвязывание файлов от книг

    $("#app").on('click', '#delFile', function(e){
        e.preventDefault();
        var ajaxId = $(this).attr('data-id');
        var ajaxFilename = $(this).attr('data-filename');
        $.ajax({
            type:'post',
            url:'/admin/file/delete',
            dataType: 'html',
            data: {id: ajaxId, filename: ajaxFilename},
            success:function(msg){
                if(msg){
                    $('.showFile').css('display', 'none');
                    $('.uploadFile').css('display', 'block');
                };
            }
        });
    });

    $("#app").on('click', '#commentButton', function(e){
        e.preventDefault();
        var ajaxText = $("#commentText").html;
        $.ajax({
            type:'post',
            url:'/comment/create',
            dataType: 'html',
            data: {text: ajaxText},
            success:function(msg){
                if(msg){
                    console.log(ajaxText);
                };
            }
        });
    });
});