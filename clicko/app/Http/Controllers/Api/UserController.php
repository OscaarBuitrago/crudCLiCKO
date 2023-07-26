<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return response()->json([
            "success"=> true,
            "data"=>$users  
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name'        => 'required|string',
            'email'      => 'required|email',
            'password'   => 'required',
        ]);

        $name         = $request->get('name');
        $email       = $request->get('email');
        $password    = $request->get('password');

        // Saving data in the DB
        $user = User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);
        return response()->json([
            'success' => true,
            'data'    => $user
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=User::find($id);
        if (!$user){
            return response()->json([
                'success' => false,
                'message' => "User not found"
            ], 404);
        }
        else{
            return response()->json([
                'success' => true,
                'data'    => $user,
            ], 200);
       
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Testing if the user requested to update exists in the DB
        $user=User::find($id);

        if ($user){

            $validatedData = $request->validate([
                'name'       => 'required|string',
                'email'      => 'required|email',
                'password'   => 'required',
            ]);
            
            $name         = $request->get('name');
            $email       = $request->get('email');
            $password    = $request->get('password');           

            // Saving data in the DB
            $user->name = $name;
            $user->email = $email;
            $user->password = $password;
            $user->save();
            return response()->json([
                'success' => true,
                'data'    => $user
            ], 201);              
        } else {
            return response()->json([
                'success' => false,
                'message' => "User not found"
            ], 404);
           
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // Testing if the user requested to update exists in the DB
        $user=User::find($id);

        if (!$user){
            return response()->json([
                'success' => false,
                'message' => "User not found"
            ], 404);
        }
        else{
            $user->delete();
            return response()->json([
                'success' => true,
                'data'    => 'User deleted.'
            ], 200);
       
        }
    }

    public function topDomains()
    {
        // Getting the users email.
        $emails = User::pluck('email');

        // Splitting the domain part of the email address.
        $domains = $emails->map(function ($email) {
            $parts = explode('@', $email);
            return end($parts);
        });

        // Count how many times is each domain name.
        $countedDomains = $domains->countBy();

        // Sort the domains from the most repited to the less one.
        $sortedDomains = $countedDomains->sortDesc();

        // Getting the 3 most repited domains.        
        $top3Domains = $sortedDomains->take(3)->map(function ($quantity, $domain) {
            return [
                'domain' => $domain,
                'quantity' => $quantity,
            ];
        });

        return response()->json([
            "success" => true,
            "data"    =>$top3Domains  
        ]);
    }
       
}
