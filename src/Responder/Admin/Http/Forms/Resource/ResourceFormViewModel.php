<?php

namespace App\Responder\Admin\Http\Forms\Resource;
use JetBrains\PhpStorm\Pure;

class ResourceFormViewModel {
    #[Pure] public function __construct(public $form,
                                        public ?string $label = null,
                                        public $errors = []
    ){}
}
