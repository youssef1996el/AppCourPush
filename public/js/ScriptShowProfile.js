
$(document).ready(function () {

    $('#showMoreExperience').on('click',function()
    {
        $('#ListExperince').find('.item').css('display', 'block');
        $('#showFirstItemExperience').css('display', 'block');
        $(this).css('display', 'none');

    });

    $('#showFirstItemExperience').on('click', function ()
    {
        $('#ListExperince').find('.item').filter(function () {
            return parseInt($(this).data('index')) > 0;
        }).css('display', 'none');
        $(this).css('display', 'none');
        $('#showMoreExperience').css('display', 'block');
    });

    //// Formation

    $('#showMoreFormation').on('click',function()
    {
        $('#ListFormation').find('.item').css('display', 'block');
        $('#showFirstItemFormation').css('display', 'block');
        $(this).css('display', 'none');
    });

    $('#showFirstItemFormation').on('click',function()
    {
        $('#ListFormation').find('.item').filter(function()
        {
            return parseInt($(this).data('index'))>0;
        }).css('display','none');
        $(this).css('display','none');
        $('#showMoreFormation').css('display','block');
    });




});
