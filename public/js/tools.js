$(function(){
    
    /* Главное меню */
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
    
        // Avoid following the href location when clicking
        event.preventDefault(); 
        
        // Avoid having the menu to close when clicking
        event.stopPropagation(); 
        
        // If a menu is already open we close it
        $(this).parent().siblings().removeClass('open');
        
        if($(this).parent().hasClass('open')) {
        
            // If a menu is already open we close it
            $(this).parent().removeClass('open');
            
        } else {
        
            // opening the one you clicked on
            $(this).parent().addClass('open');

            var menu = $(this).parent().find("ul");
            var menupos = menu.offset();
          
            if ((menupos.left + menu.width()) + 30 > $(window).width()) {
                var newpos = - menu.width();      
            } else {
                var newpos = $(this).parent().width();
            }
            menu.css({ left:newpos });
        
        }

    });
});