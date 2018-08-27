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

        //We use the merge() function to add "custom" field names to our $request.
        //This is needed, since Docparser will ex. add _formatted to their fields.
        /*
        $request->merge([
            'vgm_cutoff_date' => $request->input('vgm_cutoff_date_formatted'),
            'shipment_reference' => $request->input('shipment_reference_0'),
            'booking_reference' => $request->input('booking_reference_0')
        ]);
        */

        //Add all our received data to our Document::
//        $document->fill($request->all());
        $document->creator()->associate(auth()->user());

        foreach ($request->all() as $key => $value) {
            $newKey = preg_replace("/(_?\d+)+$/", '', $key); //this generates the name of column that you need
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
