<?php
function SafeValue($value)
{
    $value = str_replace("<", "&lt;", $value);
    $value = str_replace(">", "&gt;", $value);
    $value = str_replace("'", "`", $value);

    return $value;
}
?>