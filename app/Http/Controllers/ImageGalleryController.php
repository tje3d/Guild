<?php

namespace App\Http\Controllers;

use App\ImageGallery;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
	public function index(Request $request)
	{
		$imageGalleries = \App\ImageGallery::latest()->get();
		return view('imagegallery.index', compact('imageGalleries'));
	}

	/**
	 * Handle file upload
	 */
	public function postIndex(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|mimes:jpg,jpeg,png|image',
		]);

		$imageGallery = ImageGallery::create();
		$imageGallery->addMedia($request->file('file'))->toMediaCollection('images');

		return back()->with('success', 'Gallery Updated');
	}

	/**
	 * Delete
	 */
	public function delete(ImageGallery $imageGallery)
	{
		$imageGallery->delete();

		return back()->with('success', 'Image Deleted Succesful');
	}
}
