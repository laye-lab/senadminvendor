<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $Matricule_Agent
 * @property string $Nom_Agent
 * @property string $Statut
 * @property string $Direction
 * @property string $Affectation
 * @property string $Code_Etablissement
 * @property string $Etablissement
 * @property string $fonction
 */
class Agent extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'agent';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'Matricule_Agent';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['Nom_Agent', 'Statut', 'Direction', 'Affectation', 'Code_Etablissement', 'Etablissement', 'fonction'];

}
