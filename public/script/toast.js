$(function () {
    const progressToast = $('#toast-progress');
    let url = window.location.pathname;
    const toast = $("#toast-id");
    let timer;
    $('.toast').hide();
  
    if(url == '/login.php')
      $('.toast-message').text('Account doesn\'t exist');
  
    progressToast.css('width', '100%');
    $('.toast').slideDown('fast');
    for (let i = 100; i > 0; i--){
      setTimeout(function(){
        progressToast.css('width', 'calc(100% - ' + i + '%');
      }, 35 * i);
      timer = i;
    }
    if (timer == 1){
      setTimeout(function(){
        $('.toast').slideUp('fast');
      }, 4000);
    }
  
    // When the user clicks on <span> (x), close the modal
    $('.toast-dismiss').on('click', function() {
      progressToast.css('width', '100%');
      $('.toast').slideUp('fast');
    })
  
  });