$(document).ready(function () {
    $(".js-followButton").on('click', function () {
        var userId = $(this).siblings('.userId').val();
        var follower = ".follower" + userId;
        if ($(follower).val() === "友達") {
            unfollow(userId);
        } else {
            follow(userId);
        }
    });
    
});

function follow (userId) {
    $.ajax({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        url: "/follow/" + userId,
        method: "POST",
    })
    .done(function (re) {
        var follower = ".follower" + userId;
        $(follower).val("友達");
    })
    .fail(function (re) {
        console.error("通信に失敗");
    });
}

function unfollow (userId) {
    $.ajax({
        headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
        url: "/unfollow/" + userId,
        method: "POST",
    })
    .done(function (re) {
        var follower = ".follower" + userId;
        $(follower).val("友達になる");
    })
    .fail(function (re) {
        console.error("通信に失敗");
    });
}