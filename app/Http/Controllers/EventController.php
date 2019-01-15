<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Calendar;
use App\Event;
use Validator;
use Auth;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->titre,
                true,
                new \DateTime($event->date_debut),
                new \DateTime($event->date_fin . ' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        if (Auth()->check()) {
            return view('/event', compact('calendar_details') );
        }
        else{
            return view('/events', compact('calendar_details'));
        }
    }


    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('warnning', 'Entrer des informations valide');
            return Redirect::to('/')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->titre = $request['titre'];
        $event->date_debut = $request['date_debut'];
        $event->date_fin = $request['date_fin'];
        $event->save();

        \Session::flash('success', 'L Evenement a été ajouté avec succés');
        return Redirect::to('/');
    }
}

