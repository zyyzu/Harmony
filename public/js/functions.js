/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/ajax.js":
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
  \******************************/
/***/ (() => {

eval("//const { dump } = require(\"laravel-mix\");\n//postid, button\nvar elements = document.getElementsByClassName(\"postLikeButton\");\n\nfor (var i = 0; i < elements.length; i++) {\n  elements[i].addEventListener(\"click\", function () {\n    var postid = this.value;\n    var csrftoken = this.dataset.csrf;\n    console.log(this);\n    toggleLike(postid, csrftoken, this);\n  });\n}\n/*elements.forEach(element => {\n    element.addEventListener(\"click\", function(){\n        var postid = this.value;\n        var csrftoken = this.dataset.csrf;\n        console.log(this);\n        toggleLike(postid, csrftoken, this);\n    });\n});*/\n\n/*document.getElementById(\"postLikeButton\").addEventListener(\"click\", function() {\n    var postid = this.value;\n    var csrftoken = this.dataset.csrf;\n    console.log(this);\n    toggleLike(postid, csrftoken, this);\n});*/\n\n\nfunction toggleLike(postid, csrftoken, button) {\n  var xhttp = new XMLHttpRequest();\n\n  xhttp.onreadystatechange = function () {\n    if (this.readyState == 4 && this.status == 200) {\n      //document.getElementById(\"test\").innerHTML=this.responseText;\n      console.log(this.responseText);\n      var jsonObject = JSON.parse(this.responseText);\n      console.log(jsonObject);\n\n      if (jsonObject.status == 0) {\n        console.log('nie istnieje taki post');\n        return;\n      }\n\n      if (jsonObject.status == 200) {\n        var isLiked = jsonObject.liked;\n        var likesCount = jsonObject.likes;\n\n        if (isLiked) {\n          button.classList.remove(\"btn-outline-info\");\n          button.classList.add(\"btn-info\");\n          button.innerHTML = '<i class=\"fas fa-thumbs-up\"></i> Lubisz to | ' + likesCount;\n        } else {\n          button.classList.add(\"btn-outline-info\");\n          button.classList.remove(\"btn-info\");\n          button.innerHTML = '<i class=\"far fa-thumbs-up\"></i> Polub | ' + likesCount;\n        }\n      }\n    }\n  };\n\n  xhttp.open(\"POST\", \"http://localhost:8000/ajax/liketoggle/\" + postid, true);\n  xhttp.setRequestHeader('X-CSRF-TOKEN', csrftoken);\n  xhttp.setRequestHeader(\"X-Requested-With\", \"XMLHttpRequest\");\n  xhttp.send();\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWpheC5qcz8yNjBjIl0sIm5hbWVzIjpbImVsZW1lbnRzIiwiZG9jdW1lbnQiLCJnZXRFbGVtZW50c0J5Q2xhc3NOYW1lIiwiaSIsImxlbmd0aCIsImFkZEV2ZW50TGlzdGVuZXIiLCJwb3N0aWQiLCJ2YWx1ZSIsImNzcmZ0b2tlbiIsImRhdGFzZXQiLCJjc3JmIiwiY29uc29sZSIsImxvZyIsInRvZ2dsZUxpa2UiLCJidXR0b24iLCJ4aHR0cCIsIlhNTEh0dHBSZXF1ZXN0Iiwib25yZWFkeXN0YXRlY2hhbmdlIiwicmVhZHlTdGF0ZSIsInN0YXR1cyIsInJlc3BvbnNlVGV4dCIsImpzb25PYmplY3QiLCJKU09OIiwicGFyc2UiLCJpc0xpa2VkIiwibGlrZWQiLCJsaWtlc0NvdW50IiwibGlrZXMiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhZGQiLCJpbm5lckhUTUwiLCJvcGVuIiwic2V0UmVxdWVzdEhlYWRlciIsInNlbmQiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFFQSxJQUFJQSxRQUFRLEdBQUdDLFFBQVEsQ0FBQ0Msc0JBQVQsQ0FBZ0MsZ0JBQWhDLENBQWY7O0FBRUEsS0FBSSxJQUFJQyxDQUFDLEdBQUcsQ0FBWixFQUFlQSxDQUFDLEdBQUNILFFBQVEsQ0FBQ0ksTUFBMUIsRUFBa0NELENBQUMsRUFBbkMsRUFBc0M7QUFDbENILEVBQUFBLFFBQVEsQ0FBQ0csQ0FBRCxDQUFSLENBQVlFLGdCQUFaLENBQTZCLE9BQTdCLEVBQXNDLFlBQVU7QUFDNUMsUUFBSUMsTUFBTSxHQUFHLEtBQUtDLEtBQWxCO0FBQ0EsUUFBSUMsU0FBUyxHQUFHLEtBQUtDLE9BQUwsQ0FBYUMsSUFBN0I7QUFDQUMsSUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksSUFBWjtBQUNBQyxJQUFBQSxVQUFVLENBQUNQLE1BQUQsRUFBU0UsU0FBVCxFQUFvQixJQUFwQixDQUFWO0FBQ0gsR0FMRDtBQU1IO0FBRUQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7OztBQUNBLFNBQVNLLFVBQVQsQ0FBb0JQLE1BQXBCLEVBQTRCRSxTQUE1QixFQUF1Q00sTUFBdkMsRUFBK0M7QUFDM0MsTUFBSUMsS0FBSyxHQUFHLElBQUlDLGNBQUosRUFBWjs7QUFDQUQsRUFBQUEsS0FBSyxDQUFDRSxrQkFBTixHQUEyQixZQUFXO0FBQ3BDLFFBQUksS0FBS0MsVUFBTCxJQUFtQixDQUFuQixJQUF3QixLQUFLQyxNQUFMLElBQWUsR0FBM0MsRUFBZ0Q7QUFDMUM7QUFDSlIsTUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksS0FBS1EsWUFBakI7QUFDQSxVQUFJQyxVQUFVLEdBQUdDLElBQUksQ0FBQ0MsS0FBTCxDQUFXLEtBQUtILFlBQWhCLENBQWpCO0FBQ0FULE1BQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZUyxVQUFaOztBQUNBLFVBQUdBLFVBQVUsQ0FBQ0YsTUFBWCxJQUFxQixDQUF4QixFQUEwQjtBQUN0QlIsUUFBQUEsT0FBTyxDQUFDQyxHQUFSLENBQVksd0JBQVo7QUFDQTtBQUNIOztBQUNELFVBQUdTLFVBQVUsQ0FBQ0YsTUFBWCxJQUFxQixHQUF4QixFQUE0QjtBQUN4QixZQUFJSyxPQUFPLEdBQUdILFVBQVUsQ0FBQ0ksS0FBekI7QUFDQSxZQUFJQyxVQUFVLEdBQUdMLFVBQVUsQ0FBQ00sS0FBNUI7O0FBQ0EsWUFBR0gsT0FBSCxFQUFXO0FBQ1BWLFVBQUFBLE1BQU0sQ0FBQ2MsU0FBUCxDQUFpQkMsTUFBakIsQ0FBd0Isa0JBQXhCO0FBQ0FmLFVBQUFBLE1BQU0sQ0FBQ2MsU0FBUCxDQUFpQkUsR0FBakIsQ0FBcUIsVUFBckI7QUFDQWhCLFVBQUFBLE1BQU0sQ0FBQ2lCLFNBQVAsR0FBbUIsa0RBQWdETCxVQUFuRTtBQUNILFNBSkQsTUFJTTtBQUNGWixVQUFBQSxNQUFNLENBQUNjLFNBQVAsQ0FBaUJFLEdBQWpCLENBQXFCLGtCQUFyQjtBQUNBaEIsVUFBQUEsTUFBTSxDQUFDYyxTQUFQLENBQWlCQyxNQUFqQixDQUF3QixVQUF4QjtBQUNBZixVQUFBQSxNQUFNLENBQUNpQixTQUFQLEdBQW1CLDhDQUE0Q0wsVUFBL0Q7QUFDSDtBQUNKO0FBRUE7QUFDSixHQXpCRDs7QUEwQkFYLEVBQUFBLEtBQUssQ0FBQ2lCLElBQU4sQ0FBVyxNQUFYLEVBQW1CLDJDQUF5QzFCLE1BQTVELEVBQW9FLElBQXBFO0FBQ0FTLEVBQUFBLEtBQUssQ0FBQ2tCLGdCQUFOLENBQXVCLGNBQXZCLEVBQXVDekIsU0FBdkM7QUFDQU8sRUFBQUEsS0FBSyxDQUFDa0IsZ0JBQU4sQ0FBdUIsa0JBQXZCLEVBQTJDLGdCQUEzQztBQUNBbEIsRUFBQUEsS0FBSyxDQUFDbUIsSUFBTjtBQUNEIiwic291cmNlc0NvbnRlbnQiOlsiLy9jb25zdCB7IGR1bXAgfSA9IHJlcXVpcmUoXCJsYXJhdmVsLW1peFwiKTtcbi8vcG9zdGlkLCBidXR0b25cblxudmFyIGVsZW1lbnRzID0gZG9jdW1lbnQuZ2V0RWxlbWVudHNCeUNsYXNzTmFtZShcInBvc3RMaWtlQnV0dG9uXCIpO1xuXG5mb3IobGV0IGkgPSAwOyBpPGVsZW1lbnRzLmxlbmd0aDsgaSsrKXtcbiAgICBlbGVtZW50c1tpXS5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKXtcbiAgICAgICAgdmFyIHBvc3RpZCA9IHRoaXMudmFsdWU7XG4gICAgICAgIHZhciBjc3JmdG9rZW4gPSB0aGlzLmRhdGFzZXQuY3NyZjtcbiAgICAgICAgY29uc29sZS5sb2codGhpcyk7XG4gICAgICAgIHRvZ2dsZUxpa2UocG9zdGlkLCBjc3JmdG9rZW4sIHRoaXMpO1xuICAgIH0pO1xufVxuXG4vKmVsZW1lbnRzLmZvckVhY2goZWxlbWVudCA9PiB7XG4gICAgZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgZnVuY3Rpb24oKXtcbiAgICAgICAgdmFyIHBvc3RpZCA9IHRoaXMudmFsdWU7XG4gICAgICAgIHZhciBjc3JmdG9rZW4gPSB0aGlzLmRhdGFzZXQuY3NyZjtcbiAgICAgICAgY29uc29sZS5sb2codGhpcyk7XG4gICAgICAgIHRvZ2dsZUxpa2UocG9zdGlkLCBjc3JmdG9rZW4sIHRoaXMpO1xuICAgIH0pO1xufSk7Ki9cblxuLypkb2N1bWVudC5nZXRFbGVtZW50QnlJZChcInBvc3RMaWtlQnV0dG9uXCIpLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbigpIHtcbiAgICB2YXIgcG9zdGlkID0gdGhpcy52YWx1ZTtcbiAgICB2YXIgY3NyZnRva2VuID0gdGhpcy5kYXRhc2V0LmNzcmY7XG4gICAgY29uc29sZS5sb2codGhpcyk7XG4gICAgdG9nZ2xlTGlrZShwb3N0aWQsIGNzcmZ0b2tlbiwgdGhpcyk7XG59KTsqL1xuZnVuY3Rpb24gdG9nZ2xlTGlrZShwb3N0aWQsIGNzcmZ0b2tlbiwgYnV0dG9uKSB7XG4gICAgdmFyIHhodHRwID0gbmV3IFhNTEh0dHBSZXF1ZXN0KCk7XG4gICAgeGh0dHAub25yZWFkeXN0YXRlY2hhbmdlID0gZnVuY3Rpb24oKSB7XG4gICAgICBpZiAodGhpcy5yZWFkeVN0YXRlID09IDQgJiYgdGhpcy5zdGF0dXMgPT0gMjAwKSB7XG4gICAgICAgICAgICAvL2RvY3VtZW50LmdldEVsZW1lbnRCeUlkKFwidGVzdFwiKS5pbm5lckhUTUw9dGhpcy5yZXNwb25zZVRleHQ7XG4gICAgICAgIGNvbnNvbGUubG9nKHRoaXMucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgbGV0IGpzb25PYmplY3QgPSBKU09OLnBhcnNlKHRoaXMucmVzcG9uc2VUZXh0KTtcbiAgICAgICAgY29uc29sZS5sb2coanNvbk9iamVjdCk7XG4gICAgICAgIGlmKGpzb25PYmplY3Quc3RhdHVzID09IDApe1xuICAgICAgICAgICAgY29uc29sZS5sb2coJ25pZSBpc3RuaWVqZSB0YWtpIHBvc3QnKTtcbiAgICAgICAgICAgIHJldHVybjtcbiAgICAgICAgfVxuICAgICAgICBpZihqc29uT2JqZWN0LnN0YXR1cyA9PSAyMDApe1xuICAgICAgICAgICAgbGV0IGlzTGlrZWQgPSBqc29uT2JqZWN0Lmxpa2VkO1xuICAgICAgICAgICAgbGV0IGxpa2VzQ291bnQgPSBqc29uT2JqZWN0Lmxpa2VzO1xuICAgICAgICAgICAgaWYoaXNMaWtlZCl7XG4gICAgICAgICAgICAgICAgYnV0dG9uLmNsYXNzTGlzdC5yZW1vdmUoXCJidG4tb3V0bGluZS1pbmZvXCIpO1xuICAgICAgICAgICAgICAgIGJ1dHRvbi5jbGFzc0xpc3QuYWRkKFwiYnRuLWluZm9cIik7XG4gICAgICAgICAgICAgICAgYnV0dG9uLmlubmVySFRNTCA9ICc8aSBjbGFzcz1cImZhcyBmYS10aHVtYnMtdXBcIj48L2k+IEx1YmlzeiB0byB8ICcrbGlrZXNDb3VudDtcbiAgICAgICAgICAgIH1lbHNlIHtcbiAgICAgICAgICAgICAgICBidXR0b24uY2xhc3NMaXN0LmFkZChcImJ0bi1vdXRsaW5lLWluZm9cIik7XG4gICAgICAgICAgICAgICAgYnV0dG9uLmNsYXNzTGlzdC5yZW1vdmUoXCJidG4taW5mb1wiKTtcbiAgICAgICAgICAgICAgICBidXR0b24uaW5uZXJIVE1MID0gJzxpIGNsYXNzPVwiZmFyIGZhLXRodW1icy11cFwiPjwvaT4gUG9sdWIgfCAnK2xpa2VzQ291bnQ7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cblxuICAgICAgICB9XG4gICAgfTtcbiAgICB4aHR0cC5vcGVuKFwiUE9TVFwiLCBcImh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hamF4L2xpa2V0b2dnbGUvXCIrcG9zdGlkLCB0cnVlKTtcbiAgICB4aHR0cC5zZXRSZXF1ZXN0SGVhZGVyKCdYLUNTUkYtVE9LRU4nLCBjc3JmdG9rZW4pO1xuICAgIHhodHRwLnNldFJlcXVlc3RIZWFkZXIoXCJYLVJlcXVlc3RlZC1XaXRoXCIsIFwiWE1MSHR0cFJlcXVlc3RcIik7XG4gICAgeGh0dHAuc2VuZCgpO1xuICB9XG4iXSwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FqYXguanMuanMiLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/ajax.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
(() => {
/*!***********************************!*\
  !*** ./resources/js/functions.js ***!
  \***********************************/
eval("__webpack_require__(/*! ./ajax */ \"./resources/js/ajax.js\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZnVuY3Rpb25zLmpzPzM1OWQiXSwibmFtZXMiOlsicmVxdWlyZSJdLCJtYXBwaW5ncyI6IkFBQUFBLG1CQUFPLENBQUMsc0NBQUQsQ0FBUCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9mdW5jdGlvbnMuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJyZXF1aXJlKCcuL2FqYXgnKTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/functions.js\n");
})();

/******/ })()
;