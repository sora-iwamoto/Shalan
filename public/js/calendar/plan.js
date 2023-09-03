$(document).ready(function () {
   $('.startDate').datepicker({
      changeMonth: true,
      onSelect: function (dateText) {
         $('#startDate').val(dateText);
      },
      });
   $('.endDate').datepicker({
      changeMonth: true,
      onSelect: function (dateText) {
         $('#endDate').val(dateText);
      },
      });
      
   $('.selectTime').on('click', function () {
      var selectStart = $("<select name='plan[startTime]'>");
      var selectEnd = $("<select name='plan[endTime]'>");
      
      var date = new Date(2023, 1, 1, 0, 0);
      while (date.getDate() == 1) {
         var optionValue = date.getHours().toString().padStart(2, '0') + ":" + date.getMinutes().toString().padStart(2, '0');
         var option = $("<option>").attr("value", optionValue).text(optionValue);
         console.log(option);
         selectStart.append(option);
         selectEnd.append(option.clone());
         
         date.setMinutes(date.getMinutes() + 10);
      }
      
      $('.start').append(selectStart);
      $('.end').append(selectEnd);
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
   
   $('.submitBtn').click(function() {
      
   })
});
