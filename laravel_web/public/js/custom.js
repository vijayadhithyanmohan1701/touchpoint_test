$(document).ready(function(){
    console.log("Test");
    $('.trigger-email').on('click', function(){
        $(this).closest('.toggle-action').find('.form-modal').toggle();
    });
    $('.close-modal').on('click', function(){
        $(this).closest('.form-modal').hide();
    });
    $('.trigger-email-all').on('click', function(){
        $('.form-modal-all').toggle();
    });
    $('.close-modal-all').on('click', function(){
        $('.form-modal-all').hide();
    });
});