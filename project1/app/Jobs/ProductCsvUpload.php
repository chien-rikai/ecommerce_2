<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $data = array_map('str_getcsv', file($this->file));

            foreach($data as $row){

                $insert = Product::create([
                    'name' => $row[0],
                    'describe' => $row[1],
                    'price' => $row[2],
                    'discount' => $row[3],
                    'category_id' => $row[4],
                    'url_img' => $row[5],
                    'star_rating' => $row[6],
                    'review' => $row[7],
                    'view' => $row[8]
                ]);
                if(!isset($insert)){
                    return redirect()->route('product.create')->with('fail',__('lang.stop, :name',['name' => $row[0]]));
                }
            }   
            unlink($this->file);      
    }
}