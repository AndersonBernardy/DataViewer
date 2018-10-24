<?php

class InvalidParameterException extends Exception
{

    /**
     *
     * {@inheritdoc}
     * @see Exception::getMessage()
     */
    public function errorMessage(string $parameter): string
    {
        return $parameter;
    }
    
}