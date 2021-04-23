<?php

namespace App\Responder\Admin\Http\Forms\Add;
use JetBrains\PhpStorm\Pure;

class AddViewModel {
    #[Pure] public function __construct(public $form, public ?string $message = null, public $errors = []){}
}
