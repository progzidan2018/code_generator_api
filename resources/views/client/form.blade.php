@extends('layouts.app')
@section('title','create code')
@section('content')
@include('errormsg')
<div class="container-fluid flex-row" style="width: 50%;">
    <form method="post" action="{{route('info.store')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="proposal_type">Proposal Type</label>
            <select name="proposal_type" class="form-control">
                <option >Open this select menu</option>
                @foreach($proposal_types as $proposal_type)
                    <option value="{{$proposal_type->proposal_type_name}}">{{$proposal_type->proposal_type_name}}</option>
                    @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="technical_approval_from">Approval Name</label>
            <select name="technical_approval_from" class="form-control">
                <option selected>Open this select menu</option>
                @foreach($technichal_approval_froms as $technichal_approval_from)
                    <option value="{{$technichal_approval_from->technical_approval_from_name}}">{{$technichal_approval_from->technical_approval_from_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="proposal_number">Proposal Number</label>
            <input type="text" class="form-control" name="proposal_number" placeholder="Enter Proposal Number"/>
        </div>
        <div class="form-group">
            <label for="client_source">Client Source</label>
            <select name="client_source" class="form-control">
                <option selected>Open this select menu</option>
                @foreach($client_sources as $client_source)
                    <option value="{{$client_source->client_source_name}}">{{$client_source->client_source_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="sales_agent">Sales Agent</label>
            <select name="sales_agent" class="form-control">
                <option selected>Open this select menu</option>
                @foreach($sales_agents as $sales_agent)
                    <option value="{{$sales_agent->sales_agent_name}}">{{$sales_agent->sales_agent_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="client_name">Client Name</label>
            <input type="text" class="form-control" name="client_name" placeholder="Enter Client Name"/>
        </div>
        <div class="form-group">
            <label for="proposal_date">Proposal Date</label>
            <input type="date" class="form-control" name="proposal_date"/>
        </div>
        <div class="form-group">
            <label for="proposal_alue">Proposal Value</label>
            <input type="text" class="form-control" name="proposal_value" placeholder="Enter Proposal Value"/>
        </div>
        <button type="submit" class="btn btn-primary">Generate</button>
    </form>
</div>
    @endsection