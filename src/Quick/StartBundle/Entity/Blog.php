<?php

namespace Quick\StartBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Blog entity
 */
class Blog {
    /**
     * Root directory for uploaded images
     */
    const UPLOAD_ROOT = 'uploads/images';
    
    /**
     * Link
     * 
     * @var string
     */
    protected $link;
    
    /**
     * Text
     * 
     * @var string
     */
    protected $text;
    
    /**
     * Image
     *
     * @var UploadedFile
     */
    protected $image;
    
    /**
     * Image path after upload
     * 
     * @var string
     */
    protected $path;
    
    /**
     * Gets link
     * 
     * @return string
     */
    public function getLink() 
    {
        return $this->link;
    }
    
    /**
     * Sets link
     * 
     * @param string $link
     * @return void
     */
    public function setLink($link) 
    {
        $this->link = $link;
    }
    
    /**
     * Gets text
     * 
     * @return string
     */
    public function getText() 
    {
        return $this->text;
    }
    
    /**
     * Sets text
     * 
     * @param string $text
     * @return void
     */
    public function setText($text) 
    {
        $this->text = $text;
    }
    
    /**
     * Gets image
     * 
     * @return UploadedFile
     */
    public function getImage() 
    {
        return $this->image;
    }
    
    /**
     * Sets image
     * 
     * @param UploadedFile $image
     * @return void
     */
    public function setImage(UploadedFile $image) 
    {        
        $this->image = $image;
    }
    
    /**
     * Gets path
     * 
     * @return string
     */
    public function getPath() 
    {
        return $this->path;
    }
    
    /**
     * Runs upload image process
     * 
     * @return void
     */
    public function uploadImage() 
    {
        if (is_null($this->image)) {
            return;
        }
        
        // move image from temp directory to destination one
        $this->image->move(
            $this->getUploadRootDir(),
            $this->image->getClientOriginalName()
        );

        $this->path     = $this->image->getClientOriginalName();
        $this->image    = null;
    }
    
    /**
     * Absolute path of upload directory
     * 
     * @return string
     */
    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../web/' . self::UPLOAD_ROOT;
    }
}