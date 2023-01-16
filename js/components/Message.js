export function Message(message, status, time) {
    let content = $(`
        <div class="message">
            <p class="${status}">${message}</p>
           <span class="${status}"> ${time}</span>
        </div>
    `)
    $(".chats").append(content)
}