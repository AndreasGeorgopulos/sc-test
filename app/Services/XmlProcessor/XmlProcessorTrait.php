<?php

namespace App\Services\XmlProcessor;

use App\Exceptions\XmlProcessingException;
use SimpleXMLElement;

/**
 * Trait of xml processor
 */
trait XmlProcessorTrait
{
    private array $config;

    private string $xmlContent;

    private SimpleXMLElement $xml;

    /**
     * Constructor
     * @param string $xmlContent
     * @param array $config
     */
    public function __construct(string $xmlContent, array $config)
    {
        $this->xmlContent = $xmlContent;
        $this->config = $config;
    }

    /**
     * Validate xml file structure
     * @return bool
     * @throws XmlProcessingException
     */
    private function validateStructure(): bool
    {
        $this->xml = $this->validateXmlContent();
        $this->validateRootElementName();

        $itemName = $this->config['item_name'];
        $itemChildren = $this->config['item_children'];

        $this->validateItemElementPresence($itemName);

        $this->validateItemElementChildren($itemName, $itemChildren);

        return true;
    }

    /**
     * Validate xml content
     * @return SimpleXMLElement
     * @throws XmlProcessingException
     */
    private function validateXmlContent(): SimpleXMLElement
    {
        try {
            return new SimpleXMLElement($this->xmlContent);
        } catch (\Exception $e) {
            throw new XmlProcessingException(trans('Xml file nem dolgozható fel. Hiba: ' . $e->getMessage()));
        }
    }

    /**
     * Validate root element name
     * @return void
     * @throws XmlProcessingException
     */
    private function validateRootElementName(): void
    {
        $rootName = $this->config['root_name'];

        if ($this->xml->getName() !== $rootName) {
            throw new XmlProcessingException(trans('Nem található <:node_name> gyökér elem az xml-ben', [
                'node_name' => $rootName,
            ]));
        }
    }

    /**
     * @param SimpleXMLElement $xml
     * @param string $itemName
     * @return void
     * @throws XmlProcessingException
     */
    private function validateItemElementPresence(string $itemName): void
    {
        if (count($this->xml->$itemName) === 0) {
            throw new XmlProcessingException(trans('Nem található <:node_name> elem az xml-ben', [
                'node_name' => $itemName,
            ]));
        }
    }

    /**
     * @param string $itemName
     * @param array $itemChildren
     * @throws XmlProcessingException
     */
    private function validateItemElementChildren(string $itemName, array $itemChildren): void
    {
        $missingItems = null;
        $index = null;

        for ($i = 0; $i < $this->xml->$itemName->count(); $i++) {
            $person = $this->xml->$itemName[$i];
            $missingItems = [];
            foreach (array_keys($itemChildren) as $item) {
                if (isset($person->$item)) {
                    continue;
                }

                $missingItems[] = $item;
            }

            if (!empty($missingItems)) {
                $index = $i + 1;
                break;
            }
        }

        if (!empty($missingItems)) {
            throw new XmlProcessingException(trans('Hiányzó elemek a(z) :index. <:node_name> elemen belül: :missing_nodes', [
                'index' => $index,
                'node_name' => $itemName,
                'missing_nodes' => implode(', ', $missingItems)],
            ));
        }
    }
}
