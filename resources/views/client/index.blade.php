@extends('layouts.app')
@section('title','All Clients codes')
@section('content')
    <div class="container-fluid flex-row" style="width: 50%;">
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-12"><a  href="{{route('info.create')}}" class="btn btn-primary pull-right"> <i class="fa fa-plus" aria-hidden="true"></i> create new code</a></div>
                <br>
                <br>
                <div class="col-12">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Proposal Code</th>
                        </tr>
                        </thead>
                        @if(count($clients)>0)
                            @foreach($clients as $client)
                                <tbody>
                                    <tr>
                                        <td>{{$client->id}}</td>
                                        <td>{{$client->client_name}}</td>
                                        <td>{{$client->proposal_code}}</td>
                                    </tr>
                                </tbody>
                            @endforeach
                            @else
                            <?php echo "no data";?>
                            @endif
                    </table>
                </div>
        </div>
    </div>


    @endsection