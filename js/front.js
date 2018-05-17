$(document).ready(function () {
	
    'use strict';
	
    // ------------------------------------------------------- //
    // Search Box
    // ------------------------------------------------------ //
    $('#search').on('click', function (e) {
        e.preventDefault();
        $('.search-box').fadeIn();
	});
    $('.dismiss').on('click', function () {
        $('.search-box').fadeOut();
	});
	
    // ------------------------------------------------------- //
    // Card Close
    // ------------------------------------------------------ //
    $('.card-close a.remove').on('click', function (e) {
        e.preventDefault();
        $(this).parents('.card').fadeOut();
	});
	
	
    // ------------------------------------------------------- //
    // Adding fade effect to dropdowns
    // ------------------------------------------------------ //
    $('.dropdown').on('show.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
	});
    $('.dropdown').on('hide.bs.dropdown', function () {
        $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
	});
	
	
    // ------------------------------------------------------- //
    // Sidebar Functionality
    // ------------------------------------------------------ //
    $('#toggle-btn').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
		
        $('.side-navbar').toggleClass('shrinked');
        $('.content-inner').toggleClass('active');
        $(document).trigger('sidebarChanged');
		
        if ($(window).outerWidth() > 1183) {
            if ($('#toggle-btn').hasClass('active')) {
                $('.navbar-header .brand-small').hide();
                $('.navbar-header .brand-big').show();
				} else {
                $('.navbar-header .brand-small').show();
                $('.navbar-header .brand-big').hide();
			}
		}
		
        if ($(window).outerWidth() < 1183) {
            $('.navbar-header .brand-small').show();
		}
	});
	
    // ------------------------------------------------------- //
    // Universal Form Validation
    // ------------------------------------------------------ //
	
    $('.form-validate').each(function() {  
        $(this).validate({
			rules: {
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: "checkEmail.php",
                        type: "post"
					}
				},
                reminderemail: {
                    required: true,
                    email: true,
                    remote: {
                        url: "remindPass.php",
                        type: "post"
					}
				}
			},
            messages: {
                email: {
                    required: "Будь ласка, вкажіть свій Email!",
                    email: "Будь ласка вкажіть коректний Еmail!",
                    remote: "Вказаний Email вже зареєстровано!"
				},
                reminderemail: {
                    required: "Будь ласка, вкажіть свій Email!",
                    email: "Будь ласка вкажіть коректний Еmail!",
                    remote: "Вказаний Email не зареєстрований!"
				}	
			},
            errorElement: "div",
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            ignore: ':hidden:not(.summernote, .checkbox-template, .form-control-custom),.note-editable.card-block',
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                console.log(element);
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.siblings("label"));
				} 
                else {
                    error.insertAfter(element);
				}
			}
		});
		
	});
	
    // ------------------------------------------------------- //
    // ChekPrice
    // ------------------------------------------------------ //	
	
	var form = $('form[name=offer]');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			method: "POST",
			url: $(this).attr('action'),
			data: $("form[name=offer]").serialize(),
			beforeSend: function(){
				form.append( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> обробка даних...</p>').fadeIn() );
			}
			}).done(function(msg){
			$('form[name=offer]').find("input[type=text]").val('');
			form_status.html(msg).delay(5000).fadeOut();
		});
	});	
	
	
    // ------------------------------------------------------- //
    // Material Inputs
    // ------------------------------------------------------ //
	
    var materialInputs = $('input.input-material');
	
    // activate labels for prefilled values
    materialInputs.filter(function() { return $(this).val() !== ""; }).siblings('.label-material').addClass('active');
	
    // move label on focus
    materialInputs.on('focus', function () {
        $(this).siblings('.label-material').addClass('active');
	});
	
    // remove/keep label on blur
    materialInputs.on('blur', function () {
        $(this).siblings('.label-material').removeClass('active');
		
        if ($(this).val() !== '') {
            $(this).siblings('.label-material').addClass('active');
			} else {
            $(this).siblings('.label-material').removeClass('active');
		}
	});
	
    // ------------------------------------------------------- //
    // Footer 
    // ------------------------------------------------------ //   
	
    var contentInner = $('.content-inner');
	
    $(document).on('sidebarChanged', function () {
        adjustFooter();
	});
	
    $(window).on('resize', function () {
        adjustFooter();
	})
	
    function adjustFooter() {
        var footerBlockHeight = $('.main-footer').outerHeight();
        contentInner.css('padding-bottom', footerBlockHeight + 'px');
	}
	
    // ------------------------------------------------------- //
    // External links to new window
    // ------------------------------------------------------ //
    $('.external').on('click', function (e) {
		
        e.preventDefault();
        window.open($(this).attr("href"));
	});
	
    // ------------------------------------------------------ //
    // For demo purposes, can be deleted
    // ------------------------------------------------------ //
	
    var stylesheet = $('link#theme-stylesheet');
    $("<link id='new-stylesheet' rel='stylesheet'>").insertAfter(stylesheet);
    var alternateColour = $('link#new-stylesheet');
	
    if ($.cookie("theme_csspath")) {
        alternateColour.attr("href", $.cookie("theme_csspath"));
	}
	
    $("#colour").change(function () {
		
        if ($(this).val() !== '') {
			
            var theme_csspath = 'css/style.' + $(this).val() + '.css';
			
            alternateColour.attr("href", theme_csspath);
			
            $.cookie("theme_csspath", theme_csspath, {
                expires: 365,
                path: document.URL.substr(0, document.URL.lastIndexOf('/'))
			});
			
		}
		
        return false;
	});
	
});
// ------------------------------------------------------ //
// For slider frontend
// ------------------------------------------------------ //
$( document ).ready(function( $ ) {
	$( '#example5' ).sliderPro({
		width: 800,
		height: 600,
		orientation: 'vertical',
		loop: false,
		arrows: true,
		buttons: false,
		thumbnailsPosition: 'right',
		thumbnailPointer: true,
		thumbnailWidth: 120,
		breakpoints: {
			800: {
				thumbnailsPosition: 'bottom',
				thumbnailWidth: 120,
				thumbnailHeight: 90
			},
			500: {
				thumbnailsPosition: 'bottom',
				thumbnailWidth: 120,
				thumbnailHeight: 90
			}			
		}
	});
});

