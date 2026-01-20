<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function setting(Request $request){
        $setting =  DB::table('settings')->select('id' , 'key' , 'value')->get();
        return view('*********', compact('setting'));
    }
    public function setSetting(Request $request)
    {

        $data = $request->validate([
            'key' => 'required|string|exists:settings,key',
            'value' => 'required|string|max:255',
        ]);

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
        return redirect()->route('********');
    }
}
