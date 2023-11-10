$(document).ready(function () {

    const listFormation  = $('.ListFormation');
    const listExperience = $('.ListExperience');
    const firtItemExperience = listExperience.find('.itemExperience:first');
    const firstItem = listFormation.find('.item:first');
    listFormation.css('overflow-y', 'hidden');
    listExperience.css('overflow-y', 'hidden');

    $('#showMoreFormation').on('click', function () {
        listFormation.css('max-height', 'none');
        listFormation.css('overflow-y', 'scroll');
        listFormation.css('max-height', firstItem.outerHeight());
        $('.item:hidden').show();
        $('#showMoreFormation').hide();
        $('#showFirstItemFormation').removeClass('hidden');
        $('#showFirstItemFormation').addClass('btn btn-secondary');
    });

    $('#showFirstItemFormation').on('click', function () {
        listFormation.css('max-height', firstItem.outerHeight());
        listFormation.css('overflow-y', 'hidden');
        $('.item').not(':first').hide();
        $('#showMoreFormation').show();
        $('#showFirstItemFormation').addClass('hidden');
    });

    /**************************************** Experience **************************/
    $('#showMoreExperience').on('click', function () {
        listExperience.css('max-height', 'none');
        listExperience.css('overflow-y', 'scroll');
        listExperience.css('max-height', firtItemExperience.outerHeight());
        $('.itemExperience:hidden').show();
        $('#showMoreExperience').hide();
        $('#showFirstItemExperience').removeClass('hidden');
        $('#showFirstItemExperience').addClass('btn btn-secondary');
    });

    $('#showFirstItemExperience').on('click', function () {
        listExperience.css('max-height', firtItemExperience.outerHeight());
        listExperience.css('overflow-y', 'hidden');
        $('.itemExperience').not(':first').hide();
        $('#showMoreExperience').show();
        $('#showFirstItemExperience').addClass('hidden');
    });
    /************************************** Click For button show more (list formation table) ***************/

    $('#showMoreListTableFormation').on('click', function() {
        $('.itemTableFormation:hidden').show();
        $('#showMoreListTableFormation').hide();
    });
    /*************************************** click drop down formation **************************/
    $('#ShowFormation').on('click',function()
    {
        $('.divProfile').fadeOut("slow");
        $('.divExperience').fadeOut("slow");
        $('.divDisponible').fadeOut("slow");
        $('.divFormation').fadeIn(2000);
    });
    /************************************* Click For Button show more (list Experience) ******************/
    $('#showMoreListTableExperience').on('click', function() {
        $('.itemTableExperience:hidden').show();
        $('#showMoreListTableExperience').hide();
    });
    /************************************* Click drop down Exprience **********************************/
    $('#ShowExperience').on('click',function()
    {
        $('.divProfile').fadeOut("slow");
        $('.divFormation').fadeOut("slow");
        $('.divDisponible').fadeOut("slow");
        $('.divExperience').fadeIn(2000);
    });
    /************************************* Click drop down disponible ********************************/
    $('#ShowDisponoble').on('click',function()
    {
        $('.divProfile').fadeOut("slow");
        $('.divFormation').fadeOut("slow");
        $('.divExperience').fadeOut("slow");
        $('.divDisponible').fadeIn(2000);
    });


});
