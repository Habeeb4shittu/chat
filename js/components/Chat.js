import { Textbox } from "./Textbox.js"

export function Chat() {
    let content = $(`
        <div class="chatarea">
            <div class="chats">
                
            </div>
        </div>
    `)
    $(".content").append(content)
    $(".content").find(".my-friends").show(1000)
    Textbox()
}