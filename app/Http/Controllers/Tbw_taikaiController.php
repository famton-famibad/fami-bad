<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbw_taikai;

class Tbw_taikaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taikais = Tbw_taikai::where('del_flg', 0)->orderBy('kaisai_date', 'asc')->paginate(30);
        return view('taikai.index', compact('taikais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("taikai.create", []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'taikai_name' => 'required',
            'prefecture' => 'required',
            'team' => 'required',
            'kaisai_date' => 'required|date'

        ]);

        $result = Tbw_taikai::create([
            'taikai_name' => $request->taikai_name,
            'prefecture' => $request->prefecture,
            'city' => $request->city,
            'team' => $request->team,
            'kaisai_date' => $request->kaisai_date
        ]);

        if (!empty($result)) {
            session()->flash('flash_message_create', '大会情報を登録しました。');
        } else {
            session()->flash('flash_error_message_create', '大会情報を登録できませんでした。');
        }

        return redirect()->route('taikai.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $taikai = Tbw_taikai::find($id);
        return view('taikai.edit',compact('taikai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'taikai_name' => 'required',
            'prefecture' => 'required',
            'team' => 'required',
            'kaisai_date' => 'required|date'
        ]);

        try {
            $taikai = Tbw_taikai::find($id);
            if ($taikai) {
                $taikai->update([
                    'taikai_name' => $request->taikai_name,
                    'prefecture' => $request->prefecture,
                    'city' => $request->city,
                    'team' => $request->team,
                    'kaisai_date' => $request->kaisai_date
                ]);
                session()->flash('flash_message_update', '大会情報を更新しました。');
            } else {
                session()->flash('flash_error_message_update', '大会情報を更新できませんでした。');
            }
        } catch (\Exception $e) {
            session()->flash('flash_error_message_update', '大会情報を更新できませんでした。' . $e->getMessage());
        }

        return redirect()->route('taikai.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taikai = Tbw_taikai::find($id);
        if ($taikai) {
            $taikai->update(['del_flg' => 1]);
            session()->flash('flash_message_delete', '大会情報を削除しました。');
        } else {
            session()->flash('flash_error_message_delete', '大会情報が見つかりませんでした。');
        }
        return redirect()->route('taikai.index');
    }
}
