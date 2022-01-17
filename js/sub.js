$(document).ready(function(){

    //FAQS SECTION CLICK TO ADD AND REMOVE

    $("#faqs a:eq(0)").click(function(){
        $('#faqs span:eq(0)').fadeToggle(100);
        $('#faqs span').siblings('span').hide();
    });

    $("#faqs a:eq(1)").click(function(){
        $('#faqs span:eq(1)').fadeToggle(100);
        $('#faqs span:eq(1)').siblings('span').hide();
    });

    $("#faqs a:eq(2)").click(function(){
        $('#faqs span:eq(2)').fadeToggle(100);
        $('#faqs span:eq(2)').siblings('span').hide();
    });

    $("#faqs a:eq(3)").click(function(){
        $('#faqs span:eq(3)').fadeToggle(100);
        $('#faqs span:eq(3)').siblings('span').hide();
    });

    $("#faqs a:eq(4)").click(function(){
        $('#faqs span:eq(4)').fadeToggle(100);
        $('#faqs span:eq(4)').siblings('span').hide();
    });

    $("#faqs a:eq(5)").click(function(){
        $('#faqs span:eq(5)').fadeToggle(100);
        $('#faqs span:eq(5)').siblings('span').hide();
    });

    $("#faqs a:eq(6)").click(function(){
        $('#faqs span:eq(6)').fadeToggle(100);
        $('#faqs span:eq(6)').siblings('span').hide();
    });

    $("#faqs a:eq(7)").click(function(){
        $('#faqs span:eq(7)').fadeToggle(100);
        $('#faqs span:eq(7)').siblings('span').hide();
    });

    $("#faqs a:eq(8)").click(function(){
        $('#faqs span:eq(8)').fadeToggle(100);
        $('#faqs span:eq(8)').siblings('span').hide();
    });

    $("#faqs a:eq(9)").click(function(){
        $('#faqs span:eq(9)').fadeToggle(100);
        $('#faqs span:eq(9)').siblings('span').hide();
    });

    $("#faqs a:eq(10)").click(function(){
        $('#faqs span:eq(10)').fadeToggle(100);
        $('#faqs span:eq(10)').siblings('span').hide();
    });

    $("#faqs a:eq(11)").click(function(){
        $('#faqs span:eq(11)').fadeToggle(100);
        $('#faqs span:eq(11)').siblings('span').hide();
    });


    $('.fa-search').click(function(){ 
        $('.search-form').addClass('show-search');
        $('.search-cancel').addClass('show-search');
      })
      $('.search-cancel').click(function(){ 
        $('.search-form').removeClass('show-search');
        $('.search-cancel').removeClass('show-search');
      })
        
});