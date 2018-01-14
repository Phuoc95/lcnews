<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "news";
    protected $primaryKey = 'nid';
    public $timestamps = false;

    public function getItems() {
    	return $this->orderBy('nid','DESC')->paginate(getenv('ADMIN_PAGE'));
    }

    public function addItem($request){
        $this->name = $request->name;
        $this->cid = $request->cat;
        $this->preview_text = $request->preview;
        $this->detail_text = $request->detail;
        if($request->hasFile('picture')){
             // $this->picture = $request->picture->getClientOriginalName();
         $this->picture = $request->fileName;;
     }
     return $this->save();
 }

 public function getItem($id){
        // return $objItem = $this->findOrFail($id);
    return $this->findOrFail($id);
}

public function delItem($id){
    $objItem = $this->findOrFail($id);
    return $objItem->delete();
}

}
