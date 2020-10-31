$(document).ready(function(){
    setTimeout(function(){
      $("#flashMessage").slideUp(1000);
    },3000);
  });

$(document).ready(function(){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

    $("#remove-btn").click(function(){
      console.log('dfdsdfsd');
      $(this).hide();
      $('.remove-img').hide();
      $('#inputimg').show();
      $(".bannimg").show();
    });
    setTimeout(function(){
      $("#flashMessage").slideUp(1000);
    },3000);
  });
