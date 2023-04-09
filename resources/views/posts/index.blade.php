<div class="modal js-modal">
    <div class="modal-back js-modal-close"></div>
    <div class="modal-content">
        <span class="js-modal-close closeMark">×</span>
        <form action="/posts" method="POST"  class="modal-form">
            @csrf
            <textarea class="modal-body" name="post[body]"  placeholder="ここに入力してください"></textarea>
            <input class="modal-submit" type="submit" value="投稿"/>
            <input type="hidden" name="post[user_id]" value={{auth()->id()}} />
        </form>
    </div>
</div>