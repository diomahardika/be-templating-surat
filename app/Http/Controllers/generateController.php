<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Symfony\Component\HttpFoundation\Response;

class generateController extends Controller
{
    public function index()
    {
        // Return the view to display the form
        return view('input');
    }

    public function generate(Request $request)
    {
        // Validate the incoming request data from the form
        $validated = $request->validate([
            'placeholders' => 'required|array',
            'placeholders.*.key' => 'required|string',
            'placeholders.*.value' => 'required|string',
        ]);

        // Create a new TemplateProcessor instance
        $templateProcessor = new TemplateProcessor('template.docx');

        // Store the placeholders and their corresponding values
        $responseArray = [];

        // Loop through each placeholder and value, dynamically setting them in the template
        foreach ($validated['placeholders'] as $placeholder) {
            $templateProcessor->setValue($placeholder['key'], $placeholder['value']);
            $responseArray[] = [
                'key' => $placeholder['key'],
                'value' => $placeholder['value']
            ];
        }

        // Save the document to the public folder
        $tempFilePath = public_path('Result.docx');
        $templateProcessor->saveAs($tempFilePath);

        // Return a response indicating success
        return response()->download($tempFilePath)->deleteFileAfterSend(false);
    }
}
