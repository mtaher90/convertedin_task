@extends('layouts.master')

@section('title', 'Task List')

@section('content')
<h1>Task List</h1>

<div class="table-responsive">
    <table class="table table-striped table-sm" id="tasks_table">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Assigned Name</th>
                <th scope="col">Admin</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection

@section('script')
<script>
    $(function() {
        var table = $('#tasks_table').DataTable({
            processing: true
            , serverSide: true
            , responsive: true
            , ajax: "{{ route('tasks.index') }}"
            , columns: [{
                    data: 'title'
                    , name: 'title'
                }
                , {
                    data: 'description'
                    , name: 'description'
                }
                , {
                    data: 'user.name'
                    , name: 'user.name'
                }
                , {
                    data: 'admin.name'
                    , name: 'admin.name'
                }
            , ]
        });

    });

</script>
@endsection
