(function($) {
	
  "use strict"; // Start of use strict
	$(function(){
  // Floating label headings for the contact form
  $("body").on("input propertychange", ".floating-label-form-group", function(e) {
    $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
  }).on("focus", ".floating-label-form-group", function() {
    $(this).addClass("floating-label-form-group-with-focus");
  }).on("blur", ".floating-label-form-group", function() {
    $(this).removeClass("floating-label-form-group-with-focus");
  });

  // Show the navbar when the page is scrolled up
  var MQL = 992;

  //primary navigation slide-in effect
  if ($(window).width() > MQL) {
    var headerHeight = $('#mainNav').height();
    $(window).on('scroll', {
        previousTop: 0
      },
      function() {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < this.previousTop) {
          //if scrolling up...
          if (currentTop > 0 && $('#mainNav').hasClass('is-fixed')) {
            $('#mainNav').addClass('is-visible');
          } else {
            $('#mainNav').removeClass('is-visible is-fixed');
          }
        } else if (currentTop > this.previousTop) {
          //if scrolling down...
          $('#mainNav').removeClass('is-visible');
          if (currentTop > headerHeight && !$('#mainNav').hasClass('is-fixed')) $('#mainNav').addClass('is-fixed');
        }
        this.previousTop = currentTop;
      });
  }

  // Select box for category
  $("select").on("click" , function() {
  	console.log('here');
    $(this).parent(".select-box").toggleClass("open");
    
  });
  
  $(document).mouseup(function (e)
  {
      var container = $(".select-box");
  
      if (container.has(e.target).length === 0)
      {
          container.removeClass("open");
      }
  });
  
  
  $("select").on("change" , function() {
    var selection = $(this).find("option:selected").text(),
        labelFor = $(this).attr("id"),
        label = $("[for='" + labelFor + "']");
	  $("body").prepend('<div class="ui-widget-overlay" style="z-index: 1001;"></div>');
    $("body").prepend('<div id ="PleaseWait" style="position: absolute; width: 100vw; height: 100%; background-color: rgba(255,255,255, 0.5);z-index: 999999;"></div>');
      
    label.find(".label-desc").html(selection);
      $.post(vars.ajax_url,{term: $(this).val(),action: 'filters'},function(response){
		 var content = JSON.parse(response);
		 $('.blog_results').html(content.content);
		  $("#PleaseWait").remove();
		  $(".ui-widget-overlay").remove();
	  })
  });
		
  
  $("#qs-btn").on("click" , function(e) {
    e.preventDefault();
 	$("body").prepend('<div class="ui-widget-overlay" style="z-index: 1001;"></div>');
    $("body").prepend('<div id ="PleaseWait" style="position: absolute; width: 100vw; height: 100%; background-color: rgba(255,255,255, 0.5);z-index: 999999;"></div>');


    var selection = $('#qs').val()
  
    $.post(
      vars.ajax_url,
      {term: selection, action: 'filters'},
      function( response ) { 
		  var content = JSON.parse(response);
		  $('.blog_results').html(content.content);
    	  $("#PleaseWait").remove();
		  $(".ui-widget-overlay").remove();
		  $('#qs').val("");
	    })
    });
		
		
	})

})(jQuery); // End of use strict
