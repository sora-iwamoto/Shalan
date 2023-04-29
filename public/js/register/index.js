$(function (){
    $('#form_img').on('change', function () {
        const profileImgName = this.files[0];
        const url = URL.createObjectURL(profileImgName);
        $('.profileImg').css('background-image', `url(${url})`);
    });    
});
