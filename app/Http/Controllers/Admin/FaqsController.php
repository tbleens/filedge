<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqsController extends Controller
{
    public function list()
    {
        $faqs = Faq::get();
        return view('admin.faqs.list', [
            'faqs' => $faqs
        ]);
    }

    public function indexAdd()
    {
        return view('admin.faqs.add');
    }

    public function indexEdit($id)
    {
        $faq = Faq::where('id', $id)->firstOrFail();
        return view('admin.faqs.edit', ['faq' => $faq]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'question' => ['required', 'string', 'max:250'],
            'answer' => ['required', 'string'],
            'visibility' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->visibility = (bool) $request->visibility;
        $faq->save();

        return redirect()->route('faqs.list');
    }

    public function update(Request $request)
    {
        $id = $request->idUpdate;
        $faq = Faq::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'question' => ['required', 'string', 'max:250'],
            'answer' => ['required', 'string'],
            'visibility' => ['nullable', 'boolean'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->visibility = (bool) $request->visibility;
        $faq->save();

        return redirect()->route('faqs.edit', $id)->with('success', __('update successful'));
    }
}
