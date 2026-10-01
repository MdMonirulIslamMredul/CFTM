<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\subCategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AdmissionInfoController;
use App\Http\Controllers\Product\BrandController;
use App\Http\Controllers\BannerAndTitleController;
use App\Http\Controllers\FacilityDetailController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\WebsiteSettingsController;
use App\Http\Controllers\AdmissionRequireController;
use App\Http\Controllers\Product\AttributeController;
use App\Http\Controllers\AppointmentSettingController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Product\AttributeInfoController;
use App\Http\Controllers\Product\ProductSubCategoryController;
use App\Http\Controllers\Product\ProductChildCategoryController;
use App\Http\Controllers\ProductCategory\ProductCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [WebsiteController::class, 'home'])->name('front.page');
Route::get('/courses-details/{id}', [WebsiteController::class, 'courses_details'])->name('courses.details');
Route::get('/all-courses', [WebsiteController::class, 'all_details'])->name('courses');
Route::get('/course-category/{id}', [WebsiteController::class, 'category'])->name('course-category');
Route::get('/course-sub-category/{id}', [WebsiteController::class, 'subCategory'])->name('course-sub-category');
Route::get('/about-page', [WebsiteController::class, 'about_page'])->name('about.page');
Route::get('/mission-vision', [WebsiteController::class, 'mission_page'])->name('mission.page');

Route::get('/team-page/{id}', [WebsiteController::class, 'team_page'])->name('team.page');
Route::get('/management-page', [WebsiteController::class, 'management_page'])->name('management.page');
Route::get('/testimonial-page', [WebsiteController::class, 'testimonial_page'])->name('testimonial.page');
Route::get('/admission-page', [WebsiteController::class, 'admission_page'])->name('admission.page');
Route::get('/appointment/book/{id}', [WebsiteController::class, 'tech_web_appointment_book'])->name('appointment.book')->middleware('auth');
Route::get('/career-page', [WebsiteController::class, 'career_page'])->name('career.page');
Route::post('/career/submit', [CareerController::class, 'submit'])->name('career.submit');
Route::get('/facility-des/{id}',[WebsiteController::class,'facility_details'])->name('facility.details');







Route::get('/result-page', [WebsiteController::class, 'result_page'])->name('result.page');
Route::get('/result-archive', [WebsiteController::class, 'result_archive'])->name('result.archive');
Route::post('/result-archive/verify', [WebsiteController::class, 'verify_result'])->name('result.verify');
Route::post('/result_search', [WebsiteController::class,'search'])->name('result_search');

Route::get('/blogs-page', [WebsiteController::class, 'blogs_page'])->name('blogs.page');
Route::get('/blogs-details/{id}', [WebsiteController::class, 'blogs_details'])->name('blogs.details');
Route::get('/contacts', [WebsiteController::class, 'contacts'])->name('contacts');
Route::get('/gallery-page', [WebsiteController::class, 'gallery_page'])->name('gallery.page');
Route::get('/video-gallery-page', [WebsiteController::class, 'video_gallery_page'])->name('video.gallery.page');

//appointment start
Route::post('/appointment', [WebsiteSettingsController::class, 'appointment'])->name('appointment');
//appointment end

//contact form start
Route::post('/contact', [WebsiteSettingsController::class, 'contact'])->name('contact');
//contact form end




Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('auth', 'is_admin');
Route::get('doctor/home', [HomeController::class, 'doctorHome'])->name('doctor.home')->middleware('auth', 'is_doctor');
Route::get('customer/home', [HomeController::class, 'customerHome'])->name('customer.dashboard')->middleware('auth');

//category start
Route::resource('category', CategoryController::class)->middleware('is_admin');
//category end
//Category Services Start
Route::controller(subCategoryController::class)->group(function () {
    Route::get('/add-category-services', 'create')->name('add.category.services')->middleware('is_admin');
    Route::post('/store-category-services', 'store')->name('store.category.services')->middleware('is_admin');
    Route::get('/edit-category-services/{id}', 'edit')->name('edit.category.services')->middleware('is_admin');
    Route::post('/update-category-services', 'update')->name('update.category.services')->middleware('is_admin');
    Route::get('/delete-category-services/{id}', 'delete')->name('delete.category.services')->middleware('is_admin');
});
Route::get('/get-sub-category-by-category',[ CourseController::class,'getSubCategoryByCategory' ])->name('get-sub-category-by-category');

