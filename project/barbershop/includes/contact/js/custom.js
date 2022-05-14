/*global $, alert, console*/


$(document).ready(function(){
    $("#hide").click(function(){
      $("p").hide();
    });
    $("#show").click(function(){
      $("p").show();
    });
  });
$(function(){

    'use strict';


    // var FullNameError = true,
    //     emailError    = true,
    //     usernameError = true;

    
    // function checkErrors(){

    //   if(FullNameError===true || emailError ===true || usernameError ===true){
    //     console.log('error');
    //   }
    //   else{
    //     console.log('Form is valid');
    //   }
    // }
    // checkErrors()
    //Validation For 

$('.FullName').blur(function(){ //Error

  if($(this).val().length < 1){
      $(this).parent().find('.custom-alert').fadeIn(300);
      console.log('Hi');
      $(this).css('border','1px solid #F00');
      // FullNameError = true;
    }
    else{   //NoErrors
      $(this).css('border','1px solid #080');
      $(this).parent().find('.custom-alert').fadeOut(200);
      // FullNameError = false;
    }
  // checkErrors()
});


$('.email').blur(function(){

  if($(this).val().length < 1){
      $(this).parent().find('.emailCustom-alert').fadeIn(300);
      $(this).css('border','1px solid #F00');
      // emailError = true;
  }
  else{
      $(this).css('border','1px solid #080');
      $(this).parent().find('.emailCustom-alert').fadeOut(200);
      // emailError = false;
  }
  // checkErrors()
}); 

$('.username').blur(function(){
  // $(this).val().length < 5
  if($(this).val().length < 5){
    $(this).css('border','1px solid #F00');
    $(this).parent().find('.usernameCustom-alert').fadeIn(300);
    // console.log('Hi');
    // usernameError = true;
  }
  else{
    $(this).css('border','1px solid #080');
    $(this).parent().find('.usernameCustom-alert').fadeOut(200);
    // usernameError = false;
  
  }
  // checkErrors()
});

// Submit Validation

  // $('contact-form').submit(function(e){
  //   if(FullNameError===true || emailError ===true || usernameError ===true){
  //      e.preventDefault();
  //      $('.FullName ,.username').blur();
  //      console.log('error');
  //   }
  //   else{
     
  //   }
    
  // });

});







// $('.username').blur(function(){
//   // $(this).val().length < 5
//   if($.isNumeric($(this).val()) ===true){
//     $(this).css('border','1px solid #080');
//     $(this).parent().find('.usernameCustom-alert').fadeOut(200);
//   }
//   else{
//     $(this).css('border','1px solid #F00');
//     $(this).parent().find('.usernameCustom-alert').fadeIn(300);
//       console.log('Hi');
   
//   }
// });

