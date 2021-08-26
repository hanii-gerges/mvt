<?php

namespace App\Http\Controllers;

use App\Http\Resources\HeroSliderResource;
use App\Models\HeroSlider;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomePageController extends Controller
{

    public function index(){
        $sliders = HeroSlider::where("disabled","false")->orderBy("order","ASC")->get();

        foreach ($sliders as $slider){
            $data['sliders'][] = [
                "id" => $slider->id,
                "title" => $slider->title,
                "body" => $slider->body,
                "type" => $slider->type == 'i' ? "image" : "video",
                "media" => $slider->getFirstMedia() ? $slider->getFirstMedia()->getUrl() : null,
            ];
        }

        $services = Service::all();
        foreach ($services as $service){
            $data["services"][] = [
                "id"            => $service->id,
                "title"         => $service->title,
                "description"   => Str::limit($service->description, 20),
                "icon"          => $service->getFirstMedia() ? $this->getFirstMedia()->getUrl() : null,
            ];
        }
    }
}
