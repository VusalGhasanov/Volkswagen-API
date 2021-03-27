<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ComponentCustomDetail;
use App\Models\ComponentPage;
use App\Models\ComponentDetail;
use App\Models\Page;
use App;
use Illuminate\Support\Facades\Cache;

class PageController extends Controller
{
    public function index($slug)
    {
        $resp = [];
        $page = Page::with(['translations'=>function($q){
            return $q->where('locale',app()->getLocale() ? app()->getLocale() : null);
        }])->select('id', 'name', 'slug')->where('slug', $slug)->firstOrFail();
        $resp['page'] = $page;
        $pageComponents = ComponentPage::where('page_id', $page->id)->orderBy('order','asc')->get();

        if ($pageComponents) {
            foreach ($pageComponents as $pageComponentKey => $pageComponentValue) {
                $component = [
                    'id' => $pageComponentValue->component_id,
                    'name' => ($pageComponentValue->component) ? $pageComponentValue->component->name : '',
                ];
                $getComponentDetail = ComponentDetail::where('component_id', $pageComponentValue->component_id)->get();
                $fields = [];

                if ($getComponentDetail) {
                    foreach ($getComponentDetail as $getComponentDetailKey => $getComponentDetailValue) {
                        $getDetail = ComponentCustomDetail::with('translations')
                            ->where('component_detail_id', $getComponentDetailValue->id)
                            ->where('component_page_id', $pageComponentValue->id)
                            ->first();

                        if ($getDetail) {
                            if ($getDetail->translations(App::getLocale()) && isset($getDetail->translations(App::getLocale())->value)) {
                                $detail = $getDetail->translations(App::getLocale())->value;
                            } else {
                                $detail = $getDetail->value;
                            }
                        } else {
                            $detail = NULL;
                        }
                        $fields[$getComponentDetailValue->field] = $detail;
                    }
                }
                $details['details'] = $fields;
                # get component data
                $resp['components'][] = array_merge($component, $details);
            }
        }
        return response()->json(['data' => $resp], 200);
    }
}
