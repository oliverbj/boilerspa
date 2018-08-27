<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class DocparserController extends Controller
{
    //This is the function to capture the webhook
    //sent from Docparser.
    public function webhook(Request $request)
    {
        $document = new Document();

        $document->creator()->associate(auth()->user());

        foreach ($request->all() as $key => $value) {
            //Important: this will remove the _{formatted|numbers} at the end of the JSON object.
            //Examples:
            //vgm_cutoff_date_formatted   => vgm_cutoff_date
            //shipment_reference_01       => shipment_reference
            $newKey = preg_replace('/(_["formatted"0-9]+)$/', '', $key);
            $document->$newKey = $value;
        }

        //Insert (or update existing) data in our database.
        $document::updateOrCreate(
            ['booking_reference' => $document->booking_reference],
            $document->getAttributes()
        );

        return response()->json('OK');
    }
}
