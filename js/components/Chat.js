import { Textbox } from "./Textbox.js"

export function Chat() {
    let content = $(`
        <div class="chatarea">
            <div class="chats">
                
            </div>
        </div>
    `)
    $(".content").find(".my-friends").hide(1000)
    $(".content").append(content)
    $(".content").find(".my-friends").remove()
    $(".opt.add").prop('disabled', false)
    $(".users").removeClass("slide")
    Textbox()
}