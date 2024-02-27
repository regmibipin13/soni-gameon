<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorObserver
{
    /**
     * Handle the Vendor "creating" event.
     */
    public function creating(Vendor $vendor): void
    {
        $user = User::create([
            'name' => request()->user_name,
            'email' => request()->email,
            'phone' => request()->phone,
            'password' => request()->password,
            'user_type' => 'vendor',
        ]);

        $vendor->user_id = $user->id;
    }
    /**
     * Handle the Vendor "created" event.
     */
    public function created(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "updated" event.
     */
    public function updated(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "updating" event.
     */
    public function updating(Vendor $vendor): void
    {
        $user = $vendor->user->update([
            'name' => request()->user_name,
            'email' => request()->email,
            'phone' => request()->phone,
            'password' => request()->password,
            'user_type' => 'vendor',
        ]);
    }

    /**
     * Handle the Vendor "deleting" event.
     */
    public function deleting(Vendor $vendor): void
    {
        $vendor->user->delete();
    }
    /**
     * Handle the Vendor "deleted" event.
     */
    public function deleted(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "restored" event.
     */
    public function restored(Vendor $vendor): void
    {
        //
    }

    /**
     * Handle the Vendor "force deleted" event.
     */
    public function forceDeleted(Vendor $vendor): void
    {
        //
    }
}
