<?php

namespace TomatoPHP\TomatoSaas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Stancl\Tenancy\Contracts\SyncMaster;
use Stancl\Tenancy\Database\Concerns\CentralConnection;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;
use Stancl\Tenancy\Database\Models\TenantPivot;

/**
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $type
 * @property string $username
 * @property string $password
 * @property string $store
 * @property string $plan
 * @property integer $global_id
 * @property string $apps
 *
 */
class CentralUser extends Authenticatable implements SyncMaster
{
    use ResourceSyncing, CentralConnection;
    use HasApiTokens, Notifiable;

    /**
     * @var array
     */
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'global_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'store',
        'type',
        'username',
        'plan',
        'apps',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'apps' => 'array',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var string
     */
    public $table = 'syncs';

    /**
     * @var string[]
     */
    protected $hidden = [
        'password'
    ];

    /**
     * @return BelongsToMany
     */
    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_users', 'global_user_id', 'tenant_id', 'global_id')
            ->using(TenantPivot::class);
    }

    /**
     * @return string
     */
    public function getTenantModelName(): string
    {
        return Sync::class;
    }

    /**
     * @return mixed
     */
    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    /**
     * @return string
     */
    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    /**
     * @return string
     */
    public function getCentralModelName(): string
    {
        return static::class;
    }

    /**
     * @return string[]
     */
    public function getSyncedAttributeNames(): array
    {
        return [
            'user_id',
            'first_name',
            'last_name',
            'email',
            'phone',
            'username',
            'password',
            'store',
            'plan',
            'global_id',
            'apps'
        ];
    }
}
