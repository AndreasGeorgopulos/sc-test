<?php

namespace App\Services\XmlProcessor;

use App\Services\XmlProcessor\Factories\PersonProcessorFactory;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * Factory creator of XmlProcessor
 */
class XmlProcessor
{
    /**
     * This class cannot be instantiated.
     */
    private function __construct()
    {
    }

    /**
     * Factory creator
     * @param string $factoryName
     * @param string $xmlContent
     * @return XmlProcessorInterface
     */
    public static function createFactory(string $factoryName, string $xmlContent): XmlProcessorInterface
    {
        $config = config('xml_processor.' . $factoryName);
        return match ($factoryName) {
            'person' => new PersonProcessorFactory($xmlContent, $config),
            default => throw new NotFoundResourceException(trans('Factory class not found')),
        };
    }
}