//Category Services End

//service start
Route::get('/add-services', [CourseController::class, 'add_services'])->name('add.services')->middleware('is_admin', 'is_admin');
Route::post('/store-services', [CourseController::class, 'store_services'])->name('store.services')->middleware('is_admin');
Route::get('/edit-services/{id}', [CourseController::class, 'edit_services'])->name('edit.services')->middleware('is_admin');
Route::post('/update-services', [CourseController::class, 'update_services'])->name('update.services')->middleware('is_admin');
//service end

//Facilities START
Route::resource('facility',FacilityController::class)->middleware('is_admin');
Route::resource('facility-details',FacilityDetailController::class)->middleware('is_admin');
//Facilities END

//photo gallery start
Route::get('/add-gallery', [GalleryController::class, 'tech_web_add_gallery'])->name('add.gallery')->middleware('is_admin');
Route::post('/store-gallery', [GalleryController::class, 'tech_web_store_gallery'])->name('store.gallery')->middleware('is_admin');
Route::get('/edit-gallery/{id}', [GalleryController::class, 'tech_web_edit_gallery'])->name('edit.gallery')->middleware('is_admin');
Route::post('/update-gallery', [GalleryController::class, 'tech_web_update_gallery'])->name('update.gallery')->middleware('is_admin');
Route::post('/delete-gallery/{id}', [GalleryController::class, 'tech_web_delete_gallery'])->name('delete.gallery')->middleware('is_admin');

//photo gallery end

//video gallery start
Route::get('/add-video-gallery', [GalleryController::class, 'tech_web_add_video_gallery'])->name('add.video.gallery')->middleware('is_admin');
Route::post('/store-video-gallery', [GalleryController::class, 'tech_web_store_video_gallery'])->name('store.video.gallery')->middleware('is_admin');
Route::get('/edit-video-gallery/{id}', [GalleryController::class, 'tech_web_edit_video_gallery'])->name('edit.video.gallery')->middleware('is_admin');
Route::post('/update-video-gallery', [GalleryController::class, 'tech_web_update_video_gallery'])->name('update.video.gallery')->middleware('is_admin');
//video gallery end

//about start
Route::get('/add-about', [AboutController::class, 'add_about'])->name('add.about')->middleware('is_admin');
Route::post('/store-about', [AboutController::class, 'store_about'])->name('store.about')->middleware('is_admin');
Route::get('/edit-about/{id}', [AboutController::class, 'edit_about'])->name('edit.about')->middleware('is_admin');
Route::post('/update-about', [AboutController::class, 'update_about'])->name('update.about')->middleware('is_admin');
//about end

//doctor start
Route::get('/add-doctor', [DoctorController::class, 'add_doctor'])->name('add.doctor')->middleware('is_admin');
Route::post('/store-doctor', [DoctorController::class, 'store_doctor'])->name('store.doctor')->middleware('is_admin');
Route::get('/edit-doctor/{id}', [DoctorController::class, 'edit_doctor'])->name('edit.doctor')->middleware('is_admin');
Route::post('/update-doctor', [DoctorController::class, 'update_doctor'])->name('update.doctor')->middleware('is_admin');
//doctor end

//team start
Route::get('/add-team', [TeamController::class, 'add_team'])->name('add.team')->middleware('is_admin');
Route::post('/store-team', [TeamController::class, 'store_team'])->name('store.team')->middleware('is_admin');
Route::get('/edit-team/{id}', [TeamController::class, 'edit_team'])->name('edit.team')->middleware('is_admin');
Route::post('/update-team', [TeamController::class, 'update_team'])->name('update.team')->middleware('is_admin');
//team end

