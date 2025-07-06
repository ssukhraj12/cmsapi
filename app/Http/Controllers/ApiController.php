<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Website;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getBlogs(Request $request)
    {
        $blogs = Blog::all();
        return response()->json([
            'success' => true,
            'blogs' => $blogs
        ]);
    }

    public function getGalleries(Request $request){
        $galleries = Gallery::all();
        return response()->json([
            'success' => true,
            'galleries' => $galleries
        ]);
    }

    public function getWebsite(Request $request)
    {
        $website = Website::first();
        return response()->json([
            'success' => true,
            'website' => $website
        ]);
    }
}
