var today = new Date();
var baseDate = new Date(today.getFullYear(), today.getMonth(), 1);
$(document).ready(function () {
   showCalendar(today);
   $('.back').on('click', function () {
      backMonth();
   });
   $('.next').on('click', function () {
      nextMonth();
   });
});
   

var today = new Date();
var baseDate = new Date(today.getFullYear(), today.getMonth(), 1);
$(document).ready(function () {
   showCalendar(today);
   $('.back').on('click', function () {
      backMonth();
   });
   $('.next').on('click', function () {
      nextMonth();
   });
});

function showCalendar(day) {
   var year = day.getFullYear();
   var month = day.getMonth();
   $('.CalendarTitle').text(year + '年' + (month+1) + '月');
   
   var calendar = createCalendar(year, month);
   $('.date').html(calendar);
}

function createCalendar(year, month) {
   var cnt = 0;
   var thisMonth = new Date(year, (month+1), 1).getMonth();
   var thisYear = new Date(year, (month+1), 1).getFullYear();
   var firstDayOfWeek = new Date(year, month, 1).getDay();
   var lastDate = new Date(year, (month+1), 0).getDate();
   var lastMonth = new Date(year, (month+1), 0).getMonth();
   var lastMonthLastDate = new Date(year, month, 0).getDate();
   var nextMonth = new Date(year, (month+2), 1).getMonth();
   var WeekCnt = Math.ceil((firstDayOfWeek + lastDate) / 7);
   
   var calendar = '';
   
   for (var i = 0; i < WeekCnt; i++) {
     var week = '<tr>';
     for (var j = 0; j < 7; j++) {
        if (i === 0 && j < firstDayOfWeek) {
           var lastMonthDay = "<td class='day'>" + "<form method='get' action='/calendar/plan'>" + "<input type='hidden' name='year' value='" + thisYear + "'>" + "<input type='hidden' name='month' value='" + lastMonth.toString().padStart(2, '0') + "'>" + "<input type='hidden' name='date' value='" + (lastMonthLastDate - firstDayOfWeek + j + 1).toString().padStart(2, '0') + "' />" + "<input class='lastMonth' type='button' name='date' value='" + (lastMonthLastDate - firstDayOfWeek + j + 1) + "' />" + "<input type='submit' value=''>" + '</form>' + '</td>';
           week += lastMonthDay;
        } else if (cnt >= lastDate) {
           cnt++;
           var nextMonthDay = "<td class='day'>" + "<form method='get' action='/calendar/plan'>" + "<input type='hidden' name='year' value='" + thisYear + "'>" + "<input type='hidden' name='month' value='" + nextMonth.toString().padStart(2, '0') + "'>" + "<input type='hidden' name='date' value='" + (cnt - lastDate).toString().padStart(2, '0') + "'/>" + "<input class='nextMonth' type='button' name='date' value='" + (cnt - lastDate) + "'/>" + "<input type='submit' value=''>" + '</form>' + '</td>';
           week += nextMonthDay;
        } else {
           cnt++;
           var thisMonthDay = "<td class='day'>" + "<form method='get' action='/calendar/plan'>" + "<input type='hidden' name='year' value='" + thisYear + "'>" + "<input type='hidden' name='month' value='" + thisMonth.toString().padStart(2, '0') + "'>" + "<input type='hidden' name='date' value='" + (cnt).toString().padStart(2, '0') + "' />" + "<input class='thisMonth' type='button' name='date' value='" + (cnt) + "' />" + "<input type='submit' value=''>" + '</form>' + '</td>';
           
           week += thisMonthDay;
        }
     }
     week += '</tr>';
     calendar += week;
   }
   return calendar;
}

function nextMonth () {
   baseDate.setMonth(baseDate.getMonth() + 1);
   showCalendar(baseDate);
}

function backMonth () {
   baseDate.setMonth(baseDate.getMonth() - 1);
   showCalendar(baseDate);
}