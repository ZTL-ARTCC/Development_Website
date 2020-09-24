<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoloCert extends Model {
    protected $table = 'solo_certs';

    public function getPosTxtAttribute() {
        if ($this->pos == 0) {
            $pos = 'Tower';
        } else {
            if ($this->pos == 1) {
                $pos = 'Approach';
            } else {
                if ($this->pos == 2) {
                    $pos = 'Center';
                } else {
                    $pos = 'N/A';
                }
            }
        }

        return $pos;
    }
}
