/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    var height = 'first';
    var check;
    $('.sub-menu').on('click', function () {
        if (check != this) {
            height = 'first';
            $(this).next('div.dropdown-container').css({"display": "none"});
            $(this).next('div.dropdown-container').css({"height": "auto"});
        }
        if (height === 'first') {
            height = $(this).next('div.dropdown-container').css('height');
            $(this).next('div.dropdown-container').css({"height": "0px"});
            $(this).next('div.dropdown-container').css({"display": "block"});
            check = this;
        }
        if ($(this).next('div.dropdown-container').css('height') == "0px") {
            $(this).next('div.dropdown-container').css({"height": height});
        } else if ($(this).next('div.dropdown-container').css('height') == height) {
            $(this).next('div.dropdown-container').css({"height": "0px"});
        }

    });
});