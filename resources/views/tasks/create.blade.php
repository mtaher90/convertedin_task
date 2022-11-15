@extends('layouts.master')

@section('title', 'Create Task')

@section('content')
<h1>Create Task</h1>

<div class="row g-5">
    <div class="col-md-7 col-lg-8">
        <form action="{{ route('tasks.store') }}" method="post">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="admin" class="form-label">Admin</label>
                    <select class="form-select admin" name="assigned_by_id" required="">
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="user" class="form-label">User</label>
                    <select class="form-select user" name="assigned_to_id" required="">
                    </select>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="">
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description" required=""></textarea>
                </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Create Task</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.admin').select2({
        placeholder: 'Select an Admin'
        , ajax: {
            url: "{{ route('admin.list') }}"
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name
                            , id: item.id
                        }
                    })
                };
            }
            , cache: true
        }
    });

    $('.user').select2({
        placeholder: 'Select an User'
        , ajax: {
            url: "{{ route('user.list') }}"
            , dataType: 'json'
            , delay: 250
            , processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            text: item.name
                            , id: item.id
                        }
                    })
                };
            }
            , cache: true
        }
    });

</script>
@endsection
