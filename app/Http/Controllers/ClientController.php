<?php

namespace App\Http\Controllers;

use App\Client;
use App\client_source;
use App\proposal_type;
use App\sales_agent;
use App\technical_approval_from;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clients=Client::all();
        return view('client.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proposal_types=proposal_type::all();
        $technichal_approval_froms=technical_approval_from::all();
        $client_sources=client_source::all();
        $sales_agents=sales_agent::all();
        return view('client.form')->with('proposal_types',$proposal_types)->with('technichal_approval_froms',$technichal_approval_froms)->with('client_sources',$client_sources)->with('sales_agents',$sales_agents);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'client_source'=>'required',
            'proposal_number'=>'required',
            'sales_agent'=>'required',
            'client_name'=>'required',
            'proposal_date'=>'required',
            'proposal_value'=>'required',
        ]);
        $client=new Client();
        $client->proposal_type=$request->input('proposal_type');
        $client->technical_approval_from=$request->input('technical_approval_from');
        $client->proposal_number=$request->input('proposal_number');
        $client->client_source=$request->input('client_source');
        $client->sales_agent=$request->input('sales_agent');
        $client->client_name=$request->input('client_name');
        $client->proposal_date=$request->input('proposal_date');
        $client->proposal_value=$request->input('proposal_value');
        $client->proposal_code=capitaliz(strtoupper($request->input('proposal_type'))).capitaliz(strtoupper($request->input('technical_approval_from'))).'-'.str_pad($request->input('proposal_number'), 5, '0', STR_PAD_LEFT).'-'.capitaliz(strtoupper($request->input('client_source'))).capitaliz(strtoupper($request->input('sales_agent')));
        $client->save();
        return redirect(route('info.index'))->with('success','Code Generated successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