//testimonial start
Route::get('/add-testimonial', [TestimonialController::class, 'add_testimonial'])->name('add.testimonial')->middleware('is_admin');
Route::post('/store-testimonial', [TestimonialController::class, 'store_testimonial'])->name('store.testimonial')->middleware('is_admin');
Route::get('/edit-testimonial/{id}', [TestimonialController::class, 'edit_testimonial'])->name('edit.testimonial')->middleware('is_admin');
Route::post('/update-testimonial', [TestimonialController::class, 'update_testimonial'])->name('update.testimonial')->middleware('is_admin');
//testimonial end

//Appointment info start
Route::get('/add-appointment-info', [AdmissionInfoController::class, 'add_appointment_info'])->name('add.appointment.info')->middleware('is_admin');
Route::post('/store-appointment-info', [AdmissionInfoController::class, 'store_appointment_info'])->name('store.appointment.info')->middleware('is_admin');
Route::get('/edit-appointment-info/{id}', [AdmissionInfoController::class, 'edit_appointment_info'])->name('edit.appointment.info')->middleware('is_admin');
Route::post('/update-appointment-info', [AdmissionInfoController::class, 'update_appointment_info'])->name('update.appointment.info')->middleware('is_admin');
//Appointment info end
//Admission Require Start
Route::resource('admission-require',AdmissionRequireController::class)->middleware('is_admin');
//Admission Require End
//Result Start
Route::resource('result',ResultController::class)->middleware('is_admin');
// Student Results Verification Archive
Route::get('student-results/download-sample-csv', [StudentResultController::class, 'downloadSampleCsv'])->name('student-results.download-sample-csv')->middleware('is_admin');
Route::post('student-results/import-csv', [StudentResultController::class, 'importCsv'])->name('student-results.import-csv')->middleware('is_admin');
Route::resource('student-results', StudentResultController::class)->middleware('is_admin');
//Result End
Route::resource('partner',PartnerController::class)->middleware('is_admin');

// //Appointment booking Setting start
Route::get('/pending-appointment-service', [AppointmentSettingController::class, 'tech_web_add_appointment_setting'])->name('add.appointment.setting')->middleware('auth');
Route::get('/check-status', [AppointmentSettingController::class, 'tech_web_check_status'])->name('check.status')->middleware('auth');
Route::get('/approve-service-order/{id}', [AppointmentSettingController::class, 'tech_web_approve_service_order'])->name('approve.order')->middleware('auth');
// Route::get('/edit-appointment-info/{id}', [AppointmentInfoController::class, 'edit_appointment_info'])->name('edit.appointment.info')->middleware('is_admin');
Route::post('/update-appointment-info/{id}', [AppointmentSettingController::class, 'tech_web_update_info'])->name('update.info')->middleware('is_admin');
Route::post('/accept-appointment-info/{id}', [AppointmentSettingController::class, 'tech_web_accept'])->name('accept.info')->middleware('is_doctor');
Route::post('/extend-date/{id}', [AppointmentSettingController::class, 'tech_web_more_date'])->name('more.date')->middleware('auth');
Route::get('/order-details/{id}', [AppointmentSettingController::class, 'tech_web_approve_order_details'])->name('details.order')->middleware('auth');
Route::get('/extend-approve/{id}', [AppointmentSettingController::class, 'tech_web_approve_extend'])->name('approve.date')->middleware('auth');
Route::post('/extend-date-approved/{id}', [AppointmentSettingController::class, 'tech_web_approve_extend_date'])->name('extend.date')->middleware('auth');



// //Appointment booking Setting end


//Session start
Route::get('/add-session', [SessionController::class, 'add_session'])->name('add.session')->middleware('is_admin');
Route::post('/store-session', [SessionController::class, 'store_session'])->name('store.session')->middleware('is_admin');
Route::get('/edit-session/{id}', [SessionController::class, 'edit_session'])->name('edit.session')->middleware('is_admin');
Route::post('/update-session', [SessionController::class, 'update_session'])->name('update.session')->middleware('is_admin');
Route::post('/delete-session/{id}', [SessionController::class, 'delete_session'])->name('delete.session')->middleware('is_admin');

//Session end

