<?php

$emails = preg_split(
    '/\s*,\s*/',
    (string) env('ADMIN_EMAILS', ''),
    -1,
    PREG_SPLIT_NO_EMPTY
);

$emails = array_map(
    static fn (string $email): string => strtolower(trim($email)),
    $emails
);

return [
    'allowed_emails' => array_values(
        array_unique(
            array_filter($emails)
        )
    ),
];