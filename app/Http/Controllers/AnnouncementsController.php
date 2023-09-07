<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Classe;
use App\Models\Contact;
use App\Models\Employee;
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
use App\Models\Announcement;
use core\navigation\views\view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnouncementsController extends Controller
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
    public $announcements;





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
        $this->photos = Photo::orderBy('created_at')->take(15)->select(['id', 'link'])->get();
        $this->activities = Activitie::orderBy('created_at')->take(4)->get();
        $this->classes = Classe::all()->pluck('title', 'id')->toArray();
        $this->events = Event::latest()->take(4)->get();
        $this->footer = Page::findMany([10, 11, 12, 15, 9]);
        $news = Announcement::latest()->orderBy('created_at', 'desc')->pluck('news_id')->toArray();
        $this->announcements = Novita::findMany($news);
       
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $annonces = DB::table('announcements')->paginate(4);
        $text = Page::where('id', 13)->select(['title_en', 'title_fr'])->get();

        return view('layouts.default.announcements')->with([
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
            'classes' => $this->classes,
            'events' => $this->events,
            'footer' => $this->footer,
            'activities' => $this->activities,
            'announcements'=>$this->announcements,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.default.enroll')->with([

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
            'classes' => $this->classes,
            'events' => $this->events,
            'footer' => $this->footer,
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Activitie $activitie, $request)
    {
        $act = Activitie::where('id', $request);
        $views = $act->pluck('views')[0]+1;
        $act->update(['views' => $views]);

        $item = $act->get();
        return view('layouts.default.activitie')->with([
            'item' => $item,


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
            'classes' => $this->classes,
            'events' => $this->events,
            'footer' => $this->footer,
            'activities' => $this->activities,
             'announcements'=>$this->announcements,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Activitie $activitie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activitie $activitie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activitie $activitie)
    {
        //
    }

    public function like(Request $request){
        $item = Activitie::where('id', $request->id);
        $likes = $item->pluck('likes')[0]+1;
        $item->update(['likes' => $likes]);
        return redirect()->back();
    }
}
