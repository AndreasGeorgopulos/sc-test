<?php

namespace App\Http\Controllers;

use App\Exceptions\XmlProcessingException;
use App\Exceptions\XmlProcessingFormatException;
use App\Models\Person;
use App\Services\XmlProcessor\XmlProcessor;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Controller of persons
 */
class PersonController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $people = Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function xml_upload(Request $request): View|RedirectResponse
    {
        if ($request->isMethod('post')) {
            /** @var \Illuminate\Http\UploadedFile $xmlFile */
            $xmlFile = $request->file('xml_file');

            $validator = Validator::make($request->all(), [
                'xml_file' => ['required', 'file']
            ], [
                'required' => trans('Xml file nincs feltöltve'),
                'file' => trans('Xml file nincs feltöltve'),
            ]);

            if ($validator->fails()) {
                return redirect(route('person_xml_upload'))->withErrors($validator)->withInput();
            } elseif ($xmlFile->getClientOriginalExtension() !== 'xml') {
                return redirect(route('person_xml_upload'))->withErrors(['xml_file' => trans('A fájl nem XML típusú.')])->withInput();
            }

            try {
                $personProcessor = XmlProcessor::createFactory('person', $xmlFile->getContent());
                $results = $personProcessor->process();
                return redirect(route('person_xml_upload'))->with([
                    'person_xml_processor_results' => $results,
                ]);

            } catch (XmlProcessingException|\Exception $e) {
                return redirect(route('person_xml_upload'))
                    ->withErrors(['xml_file' => $e->getMessage()])
                    ->withInput();
            }
        }
        return view('person.xml_upload', [
            'results' => $results ?? null,
        ]);
    }
}
