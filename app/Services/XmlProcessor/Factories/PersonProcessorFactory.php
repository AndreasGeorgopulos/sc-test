<?php

namespace App\Services\XmlProcessor\Factories;

use App\Exceptions\XmlProcessingException;
use App\Models\Person;
use App\Services\XmlProcessor\XmlProcessorInterface;
use App\Services\XmlProcessor\XmlProcessorTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Xml processor factory of person
 */
class PersonProcessorFactory implements XmlProcessorInterface
{
    use XmlProcessorTrait;

    /**
     * @return array
     * @throws XmlProcessingException
     * @throws \Exception
     */
    public function process(): array
    {
        $this->validateStructure();

        $itemName = $this->config['item_name'];
        $itemChildren = $this->config['item_children'];
        $results = [];

        try {
            DB::beginTransaction();
            DB::transaction(function () use (&$results, $itemName, $itemChildren) {
                for ($i = 0; $i < $this->xml->$itemName->count(); $i++) {
                    $person = $this->xml->$itemName[$i];

                    list($fills, $rules, $messages) = $this->prepareData($person, $itemChildren);
                    $model = $this->createAndFillModel($fills);

                    $validator = Validator::make($fills, $rules, $messages);
                    if (!$validator->fails()) {
                        $model->save();
                    }

                    $errors = $validator->errors()->toArray();

                    $results[] = [
                        'success' => empty($errors),
                        'model' => $model,
                        'errors' => $errors,
                    ];
                }
            });
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

        return $results;
    }

    /**
     * @param $person
     * @param $itemChildren
     * @return array[]
     */
    protected function prepareData($person, $itemChildren): array
    {
        $fills = $rules = $messages = [];

        foreach ($itemChildren as $k => $v) {
            $field = $v['field'];
            $fills[$field] = (string)$person->$k;
            $rules[$field] = $v['rules'];
            $messages[$field] = $v['messages'];
        }

        return [$fills, $rules, $messages];
    }

    /**
     * @param $fills
     * @return Person
     */
    protected function createAndFillModel($fills): Person
    {
        $fills['login_at'] = Carbon::createFromFormat('Y.m.d', $fills['login_at'])->format('Y-m-d');
        $fills['logout_at'] = Carbon::createFromFormat('Y.m.d', $fills['logout_at'])->format('Y-m-d');

        $model = new Person();
        $model->fill($fills);
        return $model;
    }
}
