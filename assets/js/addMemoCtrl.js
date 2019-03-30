$(function(){
  $(".setAdd-btn").change(function(){
    var save_values = [];
    $('.setAdd-btn').each(function(){
      $(this).checked && save_values.push(encodeURIComponent($(this).attr('id')));
      console.log($(this).attr('id').$(this).checked);
    })
    $.cookie("deckSelected",save_values.join(","));
    console.log($.cookie("deckSelected"));
  });
  /*
  $("#deckid:1").change(function(){
    console.log("changed");
  });
  $(".setAdd-btn").each(function(){
    console.log($(this).attr("id"));
  });
  */
});
