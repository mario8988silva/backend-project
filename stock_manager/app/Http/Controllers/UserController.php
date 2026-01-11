<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Settlements\UniversalBooleanFilterSettlement;
use App\Settlements\UniversalFilterSettlement;
use App\Settlements\UniversalSearchSettlement;
use App\Settlements\UniversalSortSettlement;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request, UniversalSearchSettlement $searchSettlement, UniversalSortSettlement $sortSettlement, UniversalBooleanFilterSettlement $booleanSettlement, UniversalFilterSettlement $filterSettlement)
    {
        // 1. Generate headers
        $headers = User::indexHeaders();

        // 2. Build query
        $query = User::query();

        // 3. Apply filters
        $filterSettlement->apply($request, $query);

        // 4. Apply search
        $searchSettlement->apply($request, $query);

        // 6. Apply sorting
        $sortSettlement->apply($request, $query);

        // 7. Pagination
        $users = $query->with(
            'role',
        )->paginate(25);

        // 8. Return view WITH headers
        //return view('products.index', ["products" => $products]);
        // Merge products with lookup tables
        return view('users.index', array_merge(
            [
                'users' => $users,
                'headers' => $headers,
            ],
            $this->getLookups()
        ));
    }

    private function getLookups(): array
    {
        return [
            'roles' => Role::orderBy('value')->get(),
        ];
    }



    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::orderBy('value')->get();

        return view('users.edit', compact('user', 'roles'));
    }


    public function create()
    {
        $roles = Role::orderBy('value')->get();

        return view('users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|string|min:8',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        $user = User::create($validated);

        return redirect()
            ->route('users.show', $user)
            ->with('success', 'User created successfully.');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role_id' => 'required|exists:roles,id',
            'phone' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = bcrypt($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('users.show', $user)
            ->with('success', 'User updated successfully.');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
