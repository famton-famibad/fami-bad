<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbm_team;

class Tbm_teamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 各都道府県ごとのデータ件数を取得
        $teamsCnt = Tbm_team::select('prefecture')
            ->where('del_flg', 0)
            ->groupBy('prefecture')
            ->selectRaw('prefecture, count(*) as count')
            ->pluck('count', 'prefecture');
            
        $prefecture = $request->query('prefecture');

        if ($prefecture) {
            // 都道府県が指定された場合
            return $this->search($prefecture); // searchメソッドを呼び出す
        } else {
            // パラメータがない場合は非表示
            //$teams = Tbm_team::all();
            $teams = null;
            $indexFlg = true;
        }

        if ($request->ajax()) {
            return response()->json([
                'teams' => $teams,
                'teamsCnt' => $teamsCnt,
                'indexFlg' => $indexFlg,
            ]);
        }

        return view('team.index', compact('teams', 'teamsCnt', 'indexFlg'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(view: "team.create", data: []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'team_name' => 'required',
            'fileid' => 'nullable|file',
            'prefecture' => 'required',
            'city' => 'nullable|string',
            'practice_info' => 'nullable|string',
            'delegate' => 'nullable|string',
            'contact' => 'nullable|string',
            'sns1' => 'nullable|string',
            'sns2' => 'nullable|string',
            'sns3' => 'nullable|string',
            'optional' => 'nullable|string',
        ]);

        $data = $request->only([
            'team_name',
            'prefecture',
            'city',
            'practice_info',
            'delegate',
            'contact',
            'sns1',
            'sns2',
            'sns3',
            'optional'
        ]);

        if ($request->hasFile('fileid')) {
            $extension = $request->file('fileid')->getClientOriginalExtension(); // 拡張子を取得
            $uniqueId = time(); // 現在のタイムスタンプを取得
            $fileName = $data['team_name'] . '_' . $uniqueId . '.' . $extension; // 新しいファイル名を作成
            $data['file_name'] = $fileName;
            $data['file_extension'] = $extension; // 拡張子を保存
            $request->file('fileid')->storeAs('team', $fileName, 'public');
        }

        Tbm_team::create($data);

        session()->flash('flash_message_create', 'チーム情報を登録しました。');
        return redirect()->route('team.index', ['prefecture' => $data['prefecture']]); 
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
        $team = Tbm_team::find($id);
        if (!$team) {
            session()->flash('flash_error_message', 'チーム情報が見つかりませんでした。');
            return redirect()->route('team.index');
        }
        return view('team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'team_name' => 'required',
            'prefecture' => 'required',
            'city' => 'nullable|string',
            'practice_info' => 'nullable|string',
            'delegate' => 'nullable|string',
            'contact' => 'nullable|string',
            'sns1' => 'nullable|string',
            'sns2' => 'nullable|string',
            'sns3' => 'nullable|string',
            'optional' => 'nullable|string',
            'fileid' => 'nullable|file' // ファイルのバリデーションを追加
        ]);

        try {
            $team = Tbm_team::find($id);
            if ($team) {
                // ファイルの更新処理
                if ($request->hasFile('fileid')) {
                    // 古いファイルを削除する場合はここで処理
                    if ($team->file_name) {
                        \Storage::disk('public')->delete('team/' . $team->file_name);
                    }

                    $extension = $request->file('fileid')->getClientOriginalExtension(); // 拡張子を取得
                    $uniqueId = time(); // 現在のタイムスタンプを取得
                    $fileName = $team->team_name . '_' . $uniqueId . '.' . $extension; // 新しいファイル名を作成
                    $request->file('fileid')->storeAs('team', $fileName, 'public'); // ファイルを保存
                    $team->file_name = $fileName; // 新しいファイル名を保存
                }

                // チーム情報の更新
                $team->update([
                    'team_name' => $request->team_name,
                    'prefecture' => $request->prefecture,
                    'city' => $request->city,
                    'practice_info' => $request->practice_info,
                    'delegate' => $request->delegate,
                    'contact' => $request->contact,
                    'sns1' => $request->sns1,
                    'sns2' => $request->sns2,
                    'sns3' => $request->sns3,
                    'optional' => $request->optional,
                ]);

                // ファイル名を更新
                $team->save();

                session()->flash('flash_message_update', 'チーム情報を更新しました。');
            } else {
                session()->flash('flash_error_message_update', 'チーム情報が見つかりませんでした。');
            }
        } catch (\Exception $e) {
            session()->flash('flash_error_message_update', 'チーム情報を更新できませんでした。' . $e->getMessage());
        }

        return redirect()->route('team.search', ['prefecture' => $team['prefecture']]); // 修正
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Tbm_team::find($id);
        if ($team) {
            try {
                $team->update(['del_flg' => 1]); // del_flgを1に更新
                session()->flash('flash_message_delete', 'チーム情報を削除しました。');
            } catch (\Exception $e) {
                session()->flash('flash_error_message_delete', 'チーム情報の削除中にエラーが発生しました: ' . $e->getMessage());
            }
        } else {
            session()->flash('flash_error_message_delete', 'チーム情報が見つかりませんでした。');
        }
        return redirect()->route('team.index'); // 適切なリダイレクト先に変更
    }

    
    /**
     * Display a listing of the resource.
     */
    public function search($prefecture)
    {
        // 各都道府県ごとのデータ件数を取得
        $teamsCnt = Tbm_team::select('prefecture')
            ->where('del_flg', 0)
            ->groupBy('prefecture')
            ->selectRaw('prefecture, count(*) as count')
            ->pluck('count', 'prefecture');

        $teams = Tbm_team::where('prefecture', $prefecture)->get();

        if (request()->ajax()) {
            return response()->json([
                'teams' => $teams,
                'teamsCnt' => $teamsCnt,
            ]);
        }

        return view('team.index', compact('teams', 'teamsCnt'));
    }
}
