$(document).ready(function() {
    var arr = []; // List of users

    // chat input plus 
    $(document).on("click", ".chat-box .chat-footer .animated-btn", function() {
        $(this).parents(".add-extent").toggleClass("show")
    });

    $(document).on("click", ".chat-header", function() {
        var chatbox = $(this).parents().attr("rel");
        $('[rel="' + chatbox + '"] .chat-wrap').slideToggle("slow");
        return false;
    });

    $(document).on("click", ".close-chat", function() {
        var chatbox = $(this).parents('.chat-box').attr("rel");
        $('[rel="' + chatbox + '"]').hide();
        arr.splice($.inArray(chatbox, arr), 1);
        displayChatBox();
        return false;
    });

    $(document).on("click", ".conversation-panel .friend-section .friend-box", function() {
        var userID = $(this).attr("class");
        var username = $(this).children(".media").children(".media-body").find(".user-name").text();
        var userImage = $(this).children(".media").children(".user-img").children("img").attr("src");
        var userAvailable = $(this).children(".media").children(".user-img").children(".available-stats").attr("class");


        if ($.inArray(userID, arr) != -1) {
            arr.splice($.inArray(userID, arr), 1);
        }


        arr.unshift(userID);
        chatPopup =
            '<div class="chat-box" style="right:270px" rel="' +
            userID +
            '">' +
            '<a href="profile.html" class="chat-header">' +
            '<div class="name">' +
            '<div class="user-img" style="background-image: url(' + userImage + ');">' +
            '<span class="' + userAvailable +
            '"></span>' +
            '</div>' +
            '<span>' + username + '</span> </div>' +
            '<div class="menu-option">' +
            '<ul>' +
            '<li><img src="../assets/svg/video.svg"></li>' +
            '<li><img src="../assets/svg/phone.svg"></li>' +
            '<li><img src="../assets/svg/settings.svg"></li>' +
            '<li class="close-chat"><img src="../assets/svg/x.svg"></li>' +
            '</ul>' +
            '</div>' +
            '</a>' +
            '<div class="chat-wrap"> <div class="chat-body"><div class="msg_push"></div> </div>' +
            '<div class="chat-footer">' +
            '<input placeholder="type your message here.." class="chat-input form-control emojiPicker"></input>' +
            '<div class="add-extent">' +
            '<i class="fas fa-plus animated-btn"></i>' +
            '<div class="options">' +
            '<ul>' +
            '<li><img src="../assets/svg/image.svg"></li>' +
            '<li><img src="../assets/svg/paperclip.svg"></li>' +
            '<li><img src="../assets/svg/camera.svg"></li>' +
            '</ul>' +
            '</div>' +
            '</div>' +
            '</div></div></div>';

        $("body").append(chatPopup);
        displayChatBox();
    });

    $(document).on("keypress", ".chat-input", function(e) {
        if (e.keyCode == 13) {
            var msg = $(this).val();
            $(this).val("");
            if (msg.trim().length != 0) {
                var chatbox = $(this).parents().parents().parents().attr("rel");
                $('<div class="msg-right"> <span>' + msg + "</span></div>").insertBefore(
                    '[rel="' + chatbox + '"] .msg_push'
                );
                $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
            }
        }
    });

    function displayChatBox() {
        i = 170; // start position
        j = 330; //next position

        $.each(arr, function(index, value) {
            if (index < 4) {
                $('[rel="' + value + '"]').css("right", i);
                $('[rel="' + value + '"]').show();
                i = i + j;
            } else {
                $('[rel="' + value + '"]').hide();
            }
        });
    }


});