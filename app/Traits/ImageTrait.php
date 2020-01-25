<?php

namespace App\Traits;
use Illuminate\Support\Facades\File;

trait ImageTrait {

	public function getLinkDownload()
	{
		return asset(self::getPath($this->getAttribute($this->folder_id)) . $this->getAttribute($this->image_link_attribute));
	}

	public function getFullLinkPath()
	{
		return public_path(self::getPath($this->getAttribute($this->folder_id)) . $this->getAttribute($this->image_link_attribute));
	}

	public function setImageAttribute($value)
	{
		try {
			// ---------------- PATH ----------------------------

			$filename = md5(time()) .'.'. $value->getClientOriginalExtension();
			$this->attributes[$this->image_link_attribute] = $filename;
			$path = public_path(self::getPath($this->getAttribute($this->folder_id)));

			File::makeDirectory($path, $mode = 0777, true, true);

			//var_dump($file->move($destinationPath.DIRECTORY_SEPARATOR.'tmp'));
			$value->move($path, $filename);

		} catch (\Exception $e) {
			dd($e->getMessage());
			$this->attributes[$this->image_link_attribute] = null;
			return false;
		}

	}

	public function updateImageAttribute($value)
	{
		try {
			// ---------------- PATH ----------------------------
			if($this->getOriginal($this->image_link_attribute) != NULL){ //DELETAR
				$path = public_path(self::getPath($this->getAttribute($this->folder_id)));
				$filename = $this->getOriginal($this->image_link_attribute);
				File::delete($path . $filename);
			}
			return $this->setImageAttribute($value);

		} catch (\Exception $e) {
			dd($e->getMessage());
			$this->attributes[$this->image_link_attribute] = null;
			return false;
		}

	}
}