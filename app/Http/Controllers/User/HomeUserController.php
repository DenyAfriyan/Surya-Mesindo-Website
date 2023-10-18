<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use App\Models\HeaderDescription;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\OtherContent;
use App\Models\Blog;
use App\Models\Inbox;
use App\Http\Requests\StoreInboxRequest;
use App\Models\About;
use App\Models\Counter;
use App\Models\Slider;

class HomeUserController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $meta ='';
        $sliders = Slider::all();
        $abouts = About::first();
        $counters = Counter::all();
        $dataToView = ['sliders','title', 'meta','abouts','counters'];
     
        return view('user_v2/index', compact($dataToView));
    }
    public function index_old()
    {
        $title = 'Home';
        $meta ='';

        return view('user/index', compact('title', 'meta'));
    }

    public function about()
    {
        $title = 'About';
        $meta ='';

        return view('user_v2/about', compact('title', 'meta'));
    }

    public function whyus()
    {
        $title = 'WhyUs';
        $meta ='';

        return view('user_v2/whyus', compact('title', 'meta'));
    }

    public function machine()
    {
        $title = 'Machine';
        $type = 'product';
        $meta ='';

        return view('user_v2/machine', compact('title', 'meta','type'));
    }
    
    public function accesoryproduct()
    {
        $title = 'Accessory and Product';
        $type = 'product';
        $meta ='';

        return view('user_v2/accessory_sparepart', compact('title', 'meta','type'));
    }

    public function contact(){
        $title = 'Contact';
        $meta ='';

        return view('user_v2/contact', compact('title', 'meta'));
    }

    public function program()
    {
        $company = CompanyProfile::first();
        $header = HeaderDescription::get();
        $services = Service::get();
        $testimonials = Testimonial::get();
        $teachers = Team::get();
        $main_programs = OtherContent::where('category_id', 2)->get();
        $curriculum = OtherContent::where('category_id', 3)->get();
        $programs = OtherContent::where('category_id', 4)->get();

        return view('user/program', compact('company', 'header', 'services', 'testimonials', 'teachers', 'main_programs', 'curriculum', 'programs'));
    }

    public function blog()
    {
        $company = CompanyProfile::first();
        $header = HeaderDescription::get();
        $services = Service::get();
        $testimonials = Testimonial::get();
        $teachers = Team::get();
        $main_programs = OtherContent::where('category_id', 2)->get();
        $curriculum = OtherContent::where('category_id', 3)->get();
        $programs = OtherContent::where('category_id', 4)->get();
        $blogs = Blog::orderBy('id', 'desc')->paginate(9);

        return view('user/blog', compact('company', 'header', 'services', 'testimonials', 'teachers', 'main_programs', 'curriculum', 'programs', 'blogs'));
    }

    public function detailblog($title){
        $company = CompanyProfile::first();
        $blog = Blog::where('title', $title)->first();
        return view('user/detailblog', compact('blog', 'company'));
    }


    public function altissia(){
        $company = CompanyProfile::first();
        return view('user/altissia', compact('company'));
    }

    public function sendmessage(StoreInboxRequest $request)
    {
        $inbox = Inbox::create($request->all());
        return redirect()->back()->with('message', 'Pesan anda telah terkirim ke Pride Homeschooling Tangsel');
    }

    public function alumni()
    {
        $company = CompanyProfile::first();
        $header = HeaderDescription::get();
        $services = Service::get();
        $testimonials = Testimonial::get();
        $teachers = Team::get();
        $main_programs = OtherContent::where('category_id', 2)->get();
        $curriculum = OtherContent::where('category_id', 3)->get();
        $programs = OtherContent::where('category_id', 4)->get();
        $alumnis = OtherContent::where('category_id', 5)->orderBy('id', 'desc')->paginate(15);

        return view('user/alumni', compact('company', 'header', 'services', 'testimonials', 'teachers', 'main_programs', 'curriculum', 'programs', 'alumnis'));
    }
}
