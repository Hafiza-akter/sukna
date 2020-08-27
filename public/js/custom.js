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

  $('#email_check').hide();

  $('#email_address').keyup(function(){
    var base_url = getBaseURL();
    var email = $("#email_address").val();
    if(email == ''){
      $('#email_check').hide();
    }
    else{
      // console.log(email);
    $.ajax
    ({
    type: "POST",
    url: base_url+'/api/checkemail',
    data: {'email':email},
    cache: false,
    success: function(data)
    {
      // console.log(data.email);
      $('#email_check').html (data.status);
          $('#email_check').show();
    },
    dataType: "json"
    });
  }

  });



  var base_url = getBaseURL();
    // for upazila
  $("#district_name").change(function(){
    getUpazila();
  });

  // for union
  $("#upazila_name").change(function(){
    getUnion();
  });
          

  function getBaseURL() {
    var getURL = window.location;
    
    var _return = getURL.protocol + '//' + getURL.hostname + (location.port.length ? ':'+location.port : '');
    var tmp_pathname = getURL.pathname.split('/');
    
    if ( getURL.pathname.search(/kiosk/i) > -1 ) {
    _return += '/'+tmp_pathname[1]+'/public';
    }
    return _return;
  }

  function getUpazila(){
    var district_name = $("#district_name option:selected").text();
        $.ajax
        ({
        type: "POST",
        url: base_url+'/api/getUpazila',
        data: {'district':district_name},
        cache: false,
        success: function(data)
        {
          // console.log(data.location);
          // console.log(data);
          $('#upazila_name').empty(); 
          $('#union_name').empty(); 
          $('#upazila_name').append($('<option>', {value:'', text:'--select--'}));
          $('#union_name').append($('<option>', {value:'', text:'--select--'}));
              $.each(data, function (i, item) {
                  // console.log(item.upazila_name);
                  $('#upazila_name').append($('<option>', {value:item.id, text:item.upazila_name}));
                });
        },
        dataType: "json"
        });
  }

  function getUnion(){
    var district_name = $("#district_name option:selected").text();
    var upazila_name = $("#upazila_name option:selected").text();
    // console.log(district_name,upazila_name);
    $.ajax
    ({
    type: "POST",
    url: base_url+'/api/getUnion',
    data: {'district':district_name,'upazila':upazila_name},
    cache: false,
    success: function(data)
    {
      // console.log(data.location);
      // console.log(data);
      $('#union_name').empty(); 
      $('#union_name').append($('<option>', {value:'', text:'--select--'}));
          $.each(data, function (i, item) {
              // console.log(item.upazila_name);
              $('#union_name').append($('<option>', {value:item.id, text:item.union_name}));
            });
    },
    dataType: "json"
    });
  }


  // district upazila and union show hide

  // district upazila and union show hide
  $('#district').hide();
  $('#upazila').hide();
  $('#union').hide();

  $('#user_level').on('change', function () {
    showDDBasedOnLocLevel();
  });

  showDDBasedOnLocLevel();
  // getUpazila();
  // getUnion();

  function showDDBasedOnLocLevel(){
    var selectVal = $("#user_level option:selected").text();
    if(selectVal == 'District'){
      $('#district').show();
      $('#upazila').hide();
      $('#union').hide();
    }
    if(selectVal == 'Upazila'){
      $('#district').show();
      $('#upazila').show();
      $('#union').hide();
    }
    if(selectVal == 'Union'){
      $('#district').show();
      $('#upazila').show();
      $('#union').show();
    }
  }

  $("#oldremove").click(function(){
    var id = $("#userid").val();
    // console.log(id);
      $(this).hide();
      $("#imgthumb").hide();
      $("#oldremove").hide();
      $("#imginput").show();
      $.ajax
      ({
        type: "POST",
        url: base_url+'/api/imgremove',
        data: {'userid':id},
        cache: false,
        success: function(data)
        {
          // console.log(data.location);
          // console.log(data);
          
        },
        dataType: "json"
        });
  
  });

  });
  



