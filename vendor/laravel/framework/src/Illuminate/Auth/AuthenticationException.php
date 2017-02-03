<?php

namespace Illuminate\Auth;

use Exception;

class AuthenticationException extends Exception
{
    /**
     * Create a new authentication exception.
     *
     * @param string  $message
     */
    public function __construct($message = 'Unauthenticated.1')
    {
        parent::__construct($message);
    }
}
