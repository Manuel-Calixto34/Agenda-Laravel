<?php

namespace App\Actions;

use App\Models\Contacto;

class CreateContactoAction{
    public function execute(array $data): Contacto{
        return Contacto::create($data);
    }
}
