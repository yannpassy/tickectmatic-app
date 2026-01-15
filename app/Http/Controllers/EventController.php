<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; 

const ACCESS_KEY = "e5f193d6e476fe219b117115";
const SECRET_KEY = "ef44685c2a4e3347274e12cb63f2bd4a82444360fe27d393";
const BASE_URL = 'https://test.ticketmatic.com/api/1/studio_technical_test';
class EventController extends Controller
{
    public function getEvent($id)
    {
        $response = Http::withHeaders([
            'Authorization' => "Basic ".base64_encode(ACCESS_KEY.":".SECRET_KEY),
            'Accept' => 'application/json',
        ])->get(BASE_URL.'/events/'.$id);

        if ($response->failed()) {
            return back()->with('error', 'Cannot access to the server');
        }

        $result = $response->json();

        //var_dump($result);

        $availability = [
            "total" => 0,
            "sold_paid" => 0,
            "sold_unpaid" => 0,
            "reserved" => 0,
            "locked_hard" => 0,
            "locked_soft" => 0,
            "complimentary" => 0,
            "free" => 0
        ];

        foreach($result['availability'] as $row){
            $availability['total']  += $row['total'] ??0;
            $availability['sold_paid'] += $row['sold_paid'] ??0;
            $availability['sold_unpaid'] += $row['sold_unpaid'] ??0;
            $availability['reserved'] += $row['reserved'] ??0;
            $availability['locked_hard'] += $row['locked_hard'] ??0;
            $availability['locked_soft'] += $row['locked_soft'] ??0;
            $availability['complimentary'] += $row['complimentary'] ??0;
            $availability['free'] += $row['free'] ??0;
        }

        return view('event', [
            'name' => $result['name'],
            'availability' => $availability
        ]);
        
    }
}
