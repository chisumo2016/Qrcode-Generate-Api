<?php

namespace App\Repositories;

use App\Models\Trasanction;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TrasanctionRepository
 * @package App\Repositories
 * @version August 1, 2018, 12:21 pm UTC
 *
 * @method Trasanction findWithoutFail($id, $columns = ['*'])
 * @method Trasanction find($id, $columns = ['*'])
 * @method Trasanction first($columns = ['*'])
*/
class TrasanctionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'qrcode_id',
        'qrcode_owner_id',
        'payment_method',
        'message',
        'amount',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Trasanction::class;
    }
}
