<?php

namespace App\Observers;

use App\Models\Store;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StoreObserver
{
    public function saving(Store $store)
    {
        $this->deleteImage($store);
        $this->storeImage($store);
    }

    public function creating(Store $store)
    {
        $this->storeImage($store);
    }

    public function deleting(Store $store)
    {
        $this->deleteImage($store);
    }

    private function storeImage(Store $store): void
    {
        if ($store->image instanceof UploadedFile) {
            $store->image = $store->image->store('public');
        }
    }

    private function deleteImage(Store $store): void
    {
        if ($store->getOriginal('image') != null) {
            Storage::delete($store->getOriginal('image'));
        }
    }
}
