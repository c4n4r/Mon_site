<?php

namespace App\Infrastructure\Flash;

interface FlashMessageManagerInterface
{
    public function addFLash($type, $message);
}
