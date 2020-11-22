<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class MatchOldPassword implements Rule
{
	public $u="";
	public $c=0;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($a,$b)
    {
        $this->u=$a;
		$this->c=$b;
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
         if(!Hash::check($value,$this->u->password))
			 return false;
		 else
			 return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
       if($this->c==0)
		   return "Invalid Password";
	   else
		   return "Old Password Is Invalid";
    }
}