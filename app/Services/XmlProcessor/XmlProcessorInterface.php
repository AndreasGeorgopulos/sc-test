<?php
namespace App\Services\XmlProcessor;

/**
 * Interface of xml processor for factories
 */
interface XmlProcessorInterface
{
    /**
     * Process function
     * @return mixed
     */
    public function process(): mixed;
}
