<?php
function is_level($level)
{
    return isset($_SESSION['user']) && $_SESSION['user']['level'] == $level;
}
?>