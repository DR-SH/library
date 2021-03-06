/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom.js":
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  }); // Исчезновение флэш-сообщения после совершения действия админом

  $('.flashMess').delay(3000).slideUp(); // Выбор авторов при создании или редактировании книг

  $('#formAuthors').select2({
    placeholder: 'Выберите автора',
    maximumSelectionLength: 3,
    tags: false,
    language: {
      noResults: function noResults() {
        return "Результатов не найдено";
      },
      maximumSelected: function maximumSelected() {
        return "Вы не можете выбрать более трех авторов";
      }
    }
  }); // Выбор жанров при создании или редактировании книг

  $('#formGenre').select2({
    placeholder: 'Выберите жанр',
    tags: false,
    language: {
      noResults: function noResults() {
        return "Результатов не найдено";
      }
    }
  }); // Асинхронное отвязывание обложек от книг

  $("#app").on('click', '#delCover', function (e) {
    e.preventDefault();
    var ajaxId = $(this).attr('data-id');
    var ajaxFilename = $(this).attr('data-filename');
    $.ajax({
      type: 'post',
      url: '/admin/cover/delete',
      dataType: 'html',
      data: {
        id: ajaxId,
        filename: ajaxFilename
      },
      success: function success(msg) {
        if (msg) {
          $('.showCover').css('display', 'none');
          $('.uploadCover').css('display', 'block');
        }

        ;
      }
    });
  }); // Асинхронное отвязывание файлов от книг

  $('#app').on('click', '#delFile', function (e) {
    e.preventDefault();
    var ajaxId = $(this).attr('data-id');
    var ajaxFilename = $(this).attr('data-filename');
    $.ajax({
      type: 'post',
      url: '/admin/file/delete',
      dataType: 'html',
      data: {
        id: ajaxId,
        filename: ajaxFilename
      },
      success: function success(msg) {
        if (msg) {
          $('.showFile').css('display', 'none');
          $('.uploadFile').css('display', 'block');
        }

        ;
      }
    });
  });
  $("#app").on('click', '#commentButton', function (e) {
    e.preventDefault();
    var ajaxText = $("#commentText").val();
    var ajaxBook = $(this).attr('data-book');
    console.log(ajaxBook + '/' + ajaxText);
    $.ajax({
      type: 'post',
      url: '/comment/create',
      dataType: 'html',
      data: {
        message: ajaxText,
        book: ajaxBook
      },
      success: function success(msg) {
        if (msg) {
          var comment = $.parseJSON(msg);
          console.log(comment);
          $('.comments').prepend("<div class='comment'><hr><p>" + comment.user + ", " + comment.created_at + "</p><p>" + comment.message + "</p></div>");
          $("#commentText").val('');
        }
      }
    });
  });
  $("#app").on('click', '#searchButton', function (e) {
    e.preventDefault();
    if ($("#searchInput").val()) window.location.href = "/search/" + $("#searchInput").val();
  });
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Napilnikov\Documents\laravel\testapp4\resources\js\custom.js */"./resources/js/custom.js");


/***/ })

/******/ });