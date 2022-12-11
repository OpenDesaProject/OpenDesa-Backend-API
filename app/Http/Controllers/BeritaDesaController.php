<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaDesa;
use Illuminate\Support\Facades\DB;
use willvincent\Feeds\Facades\FeedsFacade;

class BeritaDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->getFeeds();
        $feeds = collect($data)->sortByDesc('date')->take(config('setting.jumlah_artikel_desa') ?? 30);
        $feeds->all();
        return response()->json([$data]);
    }


    private function getFeeds()
    {
        $all_desa = BeritaDesa::websiteUrl()->get()
            ->map(function ($desa) {
                return $desa->website_url_feed;
            })->all();

        $feeds = [];
        foreach ($all_desa as $desa) {
            $getFeeds = FeedsFacade::make($desa['website'], 5, true);
            foreach ($getFeeds->get_items() as $item) {
                $feeds[] = [
                    'desa_id'     => $desa['desa_id'],
                    'nama_desa'   => $desa['nama'],
                    'feed_link'   => $item->get_feed()->get_permalink(),
                    'feed_title'  => $item->get_feed()->get_title(),
                    'link'        => $item->get_link(),
                    'date'        => \Carbon\Carbon::parse($item->get_date('U')),
                    'author'      => $item->get_author()->get_name() ?? 'Administrator',
                    'title'       => $item->get_title(),
                    // 'image'       => get_tag_image($item->get_description()),
                    'image'       => $item->get_description(),
                    'description' => strip_tags(substr(str_replace(['&amp;', 'nbsp;', '[...]'], '', $item->get_description()), 0, 250) . '[...]'),
                    'content'     => $item->get_content(),
                ];
            }
        }

        return $feeds ?? null;
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
        //
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
