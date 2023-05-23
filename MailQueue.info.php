<?php
    $info = [
        "title" => "Mail Queue",
        "version" => 200,
        "summary" => "Catches e-mails that could not be delivered and tries to resend them periodically up to 48 hours.",
        "singular" => true,
        "autoload" => true,
        "icon" => "paper-plane",
        "author" => "Johannes Dachsel | Hochwarth IT GmbH",
        "requires" => ["WireMailSmtp"],
        "installs" => ["LazyCron"]
    ];
