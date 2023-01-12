export function Textbox() {
    let Textbox = $(`
        <div class="textbox">
            <input type="text" name="message" placeholder="Start typing your message..." class="input">
            <div class="btns">
            <label for="img">
                <span class="send">
                    <i class="fa fa-image ico" aria-hidden="true"></i>
                </span>
            </label>
                <input type="file" name="img_upl" id="img" hidden>
                <span class="send">
                    <i class="fa fa-paper-plane ico" aria-hidden="true"></i>
                </span>
            </div>
        </div>
    `)
    $(".chatarea").append(Textbox)
}