<?php
if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
    foreach ($_SESSION['errors'] as $error) {
        ?> <span class="text-danger text-justify">- <?php echo $error ?></span> <br><?php
    }
    unset($_SESSION['errors']);
}
?>

<?php
if (isset($_SESSION[ACTION_STATUS_SUCCESS])) {
    ?> <span class="text-success text-justify">- <?php echo $_SESSION[ACTION_STATUS_SUCCESS] ?></span> <br><?php
    unset($_SESSION[ACTION_STATUS_SUCCESS]);
}
?>

<?php
if (isset($_SESSION[ACTION_STATUS_FAILED])) {
    ?> <span class="text-danger text-justify">- <?php echo $_SESSION[ACTION_STATUS_FAILED] ?></span> <br><?php
    unset($_SESSION[ACTION_STATUS_FAILED]);
}
?>