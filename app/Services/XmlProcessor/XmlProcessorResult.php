<?php

namespace App\Services\XmlProcessor;

class XmlProcessorResult
{
    private bool $success;

    private array $errors;

    private $model;

    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }
}
