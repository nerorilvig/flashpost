$(function(){
  $(window).resize(function(){
    var wid = $(window).width();     
    if(wid <= 992){
      console.log("width under 992px")
      /*
      $('#navtop').css({
        background-color:'red'
      });
      */
    }else{
      console.log("width over 992px")
      /*
      $('#navtop').css({
        background-color:'white'
      });
      */
    }
  });
});
