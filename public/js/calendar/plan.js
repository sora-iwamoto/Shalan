$(document).ready(function () {
   $('.startDate').datepicker({
      changeMonth: true,
      dateFormat: ('yy年mm月dd日')
      });
   $('.endDate').datepicker({
      changeMonth: true,
      dateFormat: ('yy年mm月dd日')
      });
      
   $('.selectTime').on('click', function () {
      var select = '<select>';
      var date = new Date(2023, 1, 1, 0, 0);
      while (date.getDate() == 1) {
         select += "<option value='" + date.getHours().toString().padStart(2, '0') + ":" + date.getMinutes().toString().padStart(2, '0') + "'>" + date.getHours().toString().padStart(2, '0') + ":" + date.getMinutes().toString().padStart(2, '0') + "</option>";
         date.setMinutes(date.getMinutes() + 10);
      }
      
      select += '</select>';
      $('.start').append(select);
      $('.end').append(select);
      $('.selectTime').remove();
   });
   $('.member').on('input', function () {
      if (($('.member').val()) !== '') {
      $.ajax({
         url: '/calendar/members/' + $('.member').val(),
         data: {
            member: $('.member').val(),
         },
         dataType: 'json',
         type: 'GET'
      }).done(function (searchMember) {
         if (searchMember.length === 0) {
            $('.searchMember').css('display', 'none');
         } else {
            $('.searchMember').css('display', 'block');
             var member = '';
             var memberName = '';
            for (var i=0; i < searchMember.length; i++) {
               memberName = searchMember[i]['name'];
               member += "<li class='eachMember " + memberName + "'>" + memberName + "</li>";
            }
            
            $('.memberList').html(member);
            
            $('.eachMember').on('click', function() {
               $('.participants').css('display', 'block');
               var selectedName = $(this).text();
               var i=0;
               var memberList = '<div>' + selectedName + "</div><input type='hidden' value='" + selectedName + "' />"; 
               $('.participants').append(memberList);
               $('.member').val('');
               i++;
               if(i>0) ;
            });
         }
         
         $(document).click(function(event) {
          if (!$('.searchMember').is(event.target)) {
             $('.searchMember').css('display', 'none');
          }
         });
      }).fail(function () {
         console.error('通信エラー');
      });
      } else {
         $('.searchMember').css('display', 'none');
      }
      return false;
   });
   
});

function initMap() {
   const input = document.getElementById("place");
   const searchBox = new google.maps.places.SearchBox(input);


   searchBox.addListener('places_changed', function() {
   let places = searchBox.getPlaces();
   input.value = places[0]['name'] + ', ' + places[0]['formatted_address'];
});
   
}