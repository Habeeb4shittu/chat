import { Message } from "./Message.js";

export function Textbox() {
    let Textbox = $(`
        <div class="textbox">
            <textarea type="text" name="message" placeholder="Start typing your message..." class="input" title="message"></textarea>
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
    function send() {
        $(".chats").scrollTop($(".chats")[0].scrollHeight)
        let id = $("#sendButton").data("id")
        let message = $(".input").val()
        $.post("../../src/Message.php", { id, message }, null, "json"
        ).fail((res) => {
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
    }
    $("#sendButton").on("click", function () {
        send()
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
    $(".input").on('keyup', function (e) {
        if (e.key == "Enter") {
            send()
        }
    })
}