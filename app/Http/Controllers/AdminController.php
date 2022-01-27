<?php

namespace App\Http\Controllers;

use App\Jury;
use App\Student;
use Facade\FlareClient\Http\Response as HttpResponse;
use Redirect,Response;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $defense = Jury::with('student')->get();

        $events = [];
    foreach($defense as $date)
        {
            array_push($events, [
                "title" => $date->student->project,
                "start" => $date->dateDefense]);
            }

        return view('admin',['Events' => $events]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defense = Student::with(['supervisor', 'jury'])->where('status', 1)->get();
        return view('admin.create', [
            'defense' => $defense
        ]);
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

        $defense = Jury::findOrFail($id);
        $defense->validate = 1;
        $defense->save();

        Alert::success('succès', 'Votre operation a été effectuer avec succès');
        return redirect()->route('admin.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mail()
    {
        $defense = Student::with(['jury', 'supervisor'])->findOrFail(request('id'));
        $date = $defense->jury->dateDefense;
        Mail::to($defense->email)->send(new SendMailable($date));
        Mail::to($defense->supervisor->email)->send(new SendMailable($date));
        Alert::success('succès', 'Votre operation a été effectuer avec succès');
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function juryInvitations()
    {
        $defense = Student::with(['jury', 'supervisor'])->where('id', request('id'))->get();
        $pdf = PDF::loadView('admin.jury', ['defense' => $defense ]);
        return $pdf->download('invitations.pdf');
    }
}
