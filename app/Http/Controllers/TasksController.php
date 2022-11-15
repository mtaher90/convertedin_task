<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\StoreTaskRequest;
use App\Models\Admin;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TasksController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tasks::with(['admin', 'user']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('tasks.index');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function tasks_count(Request $request)
    {
        // dd(User::all());
        // foreach (User::all() as $user) {
        //     if ($user->id == 6) {
        //         dd($user->tasksCount);
        //     }
        // }
        $users = User::limit(10)->get();
        $users = $users->sortByDesc(function ($user) {
            return $user->tasksCount;
        });

        return view('tasks.count', compact('users'));
    }

    public function admins(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Admin::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->limit(20)->get();
        }
        return response()->json($data);
    }

    public function users(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = User::select("id", "name")
                ->where('name', 'LIKE', "%$search%")
                ->limit(20)->get();
        }
        return response()->json($data);
    }

    public function store(StoreTaskRequest $request)
    {
        $inputs  = $request->validated();

        Tasks::create($inputs);

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }
}
