<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Firm
 *
 * @property int $id
 * @property string $business_number
 * @property string $company_name
 * @property string $slug
 * @property string|null $company_address
 * @property string|null $director_first_name
 * @property string|null $director_last_name
 * @property string|null $director_phone
 * @property string|null $director_email
 * @property string|null $contact_first_name
 * @property string|null $contact_last_name
 * @property string|null $contact_phone
 * @property string|null $contact_email
 * @property string|null $main_business_activity
 * @property int $user_id
 * @property int $tariff_id
 * @property mixed $tariff_json
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $verified
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Payment[] $payment
 * @property-read int|null $payment_count
 * @property-read \App\Tariff $tariff
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Firm findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Firm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Firm query()
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereBusinessNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereCompanyAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereContactFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereContactLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereDirectorEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereDirectorFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereDirectorLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereDirectorPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereMainBusinessActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereTariffId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereTariffJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Firm whereVerified($value)
 * @mixin \Eloquent
 */
class Firm extends Model implements HasMedia
{
    use Sluggable;
    use InteractsWithMedia;
    use SoftDeletes;

    protected $fillable = [
        'business_number',
        'company_name',
        'company_address',
        'main_business_activity',
        'director_first_name',
        'director_last_name',
        'director_phone',
        'director_email',
        'contact_first_name',
        'contact_last_name',
        'contact_phone',
        'contact_email',
        'user_id',
        'tariff_id',
        'tariff_json',
        'verified',
        'sum',

    ];

    protected $dates = ['deleted_at'];
    protected $hidden = ['created_at', 'updated_at'];

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('thumb')
            ->width(50)
            ->height(50)
            ->nonOptimized();
    }

    public function sluggable()
    {
        return [
            'slug' => ['source' => 'company_name']
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }




}
