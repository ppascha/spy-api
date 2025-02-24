<?php

namespace App\Http\Controllers;

use App\Models\Spy;
use Illuminate\Http\Request;
use App\Events\SpyCreated;
use Illuminate\Validation\Rule;

class SpyController extends Controller
{
    /**
     * Store a new spy.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'agency_id' => ['required', 'exists:agencies,id'],
            'country_of_operation' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'nullable|date|after_or_equal:date_of_birth',
        ]);

        if (Spy::where('name', $request->name)
                ->where('surname', $request->surname)
                ->where('agency_id', $request->agency_id)
                ->exists()) {
            return response()->json(['message' => 'Spy already exists with the same name, surname, and agency.'], 422);
        }

        // Create spy
        $spy = Spy::create($request->all());

        // SpyCreated event
        event(new SpyCreated($spy));

        return response()->json(['message' => 'Spy created successfully!', 'spy' => $spy], 201);
    }

    /**
     * Get a list of spies with filters
     */
    public function index(Request $request)
    {
        $query = Spy::query();

        // Filters
        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->has('surname')) {
            $query->where('surname', 'like', '%' . $request->surname . '%');
        }
        if ($request->has('agency')) {
            $query->whereHas('agency', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->agency . '%');
            });
        }
        if ($request->has('country_of_operation')) {
            $query->where('country_of_operation', 'like', '%' . $request->country_of_operation . '%');
        }
        if ($request->has('active')) {
            $active = $request->active === 'true';
            $query->where(function ($q) use ($active) {
                if ($active) {
                    $q->whereNull('date_of_death');
                } else {
                    $q->whereNotNull('date_of_death');
                }
            });
        }

        // Sorting
        if ($request->has('sort_by')) {
            $sortFields = explode(',', $request->sort_by);
            foreach ($sortFields as $field) {
                $direction = 'asc';
                if (str_starts_with($field, '-')) {
                    $direction = 'desc';
                    $field = ltrim($field, '-');
                }
                if (in_array($field, ['name', 'surname', 'date_of_birth', 'date_of_death'])) {
                    $query->orderBy($field, $direction);
                }
            }
        } else {
            $query->orderBy('name');
        }

        $spies = $query->paginate(10);

        return response()->json([
            'data' => $spies->items(),
            'links' => [
                'first' => $spies->url(1),
                'last' => $spies->url($spies->lastPage()),
                'prev' => $spies->previousPageUrl(),
                'next' => $spies->nextPageUrl(),
            ],
            'meta' => [
                'current_page' => $spies->currentPage(),
                'per_page' => $spies->perPage(),
                'total' => $spies->total(),
            ],
        ]);
    }

    /**
     * Get 5 random spies (Rate-limited).
     */
    public function random()
    {
        $spies = Spy::inRandomOrder()->limit(5)->get();

        return response()->json([
            'data' => $spies,
        ]);
    }

    /**
     * Delete a spy by ID.
     */
    public function destroy($id)
    {
        $spy = Spy::find($id);

        if (!$spy) {
            return response()->json(['message' => 'Spy not found.'], 404);
        }

        $spy->delete();

        return response()->json(['message' => 'Spy deleted successfully.'], 200);
    }
}
