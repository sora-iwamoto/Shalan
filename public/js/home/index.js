function hidePost(id) {
    'use strict'
    
    const hiddenPost= confirm("この投稿を非表示にしますか?");
    if(hiddenPost) {
        document.getElementById(`form_${id}`).submit();
    }
}
 