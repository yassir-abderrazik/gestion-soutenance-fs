<?php

namespace App\Http\Controllers;

use App\Jury;
use App\Student;
use App\Supervisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade as PDF;

class SupervisorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


            $check = Supervisor::where('user_id', Auth::id())->value('id');
            $id = Supervisor::where('user_id', Auth::id())->value('id');
            $defense = Student::with('jury')->where('supervisor_id', $id)->where('status', 1)->get(['firstname', 'lastname', 'id', 'project']);
            $events = [];
            foreach($defense as $date)
                {
                    array_push($events, [
                        "title" => $date->project,
                        "start" => $date->jury->dateDefense]);
                    }
            $accepted = Student::where('status', 1)->where('supervisor_id',  $id)->count();
            $refused = Student::where('status', 0)->where('supervisor_id',  $id)->count();
            $notTreated = Student::whereNull('status')->where('supervisor_id',  $id)->count();
            return view('supervisor',[

                'check' => $check,
                'accepted' => $accepted,
                'refused' => $refused,
                'notTreated' => $notTreated,
                'defense' => $defense,
                'Events' => $events,
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Supervisor::where('user_id', Auth::id())->value('id');
        $defense = Student::whereNull('status')->where('supervisor_id',  $id)->paginate(10);
        return view('supervisor.create',[
            'defense' => $defense,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $jury = Jury::create([
            'student_id'  => request('id'),
            'presidentName' => $request->input('presidentName'),
            'examinerName' => $request->input('examinerName'),
            'guestName' => $request->input('guestName'),
            'presidentUniversity' => $request->input('presidentUniversity'),
            'examinerUniversity' => $request->input('examinerUniversity'),
            'guestUniversity' => $request->input('guestUniversity'),
            'dateDefense' => $request->input('dateDefense'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');
        return redirect()->route('Soutenance.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSupervisor(Request $request)
    {

        $supervisor = Supervisor::create([
            'user_id' => Auth::id(),
            'name' => $request->input('name'),
            'university' => $request->input('university'),
            'department' => $request->input('department'),
            'email' => $request->input('email'),
        ]);
        Alert::success('succès', 'Votre operation a été effectuer avec succès');
        return redirect()->route('Soutenance.index');

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
    public function accept(){
        $defense = Student::findOrFail(request('id'));
        $defense->status = 1;
        $defense->save();
        return redirect()->route('Soutenance.create');
    }
    public function acceptedDefense(){
        $id = Supervisor::where('user_id', Auth::id())->value('id');
        $defense = Student::with('jury')->where('status', 1)->where('supervisor_id',  $id)->paginate(10);
        return view('supervisor.accepted', [
            'defense' => $defense,
        ]);
    }
    public function refused(Request $request){
        $defense = Student::findOrFail(request('id'));
        $defense->status = 0;
        $defense->message = $request->input('message');
        $defense->save();
        return redirect()->route('Soutenance.create');
    }
    public function refusedDefense(){
        $id = Supervisor::where('user_id', Auth::id())->value('id');
        $defense = Student::where('status', 0)->where('supervisor_id',  $id)->paginate(10);
        return view('supervisor.refused', [
            'defense' => $defense,
        ]);
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadDefense()
    {
        $defense = Student::with(['jury'])->where('id', request('id'))->get();
        $pdf = PDF::loadView('supervisor.download', ['defense' => $defense ]);
        return $pdf->download('soutenance.pdf');
    }
}
