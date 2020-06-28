<?php
if ( !empty( $message ) ) {
    ?>
  <div class="alert alert-<?php echo array_key_exists( $message, ['success'] ) ? 'success' : 'warning'; ?>">
    <p><?php echo $message['success'] ?? $message['warning']; ?></p>
  </div>

<?php }?>
