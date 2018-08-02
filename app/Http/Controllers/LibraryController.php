<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Library;
use Validator;

class LibraryController extends Controller
{
	public function index()
	{
		$libraries = Library::withDepth()->get();
		$libraries = $libraries->toTree();

		return view('libraries.index', ['libraries' => $libraries]);
	}

	public function create()
	{
		$libraries = Library::withDepth()->get();
		$libraries = $libraries->toTree();

		return view('libraries.create', ['libraries' => $libraries]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'title'       => 'required|max:100',
			'description' => 'max:255',
			'id'          => 'integer|exists:libraries'
		]);

		if(!$validator->fails())
		{
			$node = Library::create([
				'title'       => $request->input('title'),
				'description' => $request->input('description')
			]);

			$parent = $request->input('id');
			// if node save as root
			if($parent == null)
			{
				$node->saveAsRoot();

				return redirect('libraries')
					->with('successMsg', $request->input('title').' has been successfully created as root category.');
			} else {
				$node->parent_id = $parent;
				$node->save();
				$parent_name = Library::find($parent)->title;

				return redirect('libraries')
					->with('successMsg', $request->input('title').' has been successfully created under '.$parent_name);
			}
		} else {
			return redirect('libraries/create')
				->withErrors($validator)
				->withInput();
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$library = Library::find($id);
		$libraries = Library::withDepth()->get();
		$libraries = $libraries->toTree();

		return view('libraries.edit', ['library' => $library, 'libraries' => $libraries]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$library = Library::findOrFail($id);

		$validator = Validator::make($request->all(), [
			'title'       => 'required|max:100',
			'description' => 'max:255',
			'id'          => 'integer|exists:libraries'
		]);

		$parent = $request->input('id');
		$node = Library::find($parent);

		// if change the node
		if ($library->parent_id != $parent)
		{
			// if the node has children
			if ($library->getDescendantCount() > 0)
			{
				return redirect()
					->back()
					->with('errorMsg', 'This library has children, you can\'t move this library until you removed all the children');
			} else {
				if(!$validator->fails())
				{
					// delete node first
					$library->delete();
					// then recreate new node
					$node = Library::create([
						'title'       => $request->input('title'),
						'description' => $request->input('description')
					]);
					// if node move to root
					if($parent == null)
					{
						$node->saveAsRoot();

						return redirect('libraries')
							->with('successMsg', $request->input('title').' has been successfully moved as root library.');
					} else {
						$node->parent_id = $parent;
						$node->save();
						$parent_name = Library::find($parent)->title;

						return redirect('libraries')
							->with('successMsg', $request->input('title').' has been successfully moved under '.$parent_name);
					}
				} else {
					return redirect('libraries')
						->with('successMsg', 'Library has been successfully edited.');
				}
			}
		} else {
			if(!$validator->fails())
			{
				$library->title = $request->input('title');
				$library->description = $request->input('description');
				$library->save();

				return redirect('libraries')
					->with('successMsg', 'Library has been successfully edited.');
			} else {
				return redirect()
					->back()
					->withErrors($validator)
					->withInput();
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$library = Library::findOrFail($id);

		if(!$library->delete())
		{
			return redirect('libraries');
		}

		return redirect('libraries')->with('successMsg', $library->title.' has been deleted.');
	}
}
