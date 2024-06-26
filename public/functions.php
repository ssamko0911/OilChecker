<?php

function basicRedirect(): void
{
    header('Location: index.php');
    exit();
}
function getIndexView(array $attributes = []): void
{
    extract($attributes);
    header('Location: index.php');
}

function checkString(string $value, int $min = 1, int $max = 10): bool
{
    $value = trim($value);
    return strlen(trim($value)) >= $min && strlen(trim($value)) <= $max;
}