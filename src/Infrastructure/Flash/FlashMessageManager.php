<?php


namespace App\Infrastructure\Flash;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FlashMessageManager implements FlashMessageManagerInterface
{

    public function __construct(private SessionInterface $session){}

    public function addFLash($type, $message) {
        $this->session->getFlashBag()->add($type, $message);
    }

}
