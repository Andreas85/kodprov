$(document).ready(function(){
  $('.delete-message').on('click', function(e) {

    if (confirm('Are you sure you want to delete this message?')) {
        return true;
    } else {
        return false;
    }
  });
});
