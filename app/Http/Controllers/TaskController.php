<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\ShowDashboard;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Tasks::all();
        return view('dashboard.dashboard', compact(['tasks']));
    }

    public function create(){
        return view('dashboard.AddSchedule');
    }
   
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
        'end_time.after' => 'Waktu tidak valid.',
        ]);
        Tasks::create($request->except(['_token', 'submit']));
        return redirect('/dashboard')->with('success', 'Jadwal berhasil ditambahkan!');
    }
    
    
    public function edit($id){
        $tasks = Tasks::find($id);
        return view('dashboard.EditSchedule', compact(['tasks']));
    }
  
    public function update($id, Request $request){
        $tasks = Tasks::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ], [
        'end_time.after' => 'Waktu tidak valid.',
        ]);
        $tasks->update($request->except(['_token', 'submit']));
        return redirect('/dashboard')->with('success', 'Jadwal berhasil diubah!');
    }
    public function delete($id){
        $tasks = Tasks::find($id);
        $tasks->delete();
        return redirect('/dashboard');
    }
    public function show($id){
        $t =Tasks::find(3);
        return view('dashboard.dashboard', ['user' => $user]);
    }

    public function showDashboard(){
        $show = ShowDashboard::orderBy('start_time', 'asc')->first();

        return view('dashboard.dashboard', ['showdashboard' => $show]);
    }
}
