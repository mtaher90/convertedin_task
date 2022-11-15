@extends('layouts.master')

@section('title', 'Task List Count')

@section('content')
<h1>Task List Count</h1>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="tasks_count_table">
        <thead>
            <tr>
                <th scope="col">Assigned Name</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->tasks->count() }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2">There is no users</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('script')
@endsection
