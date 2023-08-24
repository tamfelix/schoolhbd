<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Classe;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Email;
use App\Models\Event;
use App\Models\Midmenu;
use App\Models\Novita;
use App\Models\Page;
use App\Models\Paracha;
use App\Models\Photo;
use App\Models\Service;
use App\Models\Social;
use App\Models\Teacher;
use App\Models\Timetable;
use Illuminate\Http\Request;

class EmailsController extends Controller
{

    public $topmenu;
    public $sidemenu;
    public $midmenu;
    public $socials;
    public $contact;
    public $timetable;
    public $news;
    public $teachers;
    public $director;
    public $services;
    public $paracha;
    public $about;
    public $photos;
    public $activities;
    public $classes;
    public $events;
    public $footer;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */


    public function __construct(){
        $this->topmenu = Page::where('topmenu', 1)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $this->sidemenu = Page::where('topmenu', 0)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $this->midmenu = Midmenu::orderby('item_order')->select(['title_en','title_fr', 'link_en', 'link_fr'])->get();
        $this->socials = Social::orderby('icon_order')->get()->toArray();
        $this->contact = Contact::where('id', 1)->get()->toArray();
        $this->timetable = Timetable::orderby('timetable')->take(4)->pluck('timetable', 'fromto')->toArray();
        $this->news = Novita::latest()->take(6)->get();
        $this->teachers = Teacher::orderBy('surname')->get()->toArray();
        $this->director = Employee::where('id', 1)->get()->toArray();
        $this->services = Service::orderBy('created_at')->take(10)->select(['title_en', 'title_fr', 'id'])->get();
        $this->paracha = Paracha::find(1)->select(['title_en', 'title_fr', 'content_fr', 'content_en'])->get();
        $this->about = Page::find(1)->select(['title_en', 'title_fr', 'content_fr', 'content_en'])->get();
        $this->photos = Photo::orderBy('created_at')->take(15)->select('id', 'link')->get();
        $this->activities = Activitie::orderBy('created_at')->take(4)->get();
        $this->classes = Classe::all()->pluck('title', 'id')->toArray();
        $this->events = Event::latest()->take(4)->get();
        $this->footer = Page::findMany([10, 11, 12, 15, 9]);
    }


    public function index()
    {
        $messages = Email::select(['subject', 'created_at'])->latest()->take(10)->get();
       // dd($messages);
        return view('layouts.admin.messages')->with([
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $text = Page::where('id', 19)->get();

        return view('layouts.default.contact')->with([
            'text' => $text,

            'topmenu' => $this->topmenu,
            'sidemenu' => $this->sidemenu,
            'socials' => $this->socials,
            'contact' => $this->contact,
            'midmenu' => $this->midmenu,
            'news' => $this->news,
            'teachers' => $this->teachers,
            'timetable' => $this->timetable,
            'director' => $this->director,
            'services' => $this->services,
            'paracha' => $this->paracha,
            'about' => $this->about,
            'photos' => $this->photos,
            'activities' => $this->activities,
            'classes' => $this->classes,
            'events' => $this->events,
            'footer' => $this->footer,

        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $request->validate(['surname'=>'min:2']);
//        $request->validate(['email'=>'min:7']);
//        $request->validate(['content'=>'min:7']);

        $message  = Email::create($request->all());
        //$message->save();
        //echo ('<pre>');
        //print_r($message);
        return redirect()->back()->with('success', __('messages.sent'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Email $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Email  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Email $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $message)
    {
        //
    }
}
