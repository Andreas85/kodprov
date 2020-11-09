<div class="container mt-2 pl-5 pr-5">
<?php
if ($messages->num_rows) {
  while ($row = $messages->fetch_assoc()) {
?>
  <div class="row message-row mb-2">
    <div class="col-md-11">
      <div class="row">
        <div class="col-12"><b><?php echo htmlspecialchars($row['email']); ?></b></div>
      </div>
      <div class="row">
        <div class="col-12"><?php echo htmlspecialchars($row['message']); ?></div>
      </div>
    </div>
    <div class="col-md-1 menu-col">
      <a href="index.php?page=messages&del=<?php echo $row['id'];?>" class="delete-message">Delete</a>
    </div>
  </div>
<?php
  }
} else {
?>
  <div class="row mb-2">
    <div class="col-12">
      No messages.
    </div>
  </div>
<?php
}
?>

</div>
