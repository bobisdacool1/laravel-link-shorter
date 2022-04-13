<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortenedLink extends Model
{
    use HasFactory;

    protected $primaryKey = 'short_link_id';

    public function __construct()
    {
        parent::__construct();

        //$this->short_link = $this->generateUniqueShortLink();
    }

    public function generateUniqueShortLinkId(): string
    {
        $shortString = Str::random(8);

        while(self::where($this->primaryKey, $shortString)->first() != null)
        {
            $shortString = Str::random(8);
        }

        return $shortString;
    }
}
