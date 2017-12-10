<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * Get Company Elequent object for company, that submitted the job offer
     * @return \App\Company
     */
    public function company(){
      return $this->belongsTo('\App\Company');
    }

    /**
     * Get category of job offer
     * @return string
     */
    public function category(){
      return $this->belongsTo('\App\Category')->category();
    }

    /**
     * Get Post Elequent object for post number in the job offer
     * @return \App\Company
     */
    public function post(){
      return $this->belongsTo('\App\Post');
    }

    /**
     * Get Degree Elequent object for required degree in the job offer
     * @return \App\Degree
     */
    public function degree(){
      return $this->belongsTo('\App\Degree');
    }
}
