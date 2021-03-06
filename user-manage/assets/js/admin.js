jQuery(document).ready(function($){
    
    $('button.btn.admin.user-manage.member-create').css("background-color","red");

    $('button.admin.user-manage.member-create').click(function() {
        $('.admin.user-search').removeClass('activate');
        $('.admin.user-manage.body').toggleClass('activate');
        $('button.btn.admin.user-manage.member-search').css("background-color","green");
        if($('.admin.user-manage.body').hasClass('activate'))
        {
            $('button.btn.admin.user-manage.member-create').css("background-color","red");
    
        }else{
            $('button.btn.admin.user-manage.member-create').css("background-color","green");
        } 
    })

    $('button.btn.admin.user-manage.member-search').click(function() {
        $('.admin.user-manage.body').removeClass('activate');
        $('.admin.user-search').toggleClass('activate');
        $('button.btn.admin.user-manage.member-create').css("background-color","green");
        if($('.admin.user-search').hasClass('activate')) 
        {
            $('button.btn.admin.user-manage.member-search').css("background-color","red");
            
        }else{
            $('button.btn.admin.user-manage.member-search').css("background-color","green");
        }
    })

    $('.user.table.row.edit').click(function(){
        $(this).hide();
        $(this).siblings().addClass('activate');
        $(this).closest('tr').find('input[type="text"]').prop("disabled", false);
    })

    $(document).mouseup(function (e) { 
        if ($(e.target).closest(".admin.user-manage.inner").length=== 0) { 
            $('.user.table.row.update.activate').removeClass('activate');
            $('.user.table.row.edit').show();
            $('table.user-table input[type="text"]').prop("disabled", true);
        } 
    });


    // $('.user-search-bar').on('keyup', function() {
    //     var inputVal = $(this).val();
    //     var result = $('.search-result');
    //     if(inputVal.length == '') {
    //         $('.user-manage.search').hide();
    //         $('.user-manage.original').show();
    //     }else {
    //         $('.user-manage.search').show();
    //         $('.user-manage.original').hide();
    //         console.log(inputVal);
    //         var data = {
    //             'action': 'my_action',
    //             val:inputVal
    //         };

    //         $.post(ajaxurl, data, function (response) {
    //             $('.user-manage.search').html(response);
    //         });
    //     }
    // })

});
