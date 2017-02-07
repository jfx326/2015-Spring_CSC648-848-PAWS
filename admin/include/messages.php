<?php
/**
 * Prints out any messages to the user that have been stored in the session,
 * then removes them from the session.
 */
?>

<?php if (isset($_SESSION['message'])): ?>
<div class="alert alert-success" role="alert">
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</div>
<?php endif; ?>
