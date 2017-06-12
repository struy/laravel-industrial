<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\ProjectService;

class ProjectServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $services =  ProjectService::paginate(5);



        $data = [
            'page_title' => 'Project Service List',
            'services' =>  $services,
            'lang' => \App::getLocale(),
        ];


//        if($request->ajax()) {
//            return [
//                'posts' => view('projectservices.ajax.index')->with($data)->render(),
//                'next_page' => $services->nextPageUrl()
//            ];
//        }

      //  return view('blog.index')->with(compact('posts'));




        return view('projectservices/list', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = ProjectService::findOrFail($id);


        $data = [
            'page_title' => $service->name,
            'service' => $service,

        ];

        return view('projectservices/view', $data);




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
