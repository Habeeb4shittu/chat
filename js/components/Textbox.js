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
    $("#sendButton").on("click", function () {
        let id = $(this).data("id")
        let message = $(".input").val()
        $.post("../../src/Message.php", { id, message }, null, "json"
        )
        $(".input").val("")
    });
    setInterval(() => {
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
                $(".chats").scrollTop(
                    $(".chats")[0].scrollHeight
                )
            })
    }, 1000);
}