<?php

declare(strict_types=1);

namespace Mortezaa97\Bookmarks\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Bookmarks\Http\Resources\BookmarkResource;
use Mortezaa97\Bookmarks\Models\Bookmark;

class BookmarkController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Bookmark::class);

        return BookmarkResource::collection(Bookmark::all());
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Bookmark::class);
        try {
            DB::beginTransaction();
            $item = new Bookmark;
            $data = $request->all();
            $data['created_by'] = Auth::user()->id;
            $bookmark = $item->create($data);

            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return new BookmarkResource($bookmark);
    }

    public function show(Bookmark $bookmark)
    {
        Gate::authorize('view', $bookmark);

        return new BookmarkResource($bookmark);
    }

    public function update(Request $request, Bookmark $bookmark)
    {
        Gate::authorize('update', $bookmark);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $bookmark->update($data);
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return new BookmarkResource($bookmark);
    }

    public function destroy(Bookmark $bookmark)
    {
        Gate::authorize('delete', $bookmark);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return response()->json('با موفقیت حذف شد');
    }
}
