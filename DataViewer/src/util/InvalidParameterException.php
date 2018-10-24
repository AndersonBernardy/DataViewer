<?php

class InvalidParameterException extends Exception
{

    /**
     *
     * {@inheritdoc}
     * @see Exception::getMessage()
     */
    public function getMessage(string $parameter): string
    {
        return "$parameter is not set.";
    }
    
}