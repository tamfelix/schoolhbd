<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\Midmenu;
use App\Models\Novita;
use App\Models\Service;
use App\Models\Social;
use App\Models\Teacher;
use App\Models\Timetable;
use DB;
use Illuminate\Http\Request;
use App\Models\Page;
use App;
use App\Models\Paracha;
use App\Models\Photo;
use App\Models\Classe;
use App\Models\Activitie;
use App\Models\Event;

class PagesController extends Controller
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




    public function __construct(){
        $this->topmenu = Page::where('topmenu', 1)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $this->sidemenu = Page::where('topmenu', 0)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $this->midmenu = Midmenu::orderby('item_order')->select(['title_en','title_fr', 'link_en', 'link_fr'])->get();
        $this->socials = Social::orderby('icon_order')->get()->toArray();
        $this->contact = Contact::where('id', 1)->get()->toArray();
        $this->timetable = Timetable::orderby('timetable')->take(4)->pluck('timetable', 'fromto')->toArray();
        $this->news = Novita::latest()->orderBy('created_at', 'desc')->take(6)->get();
        $this->teachers = Teacher::orderBy('surname')->get()->toArray();
        $this->director = Employee::where('id', 1)->get()->toArray();
        $this->services = Service::orderBy('created_at')->take(10)->select(['title_en', 'title_fr', 'id'])->get();
        $this->paracha = Paracha::find(1)->select(['title_en', 'title_fr', 'content_fr', 'content_en'])->get();
        $this->about = Page::find(1)->select(['title_en', 'title_fr', 'content_fr', 'content_en'])->get();
        $this->photos = Photo::orderBy('created_at')->take(15)->select('id', 'link')->get();
        $this->activities = Activitie::orderBy('created_at')->take(4)->get();
        $this->classes = Classe::all()->pluck('title', 'id')->toArray();
        $this->events = Event::latest()->take(4)->orderBy('created_at', 'desc')->get();
        $this->footer = Page::findMany([10, 11, 12, 15, 9]);
    }


    public function index()
    {


        return view('layouts.default.main')->with([
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


    public function about()
    {

        //print_r($about);
        return view('layouts.default.about')->with([
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

    public function history()
    {
        $text = Page::where('id',8)->select(['content_en', 'content_fr', 'title_en', 'title_fr'])->get();

        return view('layouts.default.history')->with([
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

    public function advantages()
    {
        $advantages = Page::where('id', 2)->select(['content_en', 'content_fr', 'title_en', 'title_fr'])->get();
        return view('layouts.default.advantages')->with([

            'advantages' => $advantages,

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

    public function program()
    {
        $program = Page::where('id', 3)->select(['content_en', 'content_fr', 'title_en', 'title_fr'])->get();

        return view('layouts.default.program')->with([
            'program' => $program,

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

    public function partners()
    {
        $text = Page::where('id', 7)->select(['content_en', 'content_fr', 'title_en', 'title_fr'])->get();

        return view('layouts.default.partners')->with([

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

    public function suppliers()
    {

        $text = Page::where('id', 9)->select(['content_en', 'content_fr', 'title_en', 'title_fr'])->get();

        return view('layouts.default.suppliers')->with([

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



    public function moodleLogin(Request $request)
    {
        $username = $request['login'];
        $password = $request['pwd'];
            //for moodle api:
            if(1==2)//auth_user_login ($username, $password))
                {
                return redirect('https://moodle.ecoleom.ch');
            } else{
                return redirect()->back()->with('failed', __('auth.failed'));
            }
    }


    public function moodle()
    {
        $topmenu = Page::where('topmenu', 1)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $sidemenu = Page::where('topmenu', 0)->select(['title_en', 'title_fr', 'link'])->orderby('page_order')->get();
        $midmenu = Midmenu::orderby('item_order')->select(['title_en','title_fr', 'link_en', 'link_fr'])->get();
        $socials = Social::orderby('icon_order')->get()->toArray();
        $contact = Contact::where('id', 1)->get()->toArray();
        $text = Page::where('id', 7)->pluck('content')->toArray();
        $director = Employee::where('id', 1)->get()->toArray();
        $services = Service::orderBy('created_at')->take(10)->select(['title_en', 'title_fr', 'id'])->get();
        //print_r($topmenu);
        return view('layouts.default.moodle')->with([
            'topmenu' => $topmenu,
            'socials' => $socials,
            'contact' => $contact,
            'midmenu' => $midmenu,
            'text' => $text,
            'sidemenu' => $sidemenu,
            'director' => $director,
            'services' => $services,

        ]);
    }

    public function calendar(){
        $calendar = Page::where('id',20)->get();

        return view('layouts.default.calendar')->with([
            'calendar' => $calendar,

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

//
        ]);
    }

    public function toParents(){
        $text = Page::where('id',17)->get() ;


        return view('layouts.default.parents')->with([
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

    public function aboutMoodle(){
        $text = Page::where('id', 18)->get();

        return view('layouts.default.aboutmoodle')->with([
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

    public function comitee(){
        $comitee = Page::where('id',21)->get();

        return view('layouts.default.commitee')->with([
            'comitee' => $comitee,

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

//
        ]);
    }

    public function eduplan()
    {
        $text = Page::where('id', 12)->get();

        return view('layouts.default.eduplan')->with([
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

    public function alumni(){
        $text = Page::where('id', 12)->get();

        return view('layouts.default.alumni')->with([
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

    public function graduation(){
        $text = Page::where('id', 12)->get();

        return view('layouts.default.graduation')->with([
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

    public function finance(){
        $text = Page::where('id', 12)->get();

        return view('layouts.default.finance')->with([
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

    public function state(){
        $text = Page::where('id', 12)->get();

        return view('layouts.default.state')->with([
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


    public function toStudents(){
        $text = Page::where('id', 12)->get();

        return view('layouts.default.students')->with([
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

    public function equipment(){
        $range = DB::table('equipment')->orderBy('created_at', 'desc')->paginate(2);

        return view('layouts.default.equipment')->with([
            'range' => $range,

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





}
