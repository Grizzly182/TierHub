<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Template;
use App\Models\TierList;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplatesController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        return view('templates.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $images = $request->file('images');
        $avatar = $request->file('avatar');
        $tiers = $request->input('tiers');

        if (!is_array($images) || !is_array($tiers)) {
            throw new Exception('image is not array');
        }

        $rows = [];
        $rowsIndexes = [];

        // Преобразуем всё это в json
        foreach ($tiers as $index => $tier) {
            $rows[] = [
                'id' => 'tier-' . $index,
                'name' => (string)$tier['name'],
                'color' => (string)$tier['color'],
                'items' => []
            ];
            $rowsIndexes[] = (string)$index;
        }

        $items = [];
        $itemsIndexes = [];

        foreach ($images as $index => $image) {
            $path = Image::store($image);
            $items['item-' . $index] = [
                'id' => 'item-' . $index,
                'path' => $path
            ];
            $itemsIndexes[] = 'item-' . $index;
        }

        $data = [
            'name' => $request->name,
            'rows' => $rows,
            'items' => $items,
            'tray' => [
                'items' => $itemsIndexes
            ],
            'rowsOrder' => $rowsIndexes
        ];

        $template = new Template();
        $template->name = $request->name;
        $template->data = json_encode($data);
        $template->image = Image::store($avatar);
        $template->user_id = auth()->id();
        $template->category_id = $request->category_id;
        $template->save();

        return redirect('/');
    }

    public function save(Request $request, Template $template)
    {
        $tierlist = new TierList();

        $tierlist->template_id = $template->id;
        $tierlist->user_id = auth()->id();
        $tierlist->name = $request->name;
        $tierlist->data = json_encode($request->data);
        $tierlist->save();
        return redirect('profile/' . auth()->id());
    }

    public function show(Template $template)
    {
        if (!$template->approved && !Auth::user()->can('approve templates')) {
            abort(404);
        }

        return view('templates.show', compact('template'));
    }

    public function moderateTemplates()
    {
        $templates = Template::where('approved', 0)->get();
        return view('templates.moderate', compact('templates'));
    }

    public function approveTemplate(Template $template)
    {
        $template->approved = true;
        $template->save();
        return redirect('/moderate');
    }

    public function destroy(Template $template){
        if($template->user_id == Auth::user()->id || Auth::user()->hasRole('Moderator')){
            $template->delete();
            return redirect('/');
        }
        
        abort(403);
    }
}
