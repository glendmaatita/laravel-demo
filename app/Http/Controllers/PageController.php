<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests;
use App\Http\Requests\PageFormRequest;
use App\Http\Controllers\Controller;
use App\Notifications\PageDeleted;
use App\Events\PageDeletedEvent;
use App\Page;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        // $minutes = 60;
        // $pages = Cache::remember('pages', $minutes, function () {
        //     return Page::all();
        // });
        return view('page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        Page::create([
            'url' => $request->input('url'),
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        // Cache::flush();

        return redirect()->route('page.index')->with('info', 'Page has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Page::find($id);
        return view('page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, $id)
    {
        $page = Page::find($id);
        $page->url = $request->input('url');
        $page->name = $request->input('name');
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->save();

        // Cache::flush();

        return redirect()->route('page.index')->with('info', 'Page has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        // $page->delete();

        // send email
        // $content = 'Page di delete';
        // Mail::to('glend.maatita@gmail.com')->send(new PageDeleted($content));

        // trigger event
        event(new PageDeletedEvent($page));

        // Cache::flush();

        return redirect()->route('page.index')->with('info', 'Page has been deleted.');
    }
}
