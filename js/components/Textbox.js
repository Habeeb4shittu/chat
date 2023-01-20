import { Message } from "./Message.js";

export function Textbox() {
    let Textbox = $(`
        <div class="textbox">
            <textarea type="text" name="message" placeholder="Start typing your message..." class="input"></textarea>
            <div class="btns">
            <label for="img">
                <span class="send">
                    <i class="fa fa-image ico" aria-hidden="true"></i>
                </span>
            </label>
                <input type="file" name="img_upl" id="img" hidden>
                <button class="send"  id="sendButton">
                    <i class="fa fa-paper-plane ico" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    `)
    $(".chatarea").append(Textbox)
    $("#sendButton").attr('disabled', true);
    $(".input").on('input', function () {
        if ($(this).val() == "") {
            $("#sendButton").attr('disabled', true);
        } else {
            $("#sendButton").attr('disabled', false);
        }
    })
    $("#sendButton").on("click", function () {
        let id = $(this).data("id")
        let message = $(".input").val()
        $.post("../../src/Message.php", { id, message }, null, "json"
        ).fail((res) => {
            console.log(res.responseText)
        })
        $(".input").val("")
        let me = $("#sendButton").data("id")
        $.post("../../src/friends.php", null, null, "JSON")
            .done(function (result) {
                $("#sendButton").attr('disabled', true);
                let friendId = me.data("id");
                $(".chats").empty()
                $(".nav-details").empty()
                $(".textbox").remove()
                Chat()
                $("#sendButton").data({ id: friendId })
                let user = result.filter((user) => user.id == friendId)[0];
                let image = $(`<img src="../../assets/${user.image}" alt=""> `)
                let name = $(`
                                   <span class="name">${user.firstname} ${user.lastname}</span>
                                `)
                $(".nav-details").append(image)
                $(".nav-details").append(name)
            })
    });
    let fetchMsg = setInterval(fetchMessage, 1000);
    function fetchMessage() {
        let id = $("#sendButton").data("id")
        $.post("../../src/fetchMessage.php", { id }, null,
            "JSON"
        )
            .done(function (result) {
                $(".chats").empty();
                $(result).each((i, el) => {
                    var status
                    if (el.sender == id) {
                        status = "incoming"
                    } else {
                        status = "outgoing"
                    }
                    Message(el.message, status, el.send_time)
                });
                if ($(".hidden").text() == "dark") {
                    $(".ico").addClass("dark")
                    $(".outgoing, .incoming").addClass("dark")
                }
            })
    }
    $(".chats").scrollTop($(".chats")[0].scrollHeight)
    // $(".chats").on("scroll", function () {
    //     // console.log($(this).scrollTop());
    //     // console.log($(this)[0].scrollHeight);
    //     // if ($(this)[0].scrollHeight < $(this).scrollTop()) {
    //     // console.log("true");
    //     clearInterval(fetchMsg)
    //     // } else {
    //     //     console.log("false");
    //     //     setInterval(fetchMsg, 1000)
    //     // }
    // })
}