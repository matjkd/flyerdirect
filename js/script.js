
// remap jQuery to $
(function($){

 





 



    })(this.jQuery);



// usage: log('inside coolFunc',this,arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
    log.history = log.history || [];   // store logs to an array for reference
    log.history.push(arguments);
    if(this.console){
        console.log( Array.prototype.slice.call(arguments) );
    }
};

$(document).ready(function() {
    
     $('.slideshow-0').cycle({
        speedIn:  2000,
        speedOut: 2000,
        timeout:   10000,
        fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    });
    
     $('.slideshow-1').cycle({
        speedIn:  2000,
        speedOut: 2000,
        timeout:   10000,
        fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    });
    
    
    $('.slideshow-2').cycle({
        speedIn:  2000,
        speedOut: 2000,
        timeout:   10000,
        fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
    });
    
    $('.big_menu').css("display", "block");
});
       


// catch all document.write() calls
(function(doc){
    var write = doc.write;
    doc.write = function(q){ 
        log('document.write(): ',arguments); 
        if (/docwriteregexwhitelist/.test(q)) write.apply(doc,arguments);  
    };
})(document);




//wymeditor
jQuery(function() {
    jQuery('.wymeditor').wymeditor();
});






//jquery ui buttons
$(function() {
    $("button, input:submit").button();
		
});


//date picker on menu page

$(document).ready(function() {
    $( "#datepicker" ).datepicker({
        dateFormat : 'DD, d MM, yy',
        onSelect : function(dateText, inst)
        {
            var epoch = $.datepicker.formatDate('@', $(this).datepicker('getDate')) / 1000;

            $('#alternate').val(epoch);
        }
    });


    $( "#datepicker2" ).datepicker({
        dateFormat : 'DD, d MM, yy',
        onSelect : function(dateText, inst)
        {
            var epoch = $.datepicker.formatDate('@', $(this).datepicker('getDate')) / 1000;

            $('#alternate2').val(epoch);
        }
    });


});




//Modal dialog increase the default animation speed to exaggerate the effect
$.fx.speeds._default = 500;
$(document).ready(function(){
    $( "#dialog" ).dialog({
        autoOpen: false,
        show: "fade",
        hide: "fade",
        width: 500
    });

    $( "#opener" ).click(function() {
        $( "#dialog" ).dialog( "open" );
        return false;
    });
});


 
    
$(document).ready(function() {   
    
    /*************************************************
    /*    menu hover
    /***********************************************/
     $("#menutop li a").hover(
     function() {
        
            $(this).stop().animate({
                color:"#660800"
             
              
            },
            150
            );
               
            $(this).find('.clickhere').fadeIn(100);        
        },
        function() {
        
            $(this).stop().animate({
                
                color:"#ffffff"
               
                
            
            },
            150
            );
           
        }
        );
    
    /*************************************************
    /*    blue button hover
    /***********************************************/
    $(".bluebox").hover(
        function() {
        
            $(this).stop().animate({
                backgroundColor:"#51a5fc"
             
              
            },
            150
            );
               
            $(this).find('.clickhere').fadeIn(100);        
        },
        function() {
        
            $(this).stop().animate({
                
                backgroundColor:"#0061c4"
               
                
            
            },
            150
            );
            $(".clickhere").fadeOut(100);
        }
        );
            
               
    /*************************************************
    /*    feature box hover
    /***********************************************/
    $(".dark").hover(
        function() {
       
            $(this).stop().animate({
                backgroundColor:"#077eff"
              
             
            },
            150
            );
               
            $(this).find('.clickhere').fadeIn(100);        
        },
        function() {
        
            $(this).stop().animate({
                  backgroundColor:"#003f80"
               
               
            
            },
            150
            );
            $(".clickhere").fadeOut(100);
        }
        );
            
  
            
             
    /*****************************************
    /* Sticky Nav 
    /****************************************/

    var navPos = $('.nav').offset().top;
    var featuresPos = $('.features').offset().top;

    $(window).on('scroll', function(evt) {
        var scrollTop = $(this).scrollTop()
        winHeight = $(window).height();

        window.clearTimeout(window.timeout);

        window.timeout = setTimeout(function() {
            // Set the sticky nav
            if (scrollTop > navPos) {
                $('.nav').not('.sticky').addClass('sticky');
            
            } else {
                $('.nav.sticky').removeClass('sticky');
            }
            
            if (scrollTop > (featuresPos-20)) {
             //   $('.features').not('.sticky2').addClass('sticky2');
              //  $('.sticky2').stop().animate({
              
                  //  top: scrollTop-400
            
            //    },
              //  150
              //  );
                
               
               
            } else {
                $('.features.sticky2').removeClass('sticky2');
             
            }
            

  
        }, 10);
    });
    
           
    /*****************************************
    /* Scroll to 
     /****************************************/
    $('.feature_box a').on('click', function(evt) {
        $.scrollTo($(this).attr('href'), 800, {
            offset:-40
        });
    
        return false;
   
    });
    
    $('.services_box a').on('click', function(evt) {
        $.scrollTo($(this).attr('href'), 800, {
            offset:-40
        });
      
        return false;
   
  
    });
    $('.service a').on('click', function(evt) {
        $.scrollTo($(this).attr('href'), 800, {
            offset:-40
        });
      
        return false;
   
  
    });
    
    /*******************************************
    /* Central Services rollovers
     /****************************************/
    
    $('.services').mouseenter(function() {
           
        $(this).stop().animate({
            backgroundColor:"#51a5fc"
              
             
        },
        150
        );
         
             
        
           
    });
    $('.services').click(function() {
        var serviceid = "#box_" +$(this).attr('id');
            
        $(".service").stop().animate({
            backgroundColor:"#5687B5"
              
             
        },
        150
        );
        $(serviceid).stop().animate({
            backgroundColor:"#51a5fc"
              
             
        },
        150
        );
        
           
    });
         
         
     
         
               
    $('.services').mouseleave(function() {
            
        $(this).stop().animate({
            backgroundColor:"#077eff"
              
             
        },
        150
        );
  
               
    });
    
    
     $('.service').click(function() {
       
            
        $(".service").stop().animate({
            backgroundColor:"#5687B5"
              
             
        },
        150
        );
        $(this).stop().animate({
            backgroundColor:"#51a5fc"
              
             
        },
        150
        );
        
           
    });
    
  
    
});
