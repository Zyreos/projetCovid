<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LiveSearchController extends Controller
{

    public function index()
    {
        return view('live_search');
    }
    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $addresses=DB::table('addresses')->where('city','LIKE','%'.$request->search."%")->where('is_bill','LIKE',0)->join('deliveries','addresses.delivery_id','=','deliveries.id')->get();
            if($addresses)
            {
                foreach ($addresses as $key => $address) {
                    $output.='<tr>'.
                        '<td>'.$address->id.'</td>'.
                        '<td>'.$address->address1.'</td>'.
                        '<td>'.$address->address2.'</td>'.
                        '<td>'.$address->city.'</td>'.
                        '<td>'.$address->postcode.'</td>'.
                        '<td>'.$address->country.'</td>'.
                        '</tr>';
                }
                return Response($output);
            }
        }
    }

}
