<div class="container mt-2">
  <div class="row">
    <form action="index.php?page=contact" method="post" name="contact-form" data-contact-form>
      <div class="col-12">Email address</div>
      <div class="col-12"><input type="text" name="email" data-email></div>
      <div class="col-12">Message</div>
      <div class="col-12"><textarea rows="5" name="message" data-message></textarea></div>
      <div class="col-12"><input type="submit" value="Submit"></div>
      <div class="col-12"><?php if (isset($result) && $result == 1) { ?>Message sent<?php } ?></div> 
    </form>
  </div>
</div>
