<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Resources\ClientResource;
use Illuminate\Http\Request;

class code_generate_api extends Controller
{
    public function code_generate(Request $request){
        if(!function_exists('capitaliz')){
            function capitaliz($str){
                $acronym="";
                $word="";
                $words = preg_split("/(\s|\-|\.)/", $str);
                foreach($words as $w) {
                    $acronym .= substr($w,0,1);
                }
                $word = $word . $acronym ;
                return $word;
            }
        }
        $this->validate($request,[
            'proposal_type'=>'required',
            'technical_approval_from'=>'required',
            'proposal_number'=>'required',
            'client_source'=>'required',
            'sales_agent'=>'required',
            'client_name'=>'required',
            'proposal_date'=>'required',
            'proposal_value'=>'required',
        ]);
        $clients= new Client();
        $clients->proposal_type=$request->input('proposal_type');
        $clients->technical_approval_from=$request->input('technical_approval_from');
        $clients->proposal_number=$request->input('proposal_number');
        $clients->client_source=$request->input('client_source');
        $clients->sales_agent=$request->input('sales_agent');
        $clients->client_name=$request->input('client_name');
        $clients->proposal_date=$request->input('proposal_date');
        $clients->proposal_value=$request->input('proposal_value');
        $clients->proposal_code=capitaliz(strtoupper($request->input('proposal_type'))).capitaliz(strtoupper($request->input('technical_approval_from'))).'-'.str_pad($request->input('proposal_number'), 5, '0', STR_PAD_LEFT).'-'.capitaliz(strtoupper($request->input('client_source'))).capitaliz(strtoupper($request->input('sales_agent')));
        if ($clients->save()){
            return new ClientResource($clients);
        }
    }
}
