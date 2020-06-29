<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Address;

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
            //$addresses=DB::table('addresses')->where('city','LIKE','%'.$request->search."%")->where('is_bill','LIKE',0)->join('deliveries','addresses.delivery_id','=','deliveries.id')->get();
            $addresses= Address::with('delivery')->where('delivery_id',"=", 2)->where('is_bill', '=', 0)->where('city',"LIKE","%".$request->search."%")->get();
            if($addresses && $request->search != null)
            {
                foreach ($addresses as $address) {
                    $output.='<div class="address"><input type="radio" id="address_id" name="address_id" value="'.$address->id.'">'.
                        '<label for="address_id">' .$address->address1. ', '
                        .$address->address2. ', '
                        .$address->city. ', '
                        .$address->postcode. ', '
                        .$address->country.'</label> </div>';

                    /*'<tr>
         <td>'.$address->id.'</td>
         <td>'.$address->address1.'</td>
         <td>'.$address->address2.'</td>
         <td>'.$address->country.'</td>
         <td>'.$address->postcode.'</td>
         <td>'.$address->country.'</td>
        </tr>';*/

                }
                return Response($output);
            }
        }
    }

}
