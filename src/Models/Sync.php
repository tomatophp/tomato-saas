<?php

namespace TomatoPHP\TomatoSaas\Models;

use Illuminate\Database\Eloquent\Model;
use Stancl\Tenancy\Contracts\Syncable;
use Stancl\Tenancy\Database\Concerns\ResourceSyncing;

/**
 * @property integer $id
 * @property integer $user_id
 * @property string $global_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $store
 * @property string $type
 * @property string $username
 * @property string $plan
 * @property string $apps
 * @property string $created_at
 * @property string $updated_at
 */
class Sync extends Model implements Syncable
{
    use ResourceSyncing;

    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'global_id', 'first_name', 'last_name', 'email', 'phone', 'password', 'store', 'type', 'username', 'plan', 'apps', 'created_at', 'updated_at'];

    protected $hidden = [
        'password',
    ];

    public function getGlobalIdentifierKey()
    {
        return $this->getAttribute($this->getGlobalIdentifierKeyName());
    }

    public function getGlobalIdentifierKeyName(): string
    {
        return 'global_id';
    }

    public function getCentralModelName(): string
    {
        return CentralUser::class;
    }

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
            'type',
            'global_id',
            'apps'
        ];
    }
}