//Blogs start
Route::get('/add-blogs', [BlogController::class, 'add_blogs'])->name('add.blogs')->middleware('is_admin');
Route::post('/store-blogs', [BlogController::class, 'store_blogs'])->name('store.blogs')->middleware('is_admin');
Route::get('/edit-blogs/{id}', [BlogController::class, 'edit_blogs'])->name('edit.blogs')->middleware('is_admin');
Route::post('/update-blogs', [BlogController::class, 'update_blogs'])->name('update.blogs')->middleware('is_admin');
//Blogs end

//Management start
Route::get('/add-management', [ManagementController::class, 'add_management'])->name('add.management')->middleware('is_admin');
Route::post('/store-management', [ManagementController::class, 'store_management'])->name('store.management')->middleware('is_admin');
Route::get('/edit-management/{id}', [ManagementController::class, 'edit_management'])->name('edit.management')->middleware('is_admin');
Route::post('/update-management', [ManagementController::class, 'update_management'])->name('update.management')->middleware('is_admin');
//Management end

//Banner and Tile
Route::post('/store-banner-title', [BannerAndTitleController::class, 'store_banner_tile'])->name('store.banner.title')->middleware('is_admin');
Route::get('/edit-banner-title/{id}', [BannerAndTitleController::class, 'edit_banner_tile'])->name('edit.banner.title')->middleware('is_admin');
Route::post('/update-banner-title/{id}', [BannerAndTitleController::class, 'update_banner_tile'])->name('update.banner.title')->middleware('is_admin');
//Banner and title

//Logo start
Route::post('/store-logo', [WebsiteSettingsController::class, 'store_logo'])->name('store.logo')->middleware('is_admin');
//Logo end

//links start
Route::post('/store-links', [WebsiteSettingsController::class, 'store_links'])->name('store.links')->middleware('is_admin');
//Links end

//counter start
Route::post('/store-counter', [WebsiteSettingsController::class, 'store_counter'])->name('store.counter')->middleware('is_admin');
//counter end

//footer start
Route::post('/store-footer', [WebsiteSettingsController::class, 'store_footer'])->name('store.footer')->middleware('is_admin');

//footer end

//banner start
Route::post('/store-main-banner', [WebsiteSettingsController::class, 'store_main_banner'])->name('store.main.banner')->middleware('is_admin');
Route::get('/edit-main-banner/{id}', [WebsiteSettingsController::class, 'edit_main_banner'])->name('edit.main.banner')->middleware('is_admin');
Route::post('/update-main-banner/{id}', [WebsiteSettingsController::class, 'update_main_banner'])->name('update.main.banner')->middleware('is_admin');
//banner end




//general settings start
Route::get('/general-settings', [GeneralController::class, 'general_settings'])->name('general.settings')->middleware('is_admin');
//general settings end

//profile settings start
Route::get('/profile-settings', [GeneralController::class, 'profile_settings'])->name('profile.settings')->middleware('auth');
Route::post('/update-profile', [GeneralController::class, 'update_profile'])->name('update.profile')->middleware('auth');
//profile settings end



Route::middleware([
    'auth',
    'verified',
    'is_admin',
])->group(function () {

//Product category Start
Route::resource('product-category',ProductCategoryController::class);
//Product category  End
//Product Sub Category Start
Route::resource('product-sub-category',ProductSubCategoryController::class);
//Product Sub Category  End
//Product child Sub category Start
Route::resource('product-child-category',ProductChildCategoryController::class);
//Product Child Sub category  End
//Product Attribute Start
Route::resource('attribute',AttributeController::class);
//Product Attribute End
//Product Brand Start
Route::resource('brand',BrandController::class);
//Product Brand  End
//Product  Start
Route::resource('product',ProductController::class);
//Product   End
//Product Attribute info Start
Route::resource('attribute-info',AttributeInfoController::class);
//Product Attribute info End
//Route::get('/get-sub-category-by-category',[ ProductController::class,'getSubCategoryByCategory' ])->name('get-sub-category-by-category');
Route::get('/get-child-category-by-sub-category',[ ProductController::class,'getChildCategoryBySubCategory' ])->name('get-child-category-by-sub-category');
Route::get('/get-attribute-info-by-attribute',[ ProductController::class,'getAttributeInfoByAttribute' ])->name('get-attribute-info-by-attribute');

});
