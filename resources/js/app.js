/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('#button-launcher').on('click', (e) => {
    $('#test-chat', window.parent.document).animate({height: "400px"}, 500);
    $('#btn-close').show();
});

$('#btn-close').on('click', (e) => {
    $('#test-chat', window.parent.document).animate({height: "46px"}, 500);
    $('#btn-close').hide();
});
