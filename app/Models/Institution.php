<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author João Vitor Botelho
 */
class Institution extends Model
{

    public const TYPE_CNPJ = 2;
    public const TYPE_CPF = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'document',
        'document_type',
        'address',
        'complement',
        'zip_code',
    ];
}
