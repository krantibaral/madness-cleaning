<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends BaseModel
{
    use HasFactory;

    protected $guarded = ['id'];
    public function windowCleaningService()
    {
        return $this->belongsTo(WindowsCleaningService::class, 'window_cleaning_service_id');
    }

    public function houseCleaningService()
    {
        return $this->belongsTo(HouseCleaningService::class, 'house_cleaning_service_id');
    }

    public function leaseCleaningService()
    {
        return $this->belongsTo(LeaseCleaning::class, 'lease_cleaning_service_id');
    }

    public function carpetCleaningService()
    {
        return $this->belongsTo(CarpetCleaningService::class, 'carpet_cleaning_service_id');
    }

    public function commercialCleaningService()
    {
        return $this->belongsTo(CommercialCleaningService::class, 'commercial_cleaning_service_id');
    }

    public function builderCleaningService()
    {
        return $this->belongsTo(BuilderCleaningService::class, 'builder_cleaning_service_id');
    }

    public function lawnService()
    {
        return $this->belongsTo(LawnService::class, 'lawn_service_id');
    }

    public function rubbishRemovalService()
    {
        return $this->belongsTo(RubbishRemovalService::class, 'rubbish_removal_service_id');
    }
}