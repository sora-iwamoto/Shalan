//スクロール
$(document).ready(function()  {
    $(".messageBody").scrollTop($(".messageBody")[0].scrollHeight - $(".messageBody").outerHeight());
});

// ボタンの表示
$(function(){
    $(".textBox").on("input",function () {
    if ($(this).val().length > 0) {
        $(".submitButton").show();
    } else {
        $(".submitButton").hide();
    }
    });
});

// 
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   $(".submitButton").click(function() {
        $.ajax({
            url: "/messages",
            data: {
                content: $(".textBox").val(),
                name: $(".messageName").val(),
                user_id: $(".messageUserId").val(),
                receiver_id: $(".messageReceivedId").val(),
            },
            method: "POST"
        }).done(function (){
            $(".textBox").val('');
            $(".messageBody").get(0).scrollTo(0, $(".messageBody").get(0).scrollHeight);
        }).fail(function() {
            console.error('通信エラー');
        });
        return false;
    });

    
     window.Echo.channel('message')
        .listen('messageReceived', function(e) {
            var date = new Date(e.message.created_at);
            var year = date.getFullYear();
            if (date.getMonth() < 10) {
                var month =date.getMonth() + 1;
                month = "0" + month;
            } else {
                var month = date.getMonth() + 1;
            }
            if (date.getDate() < 10) {
                var day = "0" + date.getDate();
            } else {
                var day = date.getDate();
            }
            if (date.getHours() < 10) {
                var hour = "0" + date.getHours();
            } else {
                var hour = date.getHours();
            }
            if (date.getMinutes() < 10) {
                var minute = "0" + date.getMinutes();
            } else {
                var minute = date.getMinutes();
            }
            
            if (e.message.name === loginName) {
                var html = 
                "<div class='eachMessage messagerignt'>" + 
                    "<div class='submitTime'>" + year + "/" + month + "/" + day + "/ " + hour + ":" + minute + "</div>" +
                    "<span class ='recipientName'>" + e.message.name + "</span>" +
                    "<div class='messageContent messageContentrignt'>" + e.message.content + "</div>" +
                "</div>";
            } else {
                var html = 
                "<div class='eachMessage messageleft'>" + 
                    "<div class='submitTime'>" + year + "/" + month + "/" + day + "/ " + hour + ":" + minute + "</div>" +
                    "<span class ='recipientName'>" + e.message.name + "</span>" +
                    "<div class='messageContent messageContentleft'>" + e.message.content + "</div>" +
                "</div>";
            }
            
            $(".messageBody").append(html);
        });
    
});
