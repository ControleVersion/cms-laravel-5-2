<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;  //trabalhar com formacao de datas
class Post extends Model
{

     protected $fillable = [
		'author_id', 
		'title',
		'slug',
		'excerpt',
		'body',
		'image',
    ];
	protected $dates = ['published_at'];
	
	public function author(){
		
		return $this->belongsTo(User::class);
	}
	public function category(){
		return $this->belongsTo(Category::class);
	}
	
	//criando um helpers para tratar as imagens
	public function getImageUrlAttribute($value){
		$imageUrl = "";
		
		if(!is_null($this->image)){
			$imagePath = public_path()."/img/".$this->image;
			if(file_exists($imagePath)) $imageUrl = asset('img/'.$this->image);
		}
		return $imageUrl;
	}
	public function getDateAttribute($value){
		return is_null($this->published_at) ? '':$this->published_at->diffForHumans();
	}
	public function tirarAcento($frase){
	  $frase = preg_replace("[^a-zA-Z0-9_.]", "", 
		strtr($frase, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", 
		"aaaaeeiooouucAAAAEEIOOOUUC-"));
	  $frase = strtolower($frase); //Transforma em minúscula
	  $frase = str_replace(' ', '-', $frase);
	  $frase = str_replace('.', '', $frase);
	  return $frase;
	}
	public function getTituloAttribute(){
		return $this->tirarAcento($this->title);
	}
	
	public function scopePublished(){
		return $this->where("published_at", "<=", Carbon::now());
	}
}
