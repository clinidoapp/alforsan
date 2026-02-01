<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function setting(Request $request){
        $setting =  DB::table('settings')->select('id' , 'key' , 'value')->paginate(10);
        return view('dashboard.pages.settings.list', compact('setting'));
    }
    public function setSetting(Request $request)
    {

        $data = $request->validate([
            'key' => 'required|string|exists:settings,key',
            'value' => 'required|string|max:255',
        ]);

        $value = preg_replace('/^\+?2/', '', $data['value']);
        $data['value'] = $value;

        DB::transaction(function () use ($data) {
            DB::table('settings')->updateOrInsert(
                ['key' => $data['key']],
                ['value' => $data['value'], 'updated_at' => now()]
            );
            $envPath = base_path('.env');
            $content = file_get_contents($envPath);

            $escapedKey = preg_quote($data['key'], '/');
            if (preg_match("/^{$escapedKey}\s*=.*/m", $content)) {
                $content = preg_replace(
                    "/^{$escapedKey}\s*=.*/m",
                    "{$data['key']}=\"{$data['value']}\"",
                    $content
                );
            } else {
                $content .= "\n{$data['key']}=\"{$data['value']}\"";
            }

            file_put_contents($envPath, $content);

        });
        return redirect()->route('setting')->with('success', 'Value updated successfully.');
    }

}
