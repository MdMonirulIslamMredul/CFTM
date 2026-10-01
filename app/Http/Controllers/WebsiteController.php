<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Logo;
use App\Models\Team;
use App\Models\User;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Result;
use App\Models\Counter;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Session;
use App\Models\Category;
use App\Models\Facility;
use App\Models\Management;
use App\Models\SubCategory;
use App\Models\Testimonial;
use App\Models\FooterDetail;
use App\Models\VideoGallery;
use App\Models\WebsiteLinks;
use Illuminate\Http\Request;
use App\Models\AdmissionInfo;
use App\Models\BannerAndTitle;
use App\Models\FacilityDetail;
use App\Models\AdmissionRequire;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function home()
    {
        return view('frontend.home.home',[

            'categories'=> Category::where('status',1)->get(),
            
            'about'=>DB::table('abouts')->latest()->first(),
            'teams'=>Team::where('status',1)->where('add_home',1)->get(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'logo'=>DB::table('logos')->first('site_name'),
            'blogs'=>Blog::orderBy('created_at', 'desc')->where('status',1)->where('add_home',1)->get(),
            'titles'=>BannerAndTitle::get(),
            'banners'=>Banner::get(),
            'counter'=>Counter::latest()->first(),
            'galleries'=>Gallery::where('status',1)->orderBy('created_at', 'desc')->take('2')->get(),
            'video'=>VideoGallery::where('status',1)->orderBy('created_at', 'desc')->first(),
            'footer'=>FooterDetail::latest()->first(),
            'link'=>WebsiteLinks::latest()->first(),
            'facilities'=>Facility::latest()->get(),
            'admission'=>AdmissionInfo::latest()->first(),


        ]);
    }


    public function courses_details($id)
    {
        
        $course =Course::find($id);
        $category = Category::get();
        return view('frontend.services.courses_details',compact('course','category'));
    }
    public function all_details()
    {
        return view('frontend.services.courses_page',[
            'courses'=>Course::where('status',1)->paginate(8),
            'categories'=>Category::get()
        ]);
    }
    public function category($id)
    {
        return view('frontend.services.courses_page',[
            'category' => Category::find($id),
            'categories'=>Category::get(),
            'courses'=> Course::where('category_id',$id)->orderBy('id','desc')->get(['id','course_title','main_image']),
            

        ]);
    }
    public function subCategory($id)
    {
        $course =Course::where('sub_category_id',$id)->first();
        $category = Category::get();
        return view('frontend.services.courses_details',compact('course','category'));
    }
    // public function product($id)
    // {
    //     $this->product = Product::find($id);
    //     return view('website.product.index',[
    //         'product'=> Product::find($id),
    //         'category_products' =>Product::where('category_id',$this->product->category_id)->orderBy('id','desc')->take(4)->get(['id','name','image','selling_price','regular_price'])
    //     ]);
    // }

    public function about_page()
    {
        return view('frontend.about.about_page',[
            'about'=>DB::table('abouts')->latest()->first(),
            'counter'=>Counter::first(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'banner'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
        ]);
    }
    public function mission_page()
    {
        return view('frontend.about.mission_page',[
            'about'=>DB::table('abouts')->latest()->first(),
            'testimonials'=>Testimonial::where('status',1)->where('add_home',1)->get(),
            'banner'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
        ]);
    }
  public function team_page($id)
    {
       return view('frontend.team.team_page',[
            'teams'=>Team::where('department_id',$id)->get(),
            'banner'=>BannerAndTitle::where('page','doctors')->latest()->first(),
            'services'=>Course::get(),
        ]);
    }
    public function management_page()
    {
        return view('frontend.management.management_page',[
            'managements'=>Management::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','managements')->latest()->first(),
        ]);
    }
    public function testimonial_page()
    {
        return view('frontend.testimonial.testimonial_page',[
            'testimonials'=>Testimonial::where('status',1)->paginate(8),
            'banner'=>BannerAndTitle::where('page','testimonial')->latest()->first(),
        ]);
    }
    public function admission_page()
    {
        return view('frontend.appointment.appointment_page',[
            'banner'=>BannerAndTitle::where('page','appointment')->latest()->first(),
            'info'=>AdmissionInfo::first(),
            'admission_requires'=>AdmissionRequire::get()

        ]);
    }

    public function tech_web_appointment_book($id)
    {
        return view('frontend.appointment.appointment_form',[
            'banner'=>BannerAndTitle::where('page','appointment')->latest()->first(),
            'category'=>Category::get(),
            'service'=>Course::find($id),
            'services'=>Course::where('id','!=',$id)->get(),
            'user'=>User::find(auth()->user()->id)

        ]);
    }
    public function result_page()
    {
        $sessions = Session::get();
        // Pass variables to the view
        return view('frontend.result.result_search_page', compact('sessions'));
    }
    
    public function search(Request $request)
        {
            // Retrieve form data
            $session = $request->input('session_id');
            $studentId = $request->input('student_id');

            // Perform the search based on the form data
            $result = Result::where('session_id', $session)
                    ->where('student_id', $studentId)
                    ->first();

            // Pass the result variable to the result_page method
            return $this->result_page()->with(compact('result'));
        }


    public function blogs_page()
    {
        return view('frontend.blog.blogs_page',[
            'blogs'=>Blog::where('status',1)->paginate(6),
            'banner'=>BannerAndTitle::where('page','blogs')->latest()->first(),
        ]);
    }
    public function blogs_details($id)
    {
        return view('frontend.blog.blogs_details',[
            'blog'=>Blog::find($id),

        ]);
    }

    public function gallery_page()
    {
        return view('frontend.gallery.gallery_page',[
            'galleries'=>Gallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }
    public function video_gallery_page()
    {
        return view('frontend.gallery.video_gallery_page',[
            'galleries'=>VideoGallery::where('status',1)->get(),
            'banner'=>BannerAndTitle::where('page','gallery')->latest()->first(),
        ]);
    }

    public function contacts()
    {
        return view('frontend.contact.contact',[
            'link'=>DB::table('website_links')->latest()->first(),
            'banner'=>BannerAndTitle::where('page','contacts')->latest()->first(),
        ]);

    }
    public function career_page()
    {
        return view('frontend.career.career',[
            'link'=>DB::table('website_links')->latest()->first(),
            'banner'=>BannerAndTitle::where('page','contacts')->latest()->first(),
        ]);

    }
    public function facility_details($id)
    {
        return view('frontend.facility.facility',[
            'item'=>FacilityDetail::where('facility_id',$id)->latest()->first(),
            
        ]);
       

    }


}
