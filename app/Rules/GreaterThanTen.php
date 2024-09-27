<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Caso;
class GreaterThanTen implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $unit = request()->input('unidad');
        $caso = Caso::where('unidad', $unit)->where('numero_caso', $value)->first();
        if($caso){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Numero de caso ya esta registrado en esta unidad.';
    }
}
