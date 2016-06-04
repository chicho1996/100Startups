$(function(){

	function addAnimation(mainClass,addClassName,index){
          
          $("."+mainClass).eq(index).attr("class", mainClass);
          $("."+mainClass).eq(index).addClass("animated");
          $("."+mainClass).eq(index).addClass(addClassName);
    }
  function addAnimation1(mainClass,addClassName){
          
          $("."+mainClass).attr("class", mainClass);
          $("."+mainClass).addClass("animated");
          $("."+mainClass).addClass(addClassName);
    }



    var IndexofButton=$(".button-circle").attr("index");
    var indexOfProjects=$('.All-projects').attr("index");
    $(".button-circle").eq(0).addClass("Button-active");
    $(".All-projects").eq(0).addClass("Project-active");
    var slider_index=0;
    
    function next()
    {
      slider_index++;

     $(".All-projects").removeClass("Project-active");
     $(".All-projects").eq(slider_index).addClass("Project-active");
     $(".button-circle").removeClass("Button-active");
     $(".button-circle").eq(slider_index).addClass("Button-active");

     if(slider_index==$(".All-projects").length-1)
      slider_index=-1;
      
      
    }
    function prev(){
       slider_index--;

     $(".All-projects").removeClass("Project-active");
     $(".All-projects").eq(slider_index).addClass("Project-active");
     $(".button-circle").removeClass("Button-active");
     $(".button-circle").eq(slider_index).addClass("Button-active");
     if(slider_index==-1)
      slider_index=$(".All-projects").length;
      
    }
     $(".Slide-right").click(function(){

      next();

    });
    $(".Slide-left").click(function(){

      prev();

    });









    $(window).scroll(function(){

       
    		var t = $(window).scrollTop() +400;
    		var p = $(".Project-page-buttons").offset().top;
    		addAnimation1('Project-blocks',"flipInY");
		});



});