// ------------------------------------------------------ //
// For slider, uploadfiles
// ------------------------------------------------------ //
(function($){
	
	var files; // переменная. будет содержать данные файлов
	
	// заполняем переменную данными файлов, при изменении значения file поля
	$('input[multiple=multiple]').on('change', function(){
		files = this.files;
		if(files.length < 2)
		var spantext = $(this).val().replace(/.*\\/, "");
		else spantext = "Кількість файлів: " + files.length;
        $("#selected_slider").html(spantext);		
	});
	
	
	// обработка и отправка AJAX запроса при клике на кнопку upload_files
	$('#sliderupload').on( 'click', function( event ){
		
		event.stopPropagation(); // остановка всех текущих JS событий
		event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
		
		// ничего не делаем если files пустой
		if( typeof files == 'undefined' ) return;
		
		// создадим данные файлов в подходящем для отправки формате
		var data = new FormData();
		$.each( files, function( key, value ){
			data.append( key, value );
		});
		
		// добавим переменную идентификатор запроса
		data.append( 'my_file_upload', 1 );
		data.append('id', $("[data-objectid]").attr("data-objectid"));
		// AJAX запрос
		$.ajax({
			url         : './submit.php',
			type        : 'POST',
			data        : data,
			cache       : false,
			dataType    : 'json',
			// отключаем обработку передаваемых данных, пусть передаются как есть
			processData : false,
			// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
			contentType : false,
			// функция успешного ответа сервера
			success     : function( respond, status, jqXHR ){
				
				// ОК
				if( typeof respond.error === 'undefined' ){
					// файлы загружены, делаем что-нибудь
					
					// покажем пути к загруженным файлам в блок '.ajax-reply'
					
					var files_path = respond.files;
					var html = '';
					$.each( files_path, function( key, val ){
						html += '<div class="col-sm-2 mb-3"><img class="img-fluid" src="' + val + '"></div>';
					} )
					
					$('.ajax-reply').html( html );
				}
				// error
				else {
					console.log('ОШИБКА: ' + respond.error );
				}
			},
			// функция ошибки ответа сервера
			error: function( jqXHR, status, errorThrown ){
				console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
			}
			
		});
		
	});
	
	
})(jQuery);


// ------------------------------------------------------ //
// For mainPhoto, uploadfile
// ------------------------------------------------------ //
(function($){
	
	var files; // переменная. будет содержать данные файлов
	
	// заполняем переменную данными файлов, при изменении значения file поля
	$('input[name=main_photo]').on('change', function(){
		files = this.files;
		var spantext = $(this).val().replace(/.*\\/, "");
        $("#selected_main_photo").html(spantext);
	});
	
	
	// обработка и отправка AJAX запроса при клике на кнопку upload_files
	$('#mainphoto').on( 'click', function( event ){
		
		event.stopPropagation(); // остановка всех текущих JS событий
		event.preventDefault();  // остановка дефолтного события для текущего элемента - клик для <a> тега
		
		// ничего не делаем если files пустой
		if( typeof files == 'undefined' ) return;
		
		// создадим данные файлов в подходящем для отправки формате
		var data = new FormData();
		$.each( files, function( key, value ){
			data.append( key, value );
		});
		
		// добавим переменную идентификатор запроса
		data.append( 'my_file_upload', 1 );
		data.append('id', $("[data-objectid]").attr("data-objectid"));
		// AJAX запрос
		$.ajax({
			url         : './submitmainphoto.php',
			type        : 'POST',
			data        : data,
			cache       : false,
			dataType    : 'json',
			// отключаем обработку передаваемых данных, пусть передаются как есть
			processData : false,
			// отключаем установку заголовка типа запроса. Так jQuery скажет серверу что это строковой запрос
			contentType : false,
			// функция успешного ответа сервера
			success     : function( respond, status, jqXHR ){
				
				// ОК
				if( typeof respond.error === 'undefined' ){
					// файлы загружены, делаем что-нибудь
					
					// покажем пути к загруженным файлам в блок '.ajax-main-photo'
					
					var files_path = respond.files;
					var html = '';
					$.each( files_path, function( key, val ){
						html += '<div class="col-sm-2 mb-3"><img class="img-fluid" src="' + val + '"></div>';
					} )
					
					$('.ajax-main-photo').html( html );
				}
				// error
				else {
					console.log('ОШИБКА: ' + respond.error );
				}
			},
			// функция ошибки ответа сервера
			error: function( jqXHR, status, errorThrown ){
				console.log( 'ОШИБКА AJAX запроса: ' + status, jqXHR );
			}
			
		});
		
	});
	
	
})(jQuery)

// ------------------------------------------------------ //
// Стилизація кнопок типу файл
// ------------------------------------------------------ //
$(function(){
	$('#clon_main_photo').click(function(evenet){
		event.preventDefault();
		$('[name=main_photo]').click();
	});	
});

$(function(){
	$('#clon_slider').click(function(evenet){
		event.preventDefault();
		$('[multiple=multiple]').click();
	});	
});

