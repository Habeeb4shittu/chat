import { Textbox } from "./Textbox.js"

export function Chat() {
    let content = $(`
        <div class="chatarea">
            <div class="chats">
                
            </div>
        </div>
    `)
    let modal = $(`
        
    `)
    $(".content").append(modal)
    $(".content").append(content)
    Textbox()
}