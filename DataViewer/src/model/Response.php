<?php

class Response implements JsonSerializable
{

    private $status;
    private $result;

    /**
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     *
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     *
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     *
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     *
     * {@inheritdoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}