@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-bordered table-hover table-dark table-responsive">
        	<thead>
        		<th>Users</th>
        		<th>Orders</th>
        		<th>Products</th>
        		<th>Messages</th>
        		<th>Sales</th>
        	</thead>
        	<tbody>
        		<tr>
        			<td>{{ $users }}</td>
        			<td>{{ $orders }}</td>
        			<td>{{ $products }}</td>
        			<td>{{ $messages }}</td>
        			<td></td>
        		</tr>
        	</tbody>
        </table>

    </div>
</div>

@endsection
