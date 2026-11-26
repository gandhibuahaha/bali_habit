<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\View\View;

class StoryCatalogController extends Controller
{
    /**
     * Menampilkan katalog cerita yang sudah dipublikasikan.
     * Cerita Draft (inactive) tidak ditampilkan kepada pengguna.
     */
    public function index(): View
    {
        $stories = Story::query()
            ->where('status', 'active')
            ->orderBy('story_order')
            ->orderBy('title')
            ->get();

        return view('user.belajar_bersama', compact('stories'));
    }
}
