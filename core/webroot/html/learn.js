/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    $('p.title').on('click', function () {
        $(this).toggleClass('active')
        if ($(this).next('p.panel').css('display') == 'none') {
            $(this).next('p.panel').css({'display': 'block'});
        } else {
            $(this).next('p.panel').css({'display': 'none'});
        }
    });
    $('.tab-title').on('click', function () {
        var classFind = '.' + $(this).attr('id');
        $('.tab-title').removeClass('active2');
        $(this).addClass('active2');
        $('.tab-content').css({'display': 'none'});
        $(classFind).css({'display': 'block'});
    });
    $('.tab-title-vertical').on('click', function () {
        var classFind = '.' + $(this).attr('id');
        $('.tab-title-vertical').removeClass('active2');
        $(this).addClass('active2');
        $('.tab-content-vertical').css({'display': 'none'});
        $(classFind).css({'display': 'block'});
    });
});