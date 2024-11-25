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
            'city' => 'nullable|string',
            'gym' => 'nullable|string',
            'team' => 'nullable|string',
            'contact' => 'nullable|string',
            'kaisai_date' => 'required|date',
            'fileid' => 'nullable|file',
            'status' => 'nullable|string',
            'others' => 'nullable|string'
        ]);

        $data = $request->only([
            'taikai_name',
            'prefecture',
            'city',
            'gym',
            'team',
            'contact',
            'kaisai_date',
            'status',
            'others',
        ]);
        
        if ($request->hasFile('fileid')) {
            $extension = $request->file('fileid')->getClientOriginalExtension(); // 拡張子を取得
            $uniqueId = time(); // 現在のタイムスタンプを取得
            $fileName = $data['taikai_name'] . '_' . $uniqueId . '.' . $extension; // 新しいファイル名を作成
            $data['file_name'] = $fileName;
            $data['file_extension'] = $extension; // 拡張子を保存
            $request->file('fileid')->storeAs('taikai', $fileName, 'public');
        }

        Tbw_taikai::create($data);

        if (!empty($data)) {
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
        $taikai = Tbw_taikai::find($id);
        if (!$taikai) {
            return redirect()->route('taikai.index')->with('flash_error_message', '大会情報が見つかりませんでした。');
        }
        return view('taikai.show', compact('taikai'));
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
            'city' => 'nullable|string',
            'gym' => 'nullable|string',
            'team' => 'nullable|string',
            'contact' => 'nullable|string',
            'kaisai_date' => 'required|date',
            'fileid' => 'nullable|file',
            'status' => 'nullable|string',
            'others' => 'nullable|string'
        ]);

        try {
            $taikai = Tbw_taikai::find($id);
            if ($taikai) {
                
                // ファイルの更新処理
                if ($request->hasFile('fileid')) {
                    // 古いファイルを削除する場合はここで処理
                    if ($taikai->file_name) {
                        \Storage::disk('public')->delete('team/' . $taikai->file_name);
                    }

                    $extension = $request->file('fileid')->getClientOriginalExtension(); // 拡張子を取得
                    $uniqueId = time(); // 現在のタイムスタンプを取得
                    $fileName = $taikai->taikai_name . '_' . $uniqueId . '.' . $extension; // 新しいファイル名を作成
                    $request->file('fileid')->storeAs('taikai', $fileName, 'public'); // ファイルを保存
                    $taikai->file_name = $fileName; // 新しいファイル名を保存
                }

                $taikai->update([
                    'taikai_name' => $request->taikai_name,
                    'prefecture' => $request->prefecture,
                    'city' => $request->city,
                    'gym' => $request->gym,
                    'team' => $request->team,
                    'contact' => $request->contact,
                    'kaisai_date' => $request->kaisai_date,
                    'status' => $request->status,
                    'others' => $request->others
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
