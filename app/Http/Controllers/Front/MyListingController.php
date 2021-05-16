<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Facades\App\Services\SaveHeaderMedia;
use Facades\App\Services\Redirect;
use Facades\App\Utility\AddFeatures;

class MyListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Auth::user()->events()->paginate(5);
        return view('front.dashboard.myListing', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cities = City::all();
        return view('front.dashboard.addListing', compact('categories', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = Category::all()->pluck('id')->toArray();
        $AllowedHeaderMedias = array('image', 'carousel', 'url');
        $cities = City::all()->pluck('id')->toArray();
        $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
        $user = Auth::user();
        $validatedData = $request->validate([
            'title' => 'required|min:3|string',
            'categories' => ['required', 'numeric', Rule::in($categories)],
            'city' => ['required', 'numeric', Rule::in($cities)],
            'tags' => 'required|string',
            'x-map' => 'required|numeric',
            'y-map' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'website' => 'nullable',
            'headerImageUrl' => 'url|nullable',
            'description' => 'required|string',
            'facilities.*' => 'required',
            'accordion.*.title' => 'required|string',
            'accordion.*.content' => 'required|string',
            'working_hours' => 'nullable',
//            'working_hours.*.day' => ['required', 'string', Rule::in($days)],
            'working_hours.*.hour' => 'required',
            'price_range' => 'nullable|string',
            'bookingOptions.*' => 'required|max:50',
        ]);
        $creatingData = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'website' => $validatedData['website'],
            'email' => $validatedData['email'],
            'category_id' => $validatedData['categories'],
            'city_id' => $validatedData['city'],
            'price' => $validatedData['price_range']
        ];
//        SaveUploadedFiles::saveHeaderMedia($request,$creatingData);
        if ($request->input('header_media') == 'image') {
            if (!empty($request->file('headerOneImage'))) {
                $image['singleImage'] = $request->file('headerOneImage')->store('header_media');
                $encodedSingleImage = json_encode($image);
                $creatingData = array_merge($creatingData, [
                    'header_media' => $encodedSingleImage
                ]);
            } else {
                Redirect::redirectBack('Please upload an Image');
            }
        } elseif ($request->input('header_media') == 'carousel') {
            if (!empty($request->file('carouselImages'))) {
                foreach ($request->file('carouselImages') as $file) {
                    $carouselImages['carouselImages'][] = $file->store('header_media');
                }
                $encodedCarouselImages = json_encode($carouselImages);
                $creatingData = array_merge($creatingData, [
                    'header_media' => $encodedCarouselImages
                ]);
            } else {
                Redirect::redirectBack('Please upload Carousel Images');
            }
        } elseif ($request->has('header_media') == 'url') {
            if (!empty($request->input('headerImageUrl'))) {
                $mediaUrl = $request->input('headerImageUrl');
                $creatingData = array_merge($creatingData, [
                    'header_media_url' => $mediaUrl
                ]);
            } else {
                Redirect::redirectBack('Please Enter a Url');
            }
        }
        if (!empty($request->file('thumbnail_image'))) {
            $thumbnail['thumbnailImage'] = $request->file('thumbnail_image')->store('thumbnails');
            if ($request->input('show_thumbnail_single_page') && $request->input('show_thumbnail_single_page') == 'on')
                $thumbnail['show_thumbnail'] = true;
            else
                $thumbnail['show_thumbnail'] = false;
            $encodedSingleImage = json_encode($thumbnail);
            $creatingData = array_merge($creatingData, [
                'thumbnail' => $encodedSingleImage
            ]);
        }
        $eventItem = $user->events()->create($creatingData);
        if ($request->has('accordion_menu')) {
            if (!empty($request->input('accordion')))
                AddFeatures::accordion($eventItem, $request->input('accordion'));
            else
                Redirect::redirectBack('Enter title or content of Accordion menu', false);
        }
        if ($request->has('facilities')) {
            if (!empty($request->input('facilities')))
                AddFeatures::facility($eventItem, $request->input('facilities'));
            else
                Redirect::redirectBack('Enter Facilities Correctly', false);
        }
        if ($request->has('onWorkingHours')) {
            if (!empty($request->input('working_hours')))
                AddFeatures::working_hour($eventItem, $request->input('working_hours'));
            else
                Redirect::redirectBack('Enter Working Hours Correctly', false);
        }
        $booking_feature = [];
        if ($request->has('booking_date')) {
            $booking_feature['date'] = true;
        }
        if ($request->has('booking_select')) {
            if (!empty($request->input('bookingOptions'))) {
                $booking_feature['options'] = $request->input('bookingOptions');
            } else {
                Redirect::redirectBack('Enter Options Correctly', false);
            }
        }
        if (count($booking_feature) > 0) {
            AddFeatures::booking($eventItem, $booking_feature);
        }
        Redirect::redirectTo('front.dashboard.listing.index', true, 'Your Event Has Been Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
