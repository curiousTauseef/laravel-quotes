<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //create quote
    public function postQuote(Request $request) {
        $quote = new Quote;
        $quote->content = $request->content;
        $quote->save();
        return response()->json(['quote' => $quote], 201); //201 success
    }

    //index (get all quotes)
    public function getQuotes() {
        $quotes = Quote::all();
        $response = ['quotes' => $quotes];
        return response()->json($response, 200);
    }

    //show quote
    public function getQuote(Request $request, $id) {
        $quote = Quote::find($id);

        if(!$quote) {
            return response()->json(['message' => 'Document not found'], 404);
        }
        return response()->json(['quote' => $quote], 200); 
    }

    //update quote
    public function putQuote(Request $request, $id) {
        $quote = Quote::find($id);

        if(!$quote) {
            return response()->json(['message' => 'Document not found'], 404);
        }

        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote' => $quote], 200); 
    }

    //delete quote
    public function deleteQuote($id) {
        $quote = Quote::find($id);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted'], 200);
    }
    
}
