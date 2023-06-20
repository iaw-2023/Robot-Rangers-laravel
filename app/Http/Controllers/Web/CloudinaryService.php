<?php

namespace App\Http\Controllers\Web;

class CloudinaryService 
{

    private $cloudinary;

    public function __construct()
    {
        $this->cloudinary = cloudinary();
    }

    /**
     * Carga una imagen a Cloudinary y devuelve la URL segura.
     *
     * @param UploadedFile $image
     * @return string
     */
    public function uploadImage($image)
    {
        return $this->cloudinary->upload($image->getRealPath())->getSecurePath();;
    }

    /**
     * Elimina una imagen de Cloudinary.
     *
     * @param string $imageUrl
     * @return void
     */
    public function deleteImage($imageUrl)
    {
        $imageId = $this->getImageIdFromUrl($imageUrl);

        if ($imageId) {
            $this->cloudinary->destroy($imageId);
        }
    }

    /**
     * Obtiene el ID de la imagen a partir de su URL.
     *
     * @param string $imageUrl
     * @return string
     */
    private function getImageIdFromUrl($imageUrl)
    {
        $pattern = '/\/v\d+\/([^\/.]+)/';
        preg_match($pattern, $imageUrl, $matches);

        if (isset($matches[1])) {
            return $matches[1];
        }

        return null;
    }
}
