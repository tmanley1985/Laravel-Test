<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Elegant extends Model
{
    /** @type array $rules */

    protected $rules = array();

    /** @type array */
    protected $errors;

    /**
     * Validate request data.
     * 
     * @param  array $array Array of input.
     * 
     * @return boolean
     */
    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this->rules);

        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();

            return false;
        }

        // validation pass
        return true;
    }

    /**
     * Return errors.
     * 
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }
}